<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Email Title</title>
</head>
<body style="font-family: 'Arial', sans-serif; background-color: #f4f4f4; color: #333; padding: 20px;">

    <div style="max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <h1 style="color: #007bff;">Your Email Heading</h1>

        <p>
            Hello, this is a custom email template. You can customize this content as needed.
        </p>

        <p>
            Regards,<br>
            {{ $email }}
        </p>
    </div>

</body>
</html>