<?php
include "../lib/connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/library/PHPMailer/src/Exception.php';
require '../assets/library/PHPMailer/src/PHPMailer.php';
require '../assets/library/PHPMailer/src/SMTP.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];

    $checkQuery = "SELECT accountEmail FROM accounts WHERE accountEmail = :email LIMIT 1;";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bindParam(":email", $email);
    $checkStmt->execute();

    if ($checkStmt->rowCount() == 0) {
        echo 0;
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
                <br>
                <p style="font-size: 13px; color: #888;">If you did not initiate this request, please secure your account immediately.</p>
                <p style="font-size: 13px; color: #888;">- Alijis Campus Library System</p>
            </div>
        </body>
        </html>
        ';

        $mail->send();
        $stmt = $conn->prepare("UPDATE accounts SET authCode = :authCode WHERE accountEmail = :accountEmail;");
        $stmt->bindParam(":authCode", $code);
        $stmt->bindParam(":accountEmail", $email);
        $stmt->execute();
        echo 1;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
