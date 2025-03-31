<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET['id'];

    $query = "SELECT 
    id,
    online_reference_path,
    online_reference_type,
    online_reference_name,
    online_reference_link,
    online_reference_desc
    FROM online_reference
    WHERE id = :id;
    ";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($result);
}