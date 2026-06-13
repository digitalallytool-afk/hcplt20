<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $profile = \App\Models\PlayerProfile::with(['trials' => function($q) {
            $q->orderBy('player_trials.created_at', 'desc');
        }])->where('user_id', $user->id)->first();
        
        // Automatic Payment Reconciliation Check
        if ($profile && $profile->payment_status === 'pending' && $profile->razorpay_order_id) {
            try {
                $api = new \Razorpay\Api\Api(config('services.razorpay.key'), config('services.razorpay.secret'));
                
                // Fetch payments associated with the order
                $payments = $api->order->fetch($profile->razorpay_order_id)->payments();
                
                if ($payments && !empty($payments->items)) {
                    foreach ($payments->items as $payment) {
                        if ($payment->status === 'captured' || $payment->status === 'authorized') {
                            // Payment was indeed successful! Auto-complete the registration.
                            $profile->completePayment(
                                $payment->id, 
                                $payment->amount / 100, 
                                $payment->toArray()
                            );
                            
                            // Reload updated profile
                            $profile->refresh();
                            break;
                        }
                    }
                }
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Razorpay Reconciliation Failed for User ' . $user->id . ': ' . $e->getMessage());
            }
        }
        
        return view('player.dashboard', compact('profile'));
    }
}
