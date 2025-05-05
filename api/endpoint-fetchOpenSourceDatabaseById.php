<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT id, opensource_databases_img, opensource_databases_link FROM opensource_databases WHERE id = :id;");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}