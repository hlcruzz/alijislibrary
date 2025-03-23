<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $feedbackIsRead = 1;

    try {
        $stmt = $conn->prepare("UPDATE feedbacks SET feedbackIsRead = :feedbackIsRead WHERE id = :id;");
        $stmt->bindParam(":feedbackIsRead", $feedbackIsRead);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}