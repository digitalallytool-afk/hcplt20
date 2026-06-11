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
            <h2>New Team Owner Lead</h2>
            <p>HCPL Franchise Opportunity Application</p>
        </div>
        <div class="content">
            <div class="field">
                <span class="label">Brand / Company</span>
                <span class="value">{{ $owner->brand_name }}</span>
            </div>
            <div class="field">
                <span class="label">Contact Person</span>
                <span class="value">{{ $owner->contact_person }}</span>
            </div>
            <div class="field">
                <span class="label">Phone</span>
                <span class="value">{{ $owner->phone_number }}</span>
            </div>
            <div class="field">
                <span class="label">Email</span>
                <span class="value">{{ $owner->email }}</span>
            </div>
            <div class="field">
                <span class="label">City / State</span>
                <span class="value">{{ $owner->city_state }}</span>
            </div>
            <div class="field">
                <span class="label">Business Type</span>
                <span class="value">{{ $owner->profession }}</span>
            </div>
            <div class="field">
                <span class="label">Financial Capacity</span>
                <span class="value">{{ $owner->financial_capacity }} Lacs</span>
            </div>
            <div class="field">
                <span class="label">Preferred Team</span>
                <span class="value">{{ $owner->preferred_team_name ?? 'N/A' }}</span>
            </div>
            <div class="field">
                <span class="label">Preferred District</span>
                <span class="value">{{ $owner->preferred_district }}</span>
            </div>
            <div class="field">
                <span class="label">Prior Experience</span>
                <span class="value">{{ $owner->prior_experience ?? 'No' }}</span>
            </div>
            <div class="field">
                <span class="label">Reason to Own</span>
                <span class="value">{{ $owner->reason_to_own }}</span>
            </div>
            @if($owner->growth_plan)
            <div class="field">
                <span class="label">Growth Plan</span>
                <span class="value">{{ $owner->growth_plan }}</span>
            </div>
            @endif
            @if($owner->special_requirements)
            <div class="field">
                <span class="label">Special Requirements</span>
                <span class="value">{{ $owner->special_requirements }}</span>
            </div>
            @endif
        </div>
        <div class="footer">
            HARYANA CORPORATE PREMIER LEAGUE - SEASON 1
        </div>
    </div>
</body>
</html>
