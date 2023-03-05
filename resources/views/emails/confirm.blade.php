<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Registration confirmation link</title>
</head>
<body>
  <h1>Thank you for your Registration</h1>

  <p>
    Please click the link below to complete the registration
    <a href="{{ route('confirm_email', $user->activation_token) }}">
      {{ route('confirm_email', $user->activation_token) }}
    </a>
  </p>

  <p>
    If this is not your own action, please ignore this email.
  </p>
</body>
</html>
