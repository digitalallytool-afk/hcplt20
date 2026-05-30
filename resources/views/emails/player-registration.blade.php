<!DOCTYPE html>
<html>
<head>
    <title>Registration Successful - HCPL</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 8px; border-top: 5px solid #19398a;">
        <h2 style="color: #19398a; text-align: center;">Welcome to Haryana Cricket Premier League!</h2>
        
        <p>Dear {{ $profile->first_name }} {{ $profile->last_name }},</p>
        
        <p>Your registration is successful! Welcome to the HCPL family. Please find your registration details below:</p>
        
        <div style="background-color: #fcfcfc; border: 1px solid #e4e7f2; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
            <p style="margin: 5px 0;"><strong>Name:</strong> {{ $profile->first_name }} {{ $profile->last_name }}</p>
            <p style="margin: 5px 0;"><strong>Role:</strong> {{ $profile->player_role }}</p>
            <p style="margin: 5px 0;"><strong>Player ID:</strong> <span style="color: #d8571f; font-weight: bold;">{{ $profile->player_id }}</span></p>
        </div>
        
        <p>Please keep this Player ID safe, as it will be used for all future communications and trial updates.</p>
        
        <p>Best regards,<br>
        <strong>Team HCPL</strong></p>
    </div>
</body>
</html>
