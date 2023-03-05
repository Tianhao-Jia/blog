<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Find password</title>
</head>
<body>
  <h1>You are trying to reset your password.</h1>

  <p>
    Please click the following link to proceed to the next step:
    <a href="{{ route('password.reset', $token) }}">
      {{ route('password.reset', $token) }}
    </a>
  </p>

  <p>
    If this is not your own action, please ignore this email.
  </p>
</body>
</html>
