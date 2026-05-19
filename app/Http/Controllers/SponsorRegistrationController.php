<?php

namespace App\Http\Controllers;

use App\Mail\SponsorRegistrationMail;
use App\Models\SponsorRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SponsorRegistrationController extends Controller
{
    public function index()
    {
        $leads = SponsorRegistration::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.pages.sponsor_leads.index', compact('leads'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'phone_number' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email|max:255',
            'category' => 'required|string|max:255',
            'city_region' => 'nullable|string|max:255',
            'budget' => 'nullable|numeric',
        ], [
            'phone_number.regex' => 'Please enter a valid phone number.',
            'budget.numeric' => 'Budget must be a number.',
        ]);

        $sponsor = SponsorRegistration::create($request->all());

        // Send Email
        try {
            Mail::to(['rajanshar543@gmail.com', 'info@hcplt20.com'])->send(new SponsorRegistrationMail($sponsor));
        } catch (\Exception $e) {
            // Log or ignore
        }

        return response()->json(['success' => true, 'message' => 'Your sponsorship inquiry has been submitted! Our team will contact you soon.']);
    }

    public function show(SponsorRegistration $sponsor)
    {
        return response()->json($sponsor);
    }

    public function updateStatus(Request $request, SponsorRegistration $sponsor)
    {
        $request->validate([
            'status' => 'required|string',
            'remarks' => 'nullable|string',
        ]);

        $sponsor->update([
            'status' => $request->status,
            'remarks' => $request->remarks,
        ]);

        return response()->json(['success' => true, 'message' => 'Sponsor lead updated successfully!']);
    }

    public function destroy(SponsorRegistration $sponsor)
    {
        $sponsor->delete();
        return response()->json(['success' => true, 'message' => 'Lead deleted successfully!']);
    }
}
