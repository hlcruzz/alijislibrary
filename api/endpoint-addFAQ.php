<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    try {
        $stmt = $conn->prepare("INSERT INTO faq (faq_question, faq_answer) VALUES (:faq_question, :faq_answer);");
        $stmt->bindParam(":faq_question", $question);
        $stmt->bindParam(":faq_answer", $answer);
        $stmt->execute();

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}