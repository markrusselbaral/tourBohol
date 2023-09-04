<!DOCTYPE html>
<html>
<head>
    <title>email</title>
</head>
<body>
    <h1>From: {{ $mailData['fullname'] }}</h1>
    <p>Email: {{ $mailData['email'] }}</p>
    <p>Message: {{ $mailData['message'] }}</p>
</body>
</html>
