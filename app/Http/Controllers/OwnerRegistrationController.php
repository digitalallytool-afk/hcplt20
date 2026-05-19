<?php

namespace App\Http\Controllers;

use App\Mail\OwnerRegistrationMail;
use App\Models\OwnerRegistration;
use App\Models\WebSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OwnerRegistrationController extends Controller
{
    public function index()
    {
        $leads = OwnerRegistration::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.pages.owner_leads.index', compact('leads'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'phone_number' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email|max:255',
            'city_state' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'financial_capacity' => 'required|numeric',
            'preferred_district' => 'required|string',
            'reason_to_own' => 'required|string|min:10',
            'declaration_confirmed' => 'accepted',
            'declaration_management' => 'accepted',
        ], [
            'declaration_confirmed.accepted' => 'You must confirm the information provided.',
            'declaration_management.accepted' => 'You must accept the HCPL management terms.',
            'phone_number.regex' => 'Please enter a valid phone number.',
        ]);

        $owner = OwnerRegistration::create($request->all());

        // Send Email
        try {
            Mail::to(['rajanshar543@gmail.com', 'info@hcplt20.com'])->send(new OwnerRegistrationMail($owner));
        } catch (\Exception $e) {
            // Log or ignore
        }

        return response()->json(['success' => true, 'message' => 'Application submitted successfully! Our team will contact you soon.']);
    }

    public function show(OwnerRegistration $owner)
    {
        return response()->json($owner);
    }

    public function updateStatus(Request $request, OwnerRegistration $owner)
    {
        $request->validate([
            'status' => 'required|string',
            'remarks' => 'nullable|string',
        ]);

        $owner->update([
            'status' => $request->status,
            'remarks' => $request->remarks,
        ]);

        return response()->json(['success' => true, 'message' => 'Lead updated successfully!']);
    }

    public function destroy(OwnerRegistration $owner)
    {
        $owner->delete();
        return response()->json(['success' => true, 'message' => 'Lead deleted successfully!']);
    }
}
