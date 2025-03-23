<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $stmt = $conn->prepare("SELECT *, library_news.id AS news_id , DATE_FORMAT(library_news_date, '%W, %M %d, %Y %h:%i:%s %p') AS text_date FROM library_news LEFT JOIN library_news_img ON library_news_img.library_news_id = library_news.id GROUP BY library_news.id ORDER BY library_news.id DESC;");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}