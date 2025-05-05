<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $visitorType = $_POST['visitorType'];

    $query = "INSERT INTO visitor (visitor_type) VALUES (:visitor_type);";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":visitor_type", $visitorType);
    $stmt->execute();

    echo 1;
}
