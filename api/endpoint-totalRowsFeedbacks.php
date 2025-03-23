<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $stmt = $conn->prepare("SELECT COUNT(*) as totalRows FROM feedbacks;");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
}