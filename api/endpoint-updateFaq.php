<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    try {
        $stmt = $conn->prepare("UPDATE faq SET faq_question = :faq_question, faq_answer = :faq_answer WHERE id = :id;");
        $stmt->bindParam(":faq_question", $question);
        $stmt->bindParam(":faq_answer", $answer);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}