<?php
include "../lib/connection.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $icon = $_POST['icon'];
    $link = $_POST['link'];


    try {
        $stmt = $conn->prepare("UPDATE socials SET socialsIcon = :socialsIcon, socialsLink = :socialsLink WHERE id = :id;");
        $stmt->bindParam(":socialsIcon", $icon);
        $stmt->bindParam(":socialsLink", $link);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}