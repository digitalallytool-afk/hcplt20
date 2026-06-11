<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'DM Sans', sans-serif; line-height: 1.6; color: #333; }
        .container { width: 100%; max-width: 600px; margin: 0 auto; border: 1px solid #eee; border-radius: 12px; overflow: hidden; }
        .header { background: #19398a; color: white; padding: 30px; text-align: center; }
        .content { padding: 30px; }
        .field { margin-bottom: 20px; border-bottom: 1px solid #f9f9f9; padding-bottom: 10px; }
        .label { font-weight: bold; color: #19398a; text-transform: uppercase; font-size: 11px; display: block; margin-bottom: 5px; }
        .value { font-size: 15px; color: #000; }
        .footer { background: #f5c518; color: #000; padding: 20px; text-align: center; font-size: 12px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Sponsorship Inquiry</h2>
            <p>HCPL Partnership Application</p>
        </div>
        <div class="content">
            <div class="field">
                <span class="label">Company / Brand</span>
                <span class="value">{{ $sponsor->company_name }}</span>
            </div>
            <div class="field">
                <span class="label">Contact Person</span>
                <span class="value">{{ $sponsor->contact_person }}</span>
            </div>
            <div class="field">
                <span class="label">Phone</span>
                <span class="value">{{ $sponsor->phone_number }}</span>
            </div>
            <div class="field">
                <span class="label">Email</span>
                <span class="value">{{ $sponsor->email }}</span>
            </div>
            <div class="field">
                <span class="label">Category</span>
                <span class="value">{{ $sponsor->category }}</span>
            </div>
            <div class="field">
                <span class="label">Budget</span>
                <span class="value">₹ {{ number_format($sponsor->budget) }}</span>
            </div>
            <div class="field">
                <span class="label">Location</span>
                <span class="value">{{ $sponsor->city_region ?? 'N/A' }}</span>
            </div>
            <div class="field">
                <span class="label">Source</span>
                <span class="value">{{ $sponsor->hear_about_us ?? 'N/A' }}</span>
            </div>
            <div class="field">
                <span class="label">Comments</span>
                <span class="value">{{ $sponsor->comments ?? 'No comments' }}</span>
            </div>
        </div>
        <div class="footer">
            HARYANA CORPORATE PREMIER LEAGUE - SEASON 1
        </div>
    </div>
</body>
</html>
