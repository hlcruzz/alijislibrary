<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $foundationName = $_GET['foundationName'];
    $stmt = $conn->prepare("SELECT * FROM foundation WHERE foundationName = :foundationName;");
    $stmt->bindParam(":foundationName", $foundationName);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($result);
}