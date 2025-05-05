<?php
include "../lib/connection.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $icon = $_POST['icon'];
    $link = $_POST['link'];

    try {
        $stmt = $conn->prepare("INSERT INTO socials (socialsIcon, socialsLink) VALUES (:icon, :link);");
        $stmt->bindParam(':icon', $icon, PDO::PARAM_STR);
        $stmt->bindParam(':link', $link, PDO::PARAM_STR);
        $stmt->execute();

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }

}