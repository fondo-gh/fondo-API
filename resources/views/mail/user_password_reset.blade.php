<p>Hello {{ $user->name }},</p>
<p>you are receiving this email because we received a password reset request for your account.</p>
<p>Click <a href="https://fondowebapp.com/password/reset/{{ $token }}">here</a> to reset password.</p>
<p><b>If you did not request a password reset, no further action is required.</b></p>

<br><br>Best Regard!<br><br><br>
