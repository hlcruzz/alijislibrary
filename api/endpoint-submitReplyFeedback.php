<?php
include "../lib/connection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../assets/library/PHPMailer/src/Exception.php';
require '../assets/library/PHPMailer/src/PHPMailer.php';
require '../assets/library/PHPMailer/src/SMTP.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $reply = $_POST['reply'];
    try {
        $mail = new PHPMailer(true);
        $stmt = $conn->prepare("INSERT INTO feedbacks_reply (feedbacks_id,feedbacks_reply_msg) VALUES (:feedbacks_id,:feedbacks_reply_msg);");
        $stmt->bindParam(":feedbacks_id", $id);
        $stmt->bindParam(":feedbacks_reply_msg", $reply);
        $stmt->execute();

        // Server settings
        $mail->isSMTP();                              // Send using SMTP
        $mail->Host = 'smtp.gmail.com';                // Set the SMTP server to send through
        $mail->SMTPAuth = true;                        // Enable SMTP authentication
        $mail->Username = 'hlgcruz.chmsu@gmail.com';   // SMTP write your email
        $mail->Password = 'vestizqrfqrgosiq';          // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  // Enable implicit SSL encryption
        $mail->Port = 465;

        // Recipients
        $mail->setFrom("hlgcruz.chmsu@gmail.com", "Alijis Campus Library"); // Sender Email and name
        $mail->addAddress($email);    // Add a recipient email
        $mail->addReplyTo("hlgcruz.chmsu@gmail.com");  // Reply to sender email

        // Content (HTML body for the email)
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = "Alijis Campus Library Feedback";  // Email subject heading

        // HTML Body
        $mail->Body = "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Library Feedback Response</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        color: #333;
                        background-color: #f9f9f9;
                        margin: 0;
                        padding: 20px;
                    }
                    .container {
                        width: 100%;
                        max-width: 600px;
                        margin: 0 auto;
                        background-color: #ffffff;
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    }
                    h1 {
                        color: #2c3e50;
                    }
                    p {
                        line-height: 1.6;
                        margin: 10px 0;
                    }
                    .footer {
                        font-size: 14px;
                        color: #888;
                        text-align: center;
                        margin-top: 20px;
                    }
                    .signature {
                        font-weight: bold;
                        color: #2c3e50;
                    }
                    .response {
                        background-color: #f0f8ff;
                        padding: 10px;
                        border-left: 3px solid #3498db;
                        margin-bottom: 20px;
                    }
                </style>
            </head>
            <body>

                <div class='container'>
                    <h1>Hello $name,</h1>
                    <p>Thank you for reaching out to us and sharing your feedback. We truly value your input and appreciate the time you've taken to help us improve our library services.</p>
                    

                    <p>Our team has reviewed your feedback and would like to address the points you've raised.</p>
                    
                    <div class='response'>
                        <strong>Admin's Reply:</strong>
                        <p>$reply</p>
                    </div>

                    <p>If you have any further questions or suggestions, please don't hesitate to reach out. We are always happy to hear from our community.</p>

                    <p>Thank you once again for your valuable feedback. We look forward to serving you better!</p>

                    <p class='signature'>Best regards,<br>The Alijis Campus Library <br>Admin</p>
                </div>

            </body>
            </html>";

        $mail->send();
        echo "Feedback response sent!";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

}