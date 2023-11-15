<p>Dear {{ $client->name }}</p>
<br>
<p>
    Your password on Printwork system was changed successfully.
    Here is your new login credentials:
    <br>
    <b>Login ID: </b>{{ $client->username }} or {{ $client->email }}
    <br>
    <b>Password: </b>{{ $new_password }}
</p>
<br>
Please, keep your credentials confidential. Your username and password are your own credentials and you should never
share them with anybody else.
<p>
    Printwork will not be liable for any misuse of your username or password.
</p>
<br>
----------------------------------------------
<p>
    This email was automatically sent by Printwork system. Do not reply it.
</p>
