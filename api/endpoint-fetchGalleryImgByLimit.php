<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $limit = $_GET['limit'];

    $query = "SELECT 
    id AS gallery_id, 
    gallery_path ,
    status
    FROM gallery 
    WHERE status = 1
    ORDER BY id DESC
    LIMIT :limit;
    ";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}
