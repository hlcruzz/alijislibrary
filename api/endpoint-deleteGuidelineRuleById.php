<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];

    try {
        $stmt = $conn->prepare("DELETE FROM guideline_rules WHERE id = :id;");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}