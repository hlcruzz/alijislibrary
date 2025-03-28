<?php

include "../lib/connection.php";

try {
    $sql = "SELECT id, feedbackName, feedbackEmail, feedbackMsg, feedbackIsRead, DATE_FORMAT(feedbackTime, '%W, %M %d, %Y %h:%i:%s %p') AS feedbackDate FROM feedbacks";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $feedbacks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($feedbacks);
} catch (PDOException $e) {
    $e->getMessage();
}
