<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $stmt = $conn->prepare("SELECT id, opensource_databases_img, opensource_databases_link, DATE_FORMAT(opensource_databases_date, '%W, %M %d, %Y %h:%i:%s %p') AS text_date FROM opensource_databases WHERE status = 1;");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}