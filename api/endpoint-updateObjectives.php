<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['editObjectiveId'];
    $icon = $_POST['editObjectiveIcon'];
    $text = $_POST['editObjectiveText'];

    try {
        $sql = "UPDATE library_objectives SET objectives_icon = :icon, objectives_text = :text WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':icon', $icon);
        $stmt->bindParam(':text', $text);
        $stmt->execute();
        echo 1;
    } catch (Exception $e) {
        echo  $e->getMessage();
    }
}