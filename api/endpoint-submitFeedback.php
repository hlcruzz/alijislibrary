<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $feedbackName = $_POST['feedbackName'];
    $feedbackEmail = $_POST['feedbackEmail'];
    $feedbackMsg = $_POST['feedbackMsg'];

    try {
        $stmt = $conn->prepare("INSERT INTO feedbacks (feedbackName,feedbackEmail,feedbackMsg) VALUES (:feedbackName, :feedbackEmail, :feedbackMsg);");

        $stmt->bindParam(":feedbackName", $feedbackName);
        $stmt->bindParam(":feedbackEmail", $feedbackEmail);
        $stmt->bindParam(":feedbackMsg", $feedbackMsg);
        $stmt->execute();

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}