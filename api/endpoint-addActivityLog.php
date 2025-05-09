<?php
session_start();
include "../lib/connection.php";

require '../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = 'asdkcyn347y5cn37ywuercyn237ryccnQcwYCn9YCn3ycOW3Y5CO9w3y5owyOYCNW7YcwhwjmfiJWPECTwpct-wervWERVwoejrhwcmERHOWihcrCRIJRrORCOERMC832y823y4m';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $action = $_POST['action'];
    $details = $_POST['details'];
    $decoded = JWT::decode($_COOKIE['token'], new Key($key, 'HS256'));

    $admin_id = $decoded->data->admin_id;

    $query = "INSERT INTO
    activity_logs
    (admin_id, action, details)
    VALUES
    (:admin_id, :action, :details)
    ;";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(":admin_id", $admin_id);
    $stmt->bindParam(":action", $action);
    $stmt->bindParam(":details", $details);
    $stmt->execute();
}