<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $isRead = 0;
    $stmt = $conn->prepare("SELECT COUNT(*) as totalReadFeedbacks FROM feedbacks WHERE feedbackIsRead = :isread");
    $stmt->bindParam(":isread", $isRead);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($result);
}