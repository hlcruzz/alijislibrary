<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $tableId = $_POST['tableId'];
    $tableName = $_POST['tableName'];

    try {
        $stmt = $conn->prepare("UPDATE $tableName SET status = 1 WHERE id = :tableId;");
        $stmt->bindParam(":tableId", $tableId);
        $stmt->execute();

        $stmt2 = $conn->prepare("DELETE FROM archive WHERE id = :id;");
        $stmt2->bindParam(":id", $id);
        $stmt2->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}