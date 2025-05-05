<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fileName = $_FILES['file']['name'];
    $file_tmp_name = $_FILES['file']['tmp_name'];
    $pathToFolder = "../assets/img/onlineReferenceTools/" . basename($fileName);
    $pathToDb = "./assets/img/onlineReferenceTools/" . basename($fileName);

    $online_reference_type = $_POST['online_reference_type'];
    $online_reference_name = $_POST['online_reference_name'];
    $online_reference_desc = $_POST['online_reference_desc'];
    $online_reference_link = $_POST['online_reference_link'];

    //checking files
    $validTypes = ["image/jpeg", "image/jpg", "image/png"];
    if (!in_array($_FILES['file']['type'], $validTypes)) {
        die("Invalid File Type!");
    }


    $maxSize = (1024 * 1024) * 5;
    if ($_FILES['file']['size'] > $maxSize) {
        die("Image is too large!");
    }

    try {
        $stmt = $conn->prepare("INSERT INTO online_reference (online_reference_path,online_reference_type,online_reference_name,online_reference_desc,online_reference_link)
        VALUES (:online_reference_path,:online_reference_type,:online_reference_name, :online_reference_desc, :online_reference_link);");

        $stmt->bindParam(":online_reference_path", $pathToDb);
        $stmt->bindParam(":online_reference_type", $online_reference_type);
        $stmt->bindParam(":online_reference_name", $online_reference_name);
        $stmt->bindParam(":online_reference_desc", $online_reference_desc);
        $stmt->bindParam(":online_reference_link", $online_reference_link);
        $stmt->execute();

        move_uploaded_file($file_tmp_name, $pathToFolder);

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}