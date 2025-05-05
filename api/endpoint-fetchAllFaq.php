<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $stmt = $conn->prepare("SELECT id, faq_question, faq_answer, DATE_FORMAT(faq_date, '%W, %M %d, %Y %h:%i:%s %p') AS text_date, status FROM faq WHERE status = 1;");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}
