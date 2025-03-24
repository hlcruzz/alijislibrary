<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $file = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $file_ext = pathinfo($file, PATHINFO_EXTENSION);
    $file_tmp_name = $_FILES['file']['tmp_name'];
    $pathToDb = $pathToFolder = "./assets/download/" . basename($file);
    $pathToFolder = "../assets/download/" . basename($file);

    $validTypes = [
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.ms-excel',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    $maxSize = (1025 * 1024) * 5;


    //CHECK FILES
    if (!in_array($file_type, $validTypes)) {
        die("Invalid file type!");
    }

    if ($file_size > $maxSize) {
        die("File is too large!");
    }

    try {
        $stmt = $conn->prepare("INSERT INTO downloads (downloads_name, downloads_path, downloads_type) VALUES (:downloads_name, :downloads_path, :downloads_type);");
        $stmt->bindParam(":downloads_name", $file);
        $stmt->bindParam(":downloads_path", $pathToDb);
        $stmt->bindParam(":downloads_type", $file_ext);
        $stmt->execute();

        move_uploaded_file($file_tmp_name, $pathToFolder);

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }

}