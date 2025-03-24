<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $stmt = $conn->prepare("SELECT id,downloads_name, downloads_type,downloads_path, DATE_FORMAT(downloads_date, '%W, %M %d, %Y %h:%i:%s %p') AS text_date FROM downloads;");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}