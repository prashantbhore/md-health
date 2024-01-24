<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/emails/invitation.blade.php -->

<p>Hello!</p>

<p>You have been invited to join our platform. Click the link below to accept the invitation:</p>

<a href="{{ $invitationLink }}">Accept Invitation</a>

<p>Thank you!</p>

</body>
</html>