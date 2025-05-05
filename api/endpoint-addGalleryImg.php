<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $maxSize = (1024 * 1024) * 15;
    $validTypes = ["image/jpg", "image/jpeg", "image/png"];
    $result = false;
    if (count($_FILES['file']['name']) > 5) {
        die("You can only upload 5 Images at a time!");
    }

    foreach ($_FILES['file']['name'] as $key => $file_name) {
        $temp_name = $_FILES['file']['tmp_name'][$key];
        $file_type = $_FILES['file']['type'][$key];
        $file_size = $_FILES['file']['size'][$key];
        $pathToDb = "./assets/img/galleryImg/" . basename($file_name);
        $pathToFolder = "../assets/img/galleryImg/" . basename($file_name);


        if ($file_size > $maxSize) {
            die("File is too large!");
        }
        if (!in_array($file_type, $validTypes)) {
            die("Invalid File Type!");
        }
    }

    $imageCount = count($_FILES['file']['name']);

    for ($i = 0; $i < $imageCount; $i++) {
        $temp_name = $_FILES['file']['tmp_name'][$i];
        $file_name = $_FILES['file']['name'][$i];
        $pathToDb = "./assets/img/galleryImg/" . basename($file_name);
        $pathToFolder = "../assets/img/galleryImg/" . basename($file_name);
        move_uploaded_file($temp_name, $pathToFolder);
        $stmt = $conn->prepare("INSERT INTO gallery (gallery_path) VALUES (:gallery_path);");
        $stmt->bindParam(":gallery_path", $pathToDb);
        $stmt->execute();
        $result = true;
    }

    if ($result) {
        echo 1;
    }
}