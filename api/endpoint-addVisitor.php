<?php
session_start();
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $visitorType = $_POST['visitorType'];
    $captcha = $_POST['captcha'];

    if (!$captcha) {
        echo "Please verify you're not a robot.";
        exit;
    }

    $secretKey = "6LeuRjIrAAAAACFwy0NM3VYbD_o8DcagWC9EwCUE";
    $verifyURL = "https://www.google.com/recaptcha/api/siteverify";

    $response = file_get_contents($verifyURL . '?secret=' . $secretKey . '&response=' . $captcha);
    $responseData = json_decode($response);


    if (!$responseData->success) {
        echo "Captcha validation failed. Try again.";
        exit;
    }

    $query = "INSERT INTO visitor (visitor_type) VALUES (:visitor_type);";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":visitor_type", $visitorType);
    $stmt->execute();
    $_SESSION['visitor'] = true;
    echo 1;
}
?>