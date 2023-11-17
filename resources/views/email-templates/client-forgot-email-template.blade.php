<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        .header {
            background-color: #22bc66;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            color: #fff;
            margin: 0;
        }

        .content {
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 5px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            background-color: #22bc66;
            border: 2px solid #22bc66;
        }

        .button:hover {
            background-color: #1a904e;
            border-color: #1a904e;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <h1>Password Reset</h1>
        </div>
        <div class="content">
            <p>Dear {{ $client->name }},</p>
            <p>
                We have received a request to reset the password for your Printwork account associated with
                {{ $client->email }}.
                You can reset your password by clicking the button below:
            </p>
            <p>
                <a href="{{ $actionLink }}" target="_blank" class="button">Reset Password</a>
            </p>
            <p>
                <b>NB:</b> This link will be valid for the next 15 minutes.
            </p>
            <p>
                If you did not request a password reset, please ignore this email.
            </p>
        </div>
    </div>

</body>

</html>
