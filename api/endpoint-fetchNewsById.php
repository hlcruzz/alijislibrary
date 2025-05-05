<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT library_news.id AS news_id, 
                                   library_news.*, 
                                   library_news_img.*
                            FROM library_news
                            LEFT JOIN library_news_img ON library_news.id = library_news_img.library_news_id
                            WHERE library_news.id = :id;");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}
