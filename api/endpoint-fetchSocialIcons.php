<?php
include "../lib/connection.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    try {
        $stmt = $conn->prepare("SELECT GROUP_CONCAT(socialsIcon SEPARATOR ',') AS dbIcons FROM socials;");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}