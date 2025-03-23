<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $search = (isset($_GET['search']) && !empty($_GET['search'])) ? '%' . $_GET['search'] . '%' : "";
    $limit = (isset($_GET['limit']) && !empty($_GET['limit'])) ? $_GET['limit'] : "";
    $condition1 = $search == "" ? "" : 'WHERE library_news.library_news_subject LIKE :search OR library_news.library_news_txt LIKE :search';
    $condition2 = $limit == "" ? "" : 'LIMIT :limit';
    $stmt = $conn->prepare("
        SELECT 
            library_news.*, 
            DATE_FORMAT(library_news_date, '%W, %M %d, %Y %h:%i:%s %p') AS text_date, 
            GROUP_CONCAT(library_news_img.library_news_img_path) AS images
        FROM 
            library_news 
        LEFT JOIN 
            library_news_img 
        ON 
            library_news.id = library_news_img.library_news_id
        $condition1
        GROUP BY 
            library_news.id 
        ORDER BY 
            library_news.id DESC
        $condition2    
            ;
    ");

    if ($search != "") {
        $stmt->bindParam(":search", $search);
    }

    if ($limit != "") {
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    }

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}
