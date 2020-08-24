<p>Dear {{ $user->name }},</p>
<p>You initiated a password reset process. Below is the password reset code.</p>
<ul style="list-style-type: none;">
    <li>
        <b>Reset Code: {{ $user->reset_code }}</b>
    </li>
</ul>
<p>Access the login page <a href="https://fondowebapp.com/login">here</a>, select <b>Forgot Password</b> on the <b>Login
        Page.</b>
    Click <b>I have a Reset Code</b> and provide <b>the necessary details</b> to complete the password reset process.
</p>
<p><b>NB: If you did not initiate this process. Kindly ignore.</b></p>

<br><br>Best Regard!<br><br><br>

