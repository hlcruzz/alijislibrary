<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $type = $_GET['type'];
    $query = "SELECT
    online_reference_path,
    online_reference_type,
    online_reference_name,
    online_reference_desc,
    online_reference_link,
    status
    FROM online_reference
    WHERE online_reference_type = :online_reference_type AND status = 1
    ;
    ";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":online_reference_type", $type);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}
