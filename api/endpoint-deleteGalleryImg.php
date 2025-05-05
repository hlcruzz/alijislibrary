<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $ids = $_POST['ids'];
    $result = false;
    for ($i = 0; $i < count($ids); $i++) {
        $stmt = $conn->prepare("UPDATE gallery SET status = 0 WHERE id = :ids");
        $stmt->bindParam(":ids", $ids[$i]);
        $stmt->execute();

        $stmt2 = $conn->prepare("INSERT INTO archive (fk_id, tableName, pageName) VALUES (:id, 'gallery', 'Library Gallery');");
        $stmt2->bindParam(":id", $ids[$i]);
        $stmt2->execute();
        $result = true;
    }

    if ($result) {
        echo 1;
    }
}