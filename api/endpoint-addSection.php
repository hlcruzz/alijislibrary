<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sectionTitle = $_POST['sectionTitle'];
    $sectionTxt = $_POST['sectionTxt'];
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];

    $validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    $maxSize = 2 * 1024 * 1024;
    $pathToDb = "./assets/img/sections/" . basename($file_name);
    $pathToFolder = "../assets/img/sections/" . basename($file_name);

    if ($file_size > $maxSize) {
        die("File size is too large. Maximum size is 2MB.");
    }
    if (!in_array($file_type, $validTypes)) {
        die("Invalid file type. Only JPG, JPEG and PNG are allowed.");
    }



    try {
        $query = "INSERT INTO
        sections
        (sectionsImg, sectionsTitle, sectionsTxt)
        VALUES
        (:sectionsImg, :sectionsTitle, :sectionsTxt)
        ;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":sectionsImg", $pathToDb);
        $stmt->bindParam(":sectionsTitle", $sectionTitle);
        $stmt->bindParam(":sectionsTxt", $sectionTxt);
        $stmt->execute();
        if (!move_uploaded_file($file_tmp, $pathToFolder)) {
            die("Failed to upload file.");
        }

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}