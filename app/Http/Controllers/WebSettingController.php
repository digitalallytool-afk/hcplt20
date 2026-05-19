<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\WebSetting;

class WebSettingController extends Controller
{
    // Show settings page
    public function edit()
    {
        $setting = WebSetting::first();
        return view('backend.pages.settings.web', compact('setting'));
    }

    // Update settings using AJAX
    public function update(Request $request)
    {
        // 0. Catch PHP Upload Errors (like size limit) before Validation
        $logoFile = $request->file('logo');
        if ($logoFile !== null && !$logoFile->isValid()) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'logo' => [
                        'Upload Error: ' . $logoFile->getErrorMessage() . 
                        ' (Server allows max: ' . ini_get('upload_max_filesize') . ')'
                    ]
                ]
            ], 422);
        }

        // 1. Simple Validation
        $validated = $request->validate([
            'site_name' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240', // 10MB max size, explicit formats
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'youtube_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'about_us_summary' => 'nullable|string',
        ]);

        // 2. Get or Create Settings
        $setting = WebSetting::first();
        if (!$setting) {
            $setting = new WebSetting();
        }

        // 3. Handle Logo Upload (Save directly to public/logos)
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Move file to public/logos
            $file->move(public_path('logos'), $filename);
            
            // Save path in database
            $validated['logo'] = 'logos/' . $filename;
        }

        // 4. Save data to database
        $setting->fill($validated);
        $setting->save();

        // 5. Return Simple JSON response for AJAX
        return response()->json([
            'success' => true,
            'message' => 'Settings saved successfully!',
            'logo_url' => $setting->logo ? asset($setting->logo) : null
        ]);
    }
}
