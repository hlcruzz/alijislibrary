<?php
include "../lib/connection.php";
require '../vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $key = 'asdkcyn347y5cn37ywuercyn237ryccnQcwYCn9YCn3ycOW3Y5CO9w3y5owyOYCNW7YcwhwjmfiJWPECTwpct-wervWERVwoejrhwcmERHOWihcrCRIJRrORCOERMC832y823y4m';
    $decoded = JWT::decode($_COOKIE['token'], new Key($key, 'HS256'));

    if ($decoded->data->role === 'admin') {

        echo json_encode([
            "status" => true,
        ]);
        exit;
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Invalid Role"
        ]);
    }
}