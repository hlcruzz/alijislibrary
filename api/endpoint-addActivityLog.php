<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $action = $_POST['action'];
    $details = $_POST['details'];
    $ip_address = $_SERVER['REMOTE_ADDR'];

    $query = "INSERT INTO
    activity_logs
    (admin_id, action, details, ip_address)
    VALUES
    (:admin_id, :action, :details, :ip_address)
    ;";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(":admin_id", $id);
    $stmt->bindParam(":action", $action);
    $stmt->bindParam(":details", $details);
    $stmt->bindParam(":ip_address", $ip_address);
    $stmt->execute();
}