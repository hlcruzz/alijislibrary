<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];

    try {
        $query = "UPDATE library_objectives SET status = 0 WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
