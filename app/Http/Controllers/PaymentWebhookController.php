<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlayerProfile;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Log;

class PaymentWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $payload = $request->getContent();
        $signature = $request->header('X-Razorpay-Signature');
        $webhookSecret = env('RAZORPAY_WEBHOOK_SECRET');

        if (empty($signature)) {
            Log::error('Razorpay Webhook: Missing signature header.');
            return response()->json(['status' => 'fail', 'message' => 'Missing signature'], 400);
        }

        try {
            $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
            
            // Verify signature if webhook secret is configured in env
            if (!empty($webhookSecret)) {
                $api->utility->verifyWebhookSignature($payload, $signature, $webhookSecret);
            }
        } catch (\Exception $e) {
            Log::error('Razorpay Webhook Signature Verification Failed: ' . $e->getMessage());
            return response()->json(['status' => 'fail', 'message' => 'Invalid signature'], 400);
        }

        // Decode webhook payload
        $data = json_decode($payload, true);
        if (empty($data) || empty($data['event'])) {
            return response()->json(['status' => 'fail', 'message' => 'Invalid payload'], 400);
        }

        $event = $data['event'];
        Log::info("Razorpay Webhook received event: {$event}");

        // Handle paid / captured events
        if ($event === 'order.paid' || $event === 'payment.captured') {
            $paymentData = $data['payload']['payment']['entity'] ?? null;
            if ($paymentData) {
                $orderId = $paymentData['order_id'] ?? null;
                $paymentId = $paymentData['id'] ?? null;
                $amount = $paymentData['amount'] / 100;

                if ($orderId) {
                    $profile = PlayerProfile::where('razorpay_order_id', $orderId)->first();
                    if ($profile) {
                        try {
                            $profile->completePayment($paymentId, $amount, $paymentData);
                            Log::info("Razorpay Webhook successfully processed payment for Profile ID: {$profile->id}");
                        } catch (\Exception $e) {
                            Log::error("Razorpay Webhook: completePayment failed: " . $e->getMessage());
                            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
                        }
                    } else {
                        Log::warning("Razorpay Webhook: Player profile with order ID {$orderId} not found in database.");
                    }
                } else {
                    Log::warning("Razorpay Webhook: Event had no order_id.");
                }
            }
        }

        return response()->json(['status' => 'success']);
    }
}
