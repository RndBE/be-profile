<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pesan dari Website Beacon Engineering</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
        <tr>
            <td style="padding: 20px; text-align: center; background-color: #f1f1f1; color: #ffffff; border-top-left-radius: 8px; border-top-right-radius: 8px;">
                <img src="https://be-jogja.com/assets/image/logo_be2.png" alt="Beacon Logo" width="120" style="margin-bottom: 10px;">
            </td>

        </tr>
        <tr>
            <td style="padding: 20px;">
                <p><strong>Nama:</strong> {{ $name }}</p>
                <p><strong>Email:</strong> {{ $email }}</p>
                <p><strong>No. Telp:</strong> {{ $phone }}</p>
                <hr style="border: 0; border-top: 1px solid #e0e0e0; margin: 20px 0;">
                <p><strong>Pesan:</strong></p>
                <p style="white-space: pre-line;">{{ $messageText }}</p>
            </td>
        </tr>
        <tr>
            <td style="padding: 15px; background-color: #f1f1f1; text-align: center; font-size: 12px; color: #777; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;">
                &copy; {{ date('Y') }} Beacon Engineering. All rights reserved.
            </td>
        </tr>
    </table>
</body>
</html>
