<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * ,DATE_FORMAT(feedbackTime, '%W, %M %d, %Y %h:%i:%s %p') AS feedbackDate  FROM feedbacks WHERE id = :id;");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($result);
}