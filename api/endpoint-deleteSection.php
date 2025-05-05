<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];

    try {

        $stmt = $conn->prepare("UPDATE sections SET status = 0 WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $stmt2 = $conn->prepare("INSERT INTO archive(fk_id, tableName, pageName) VALUES (:id, 'sections', 'Library Sections')");
        $stmt2->bindParam(":id", $id);
        $stmt2->execute();

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
