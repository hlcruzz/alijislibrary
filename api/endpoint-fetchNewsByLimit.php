<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $limit = $_GET['limit'];
    $stmt = $conn->prepare("SELECT *, DATE_FORMAT(library_news_date, '%W, %M %d, %Y %h:%i:%s %p') AS text_date FROM library_news ORDER BY id DESC LIMIT :limit;");
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}