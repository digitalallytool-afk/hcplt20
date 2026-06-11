<!DOCTYPE html>
<html>
<head>
    <title>Registration Successful - HCPL</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; color: #333333; line-height: 1.6;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 30px; border-radius: 8px; border-top: 5px solid #ff6600; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        
        <p style="margin-bottom: 20px;">Dear {{ trim($profile->first_name . ' ' . $profile->last_name) }},</p>
        
        <p style="margin-bottom: 15px;">Your registration for HCPL – Haryana Corporate Premier League has been successfully completed.</p>
        <p style="margin-bottom: 25px;">We are excited to welcome you to one of Haryana’s biggest professional cricket platforms.</p>
        
        <p style="font-weight: bold; margin-bottom: 10px; color: #0a1c3e;">Registration Details:</p>
        <div style="background-color: #f8fafc; border: 1px solid #e2e8f0; padding: 20px; border-radius: 6px; margin-bottom: 25px; font-family: Courier, monospace;">
            <p style="margin: 0 0 10px 0;"><strong>Player ID:</strong> {{ $profile->player_id }}</p>
            <p style="margin: 0;"><strong>Category:</strong> {{ $profile->age_category }}</p>
        </div>
        
        <p style="margin-bottom: 5px;">Regards,</p>
        <p style="margin-bottom: 5px; font-weight: bold; color: #0a1c3e;">Team HCPL</p>
        <p style="margin-bottom: 0; font-size: 0.9rem; color: #718096;">-ARK NEXTGEN SPORTS PRIVATE LIMITED</p>
        
    </div>
</body>
</html>
