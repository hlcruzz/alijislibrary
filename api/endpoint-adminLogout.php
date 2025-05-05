<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];

    $stmt = $conn->prepare("UPDATE accounts SET accountLogin = 0 WHERE id = :id;");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}