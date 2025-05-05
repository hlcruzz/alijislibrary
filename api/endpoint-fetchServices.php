<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $table = $_GET['table'];

    $query = "SELECT id, title, txt, DATE_FORMAT(date, '%W, %M %d, %Y %h:%i:%s %p') AS text_date FROM `$table` WHERE status = 1;";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}