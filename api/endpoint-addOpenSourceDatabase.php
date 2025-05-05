<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] = "POST") {
    $file_name = $_FILES['dbImg']['name'];
    $temp_name = $_FILES['dbImg']['tmp_name'];
    $pathToDb = "./assets/img/openSourceDatabase/" . basename($file_name);
    $pathToFolder = "../assets/img/openSourceDatabase/" . basename($file_name);
    $dbLink = $_POST['dbLink'];

    //CHECK IMAGE
    $validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
    if (!in_array($_FILES['dbImg']['type'], $validTypes)) {
        die("Invalid File Type!");
    }

    $maxSize = (1024 * 1024) * 5;
    if ($_FILES['dbImg']['size'] > $maxSize) {
        die("Image is too large!");
    }

    try {
        $stmt = $conn->prepare("INSERT INTO opensource_databases (opensource_databases_img, opensource_databases_link) VALUES (:opensource_databases_img, :opensource_databases_link);");
        $stmt->bindParam(":opensource_databases_img", $pathToDb);
        $stmt->bindParam(":opensource_databases_link", $dbLink);
        $stmt->execute();

        move_uploaded_file($temp_name, $pathToFolder);
        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}