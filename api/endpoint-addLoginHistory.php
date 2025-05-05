<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];

    $query = "INSERT INTO login_history (account_id) VALUES (:account_id);";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":account_id", $id);
    $stmt->execute();
}