<?php

include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $query = "SELECT 
    id,
    online_reference_path,
    online_reference_type,
    online_reference_name,
    online_reference_desc,
    online_reference_link,
    online_reference_path,
    DATE_FORMAT(online_reference_date, '%W, %M %d, %Y %h:%i:%s %p') AS text_date
    FROM online_reference;";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}