<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];

    try {
        $stmt = $conn->prepare("UPDATE ejournal SET status = 0 WHERE id = :id;");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $stmt2 = $conn->prepare("INSERT INTO archive (fk_id, tableName, pageName) VALUES (:id, 'ejournal', 'E - Journals');");
        $stmt2->bindParam(":id", $id);
        $stmt2->execute();
        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}