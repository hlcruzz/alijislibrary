<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $objectivesIcon = $_POST['icon'];
    $objectivesText = $_POST['text'];

    try {
        $stmt = $conn->prepare("INSERT INTO library_objectives (objectives_icon, objectives_text) VALUES (:objectivesIcon, :objectivesText)");
        $stmt->bindParam(":objectivesIcon", $objectivesIcon);
        $stmt->bindParam(":objectivesText", $objectivesText);
        $stmt->execute();
        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
