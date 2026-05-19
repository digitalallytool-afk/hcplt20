<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 20px auto; padding: 30px; border: 1px solid #eee; border-radius: 10px; }
        .header { border-bottom: 2px solid #19398a; padding-bottom: 15px; margin-bottom: 25px; }
        .header h2 { color: #19398a; margin: 0; }
        .info-row { margin-bottom: 15px; }
        .label { font-weight: bold; color: #19398a; min-width: 100px; display: inline-block; }
        .message-box { background: #f9f9f9; padding: 20px; border-radius: 8px; border-left: 4px solid #19398a; margin-top: 20px; }
        .footer { margin-top: 30px; font-size: 12px; color: #888; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Contact Enquiry</h2>
        </div>
        
        <div class="info-row">
            <span class="label">Name:</span> {{ $details['name'] }}
        </div>
        <div class="info-row">
            <span class="label">Email:</span> {{ $details['email'] }}
        </div>
        <div class="info-row">
            <span class="label">Phone:</span> {{ $details['phone'] ?? 'N/A' }}
        </div>
        
        <div class="message-box">
            <strong>Message:</strong><br>
            {{ $details['message'] }}
        </div>
        
        <div class="footer">
            This enquiry was sent from the HCPL Website Contact Form.
        </div>
    </div>
</body>
</html>
