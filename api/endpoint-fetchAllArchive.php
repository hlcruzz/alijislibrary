<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $stmt = $conn->prepare("SELECT id, fk_id, tableName, pageName, DATE_FORMAT(archiveDate, '%W, %M %d, %Y %h:%i:%s %p') AS text_date FROM archive;");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}