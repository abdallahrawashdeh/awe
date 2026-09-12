<!DOCTYPE html>
<html>
<head>
    <title>Application Received</title>
</head>
<body>
    <h1>Thank You for Your Application!</h1>
    <p>Dear {{ $application->name }},</p>
    <p>We have received your application for the position of <strong>{{ $application->career_title }}</strong>.</p>
    <p>We will review your application and get back to you soon.</p>
    <br>
    <p>Best regards,</p>
    <p>HR Team</p>
</body>
</html>
