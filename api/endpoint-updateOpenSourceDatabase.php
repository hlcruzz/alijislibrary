<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $dbId = $_POST['dbId'];
    $editDbLink = $_POST['editDbLink'];
    $file_name = $_FILES['editDbImg']['name'];
    $temp_name = $_FILES['editDbImg']['tmp_name'];
    $pathToDb = "./assets/img/openSourceDatabase/" . basename($file_name);
    $pathToFolder = "../assets/img/openSourceDatabase/" . basename($file_name);
    $imgQuery = '';

    //Checking Image
    if (!empty($file_name)) {
        $imgQuery = 'opensource_databases_img = :opensource_databases_img,';
        $validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
        if (!in_array($_FILES['editDbImg']['type'], $validTypes)) {
            die("Invalid File Type!");
        }

        $maxSize = (1024 * 1024) * 5;
        if ($_FILES['editDbImg']['size'] > $maxSize) {
            die("Image is too Large!");
        }
    }

    $query = "UPDATE
    opensource_databases
    SET
    $imgQuery
    opensource_databases_link = :opensource_databases_link
    WHERE id = :id;
    ";

    try {
        $stmt = $conn->prepare($query);

        $stmt->bindParam(":opensource_databases_link", $editDbLink);
        if (!empty($file_name)) {
            $stmt->bindParam(":opensource_databases_img", $pathToDb);
            move_uploaded_file($temp_name, $pathToFolder);
        }
        $stmt->bindParam(":id", $dbId);
        $stmt->execute();


        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}