<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $query = "SELECT 
    id, 
    sectionsImg, 
    sectionsTitle, 
    sectionsTxt, 
    DATE_FORMAT(sectionsDate, '%W, %M %d, %Y %h:%i:%s %p') AS sectionsDate 
    FROM sections
    WHERE status = 1
    ;";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}