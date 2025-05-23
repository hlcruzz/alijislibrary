<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");
include "../lib/connection.php";
require '../vendor/autoload.php';

use Firebase\JWT\JWT;
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
    $key = 'asdkcyn347y5cn37ywuercyn237ryccnQcwYCn9YCn3ycOW3Y5CO9w3y5owyOYCNW7YcwhwjmfiJWPECTwpct-wervWERVwoejrhwcmERHOWihcrCRIJRrORCOERMC832y823y4m';
    $token = JWT::encode(
        array(
            'iat' => time(),
            'nbf' => time(),
            'exp' => time() + 3600,
            'data' => array(
                'visitor' => $visitorType,
            )
        ),
        $key,
        'HS256'
    );
    setcookie("visitor", $token, [
        'expires' => time() + 604800,
        'path' => '/',
        'domain' => 'alijis-library.chmsu.edu.ph',
        'secure' => true,
        'httponly' => true,
        'samesite' => 'Strict'
    ]);
    echo 1;
}
?>