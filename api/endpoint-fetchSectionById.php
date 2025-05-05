<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET['id'];

    $query = "SELECT
    id,
    sectionsImg,
    sectionsTitle,
    sectionsTxt
    FROM
    sections
    WHERE 
    id = :id
    ;";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($result);
}