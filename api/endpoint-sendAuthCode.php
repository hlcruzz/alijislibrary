<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");
include "../lib/connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/library/PHPMailer/src/Exception.php';
require '../assets/library/PHPMailer/src/PHPMailer.php';
require '../assets/library/PHPMailer/src/SMTP.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $checkQuery = "SELECT accountEmail FROM accounts WHERE accountEmail = ? LIMIT 1;";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->execute([$email]);

    if ($checkStmt->rowCount() == 0) {
        echo json_encode([
            "status" => false,
            "message" => "Account not found"
        ]);
        exit;
    }
    $captcha = $_POST['captcha'];
    if (!$captcha) {
        echo json_encode([
            "status" => false,
            "message" => "Please verify you're not a robot."
        ]);
        exit;
    }

    $secretKey = "6LeuRjIrAAAAACFwy0NM3VYbD_o8DcagWC9EwCUE";
    $verifyURL = "https://www.google.com/recaptcha/api/siteverify";

    $response = file_get_contents($verifyURL . '?secret=' . $secretKey . '&response=' . $captcha);
    $responseData = json_decode($response);


    if (!$responseData->success) {
        echo json_encode([
            "status" => false,
            "message" => "Captcha validation failed. Try again."
        ]);
        exit;
    }
    try {
        $mail = new PHPMailer(true);
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hlgcruz.chmsu@gmail.com';
        $mail->Password = 'vestizqrfqrgosiq';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom("hlgcruz.chmsu@gmail.com", "Alijis Campus Library");
        $mail->addAddress($email);
        $mail->addReplyTo("hlgcruz.chmsu@gmail.com");


        $mail->isHTML(true);
        $mail->Subject = "Verification Code";
        $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $mail->Body = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Admin Verification Code</title>
            </head>
            <body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 30px;">
                <div style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 25px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <h2 style="color: #0a58ca;">Alijis Campus Library - Admin Access</h2>
                    <p>Dear Admin,</p>
                    <p>You have requested access or an operation that requires verification. Please use the code below to proceed securely:</p>
                    <h1 style="background-color: #0a58ca; color: #ffffff; padding: 12px 25px; border-radius: 5px; display: inline-block; letter-spacing: 4px;">' . $code . '</h1>
                    <p>This code is confidential. Do not share it with unauthorized users.</p>
                </div>
            </body>
            </html>
        ';

        $mail->send();



        $key = 'asdkcyn347y5cn37ywuercyn237ryccnQcwYCn9YCn3ycOW3Y5CO9w3y5owyOYCNW7YcwhwjmfiJWPECTwpct-wervWERVwoejrhwcmERHOWihcrCRIJRrORCOERMC832y823y4m';
        function encryptthis($data, $key)
        {
            $encryption_key = base64_decode($key);
            $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
            $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
            return base64_encode($encrypted . '::' . $iv);
        }

        function decryptthis($data, $key)
        {
            $encryption_key = base64_decode($key);
            list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2), 2, null);
            return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
        }


        $stmt = $conn->prepare("UPDATE accounts SET authCode = ? WHERE accountEmail = ?;");
        $stmt->execute([encryptthis($code, $key), $email]);

        echo json_encode([
            "status" => true,
        ]);
    } catch (Exception $e) {
        echo json_encode([
            "status" => false,
            "message" => $e->getMessage()
        ]);
    }
}
