<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $tableName = "opensource_databases";
    $page = "Open Source Databases";
    try {
        $stmt1 = $conn->prepare("UPDATE opensource_databases SET status = 0 WHERE id = :id;");
        $stmt1->bindParam(":id", $id);
        $stmt1->execute();

        $stmt2 = $conn->prepare("INSERT INTO archive (fk_id,tableName,pageName) VALUES (:fk_id, :tableName, :pageName);");
        $stmt2->bindParam(":fk_id", $id);
        $stmt2->bindParam(":tableName", $tableName);
        $stmt2->bindParam(":pageName", $page);
        $stmt2->execute();

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}