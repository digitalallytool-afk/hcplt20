<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEnquiryMail;

class ContactController extends Controller
{
    // Frontend Submission
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        $details = $request->all();
        ContactMessage::create($details);

        // Send Email to Admin and CC to Info
        try {
            Mail::to('rajanshar543@gmail.com')
                ->cc('info@hcplt20.com')
                ->send(new ContactEnquiryMail($details));
        } catch (\Exception $e) {
            // Log error but continue
            \Log::error('Mail sending failed: ' . $e->getMessage());
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Thank you for contacting us! We will get back to you soon.'
        ]);
    }

    // Backend List
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.pages.contacts.index', compact('messages'));
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->is_read = true;
        $message->save();
        return response()->json($message);
    }

    public function destroy($id)
    {
        ContactMessage::findOrFail($id)->delete();
        return response()->json(['message' => 'Message deleted successfully']);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
            'remarks' => 'nullable|string',
        ]);

        $message = ContactMessage::findOrFail($id);
        $message->update([
            'status' => $request->status,
            'remarks' => $request->remarks,
        ]);

        return response()->json(['success' => true, 'message' => 'Lead updated successfully!']);
    }
}
