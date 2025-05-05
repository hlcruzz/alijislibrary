<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $table = $_POST['table'];

    try {
        $query1 = "UPDATE `$table` SET status = 0 WHERE id = :id;";
        $stmt = $conn->prepare($query1);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $query2 = "INSERT INTO archive(fk_id, tableName, pageName) VALUES (:id, '$table', 'Services');";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bindParam(":id", $id);
        $stmt2->execute();
        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}