<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verification Code</title>
</head>
<body>
    <h4>Hi, {{ $garage->name }}</h4>
    <p>Congratulations, your garage profile has been approved here is your verification code</p>
    <p><b>{{ $code }}</b></p>
</body>
</html>
