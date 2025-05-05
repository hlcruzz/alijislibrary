<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $table = $_POST['table'];
    $title = $_POST['title'];
    $txt = $_POST['txt'];

    $query = "UPDATE `$table` SET title = :title, txt = :txt WHERE id = :id;";
    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":txt", $txt);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}