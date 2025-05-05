<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['editSectionId'];
    $title = $_POST['editSectionTitle'];
    $txt = $_POST['editSectionTxt'];

    $hasImageQuery = '';
    $hasImage = false;
    if (!empty($_FILES['editSectionImg']['name'])) {
        $file_name = $_FILES['editSectionImg']['name'];
        $file_tmp = $_FILES['editSectionImg']['tmp_name'];
        $file_size = $_FILES['editSectionImg']['size'];
        $file_type = $_FILES['editSectionImg']['type'];

        $pathToDb = "./assets/img/about/" . basename($file_name);

        $pathToFolder = "../assets/img/about/" . basename($file_name);

        $validTypes = ["image/jpg", "image/jpeg", "image/png"];
        $maxSize = (1024 * 1024) * 5;

        if (!in_array($file_type, $validTypes)) {
            die("Invalid file type. Only JPG, JPEG, and PNG are allowed.");
        }

        if ($file_size > $maxSize) {
            die("File size exceeds the maximum limit of 5MB.");
        }

        if (!move_uploaded_file($file_tmp, $pathToFolder)) {
            die("Failed to upload file.");
        }
        $hasImageQuery = 'sectionsImg = :sectionsImg,';
        $hasImage = true;
    }

    try {
        $query = "UPDATE
            sections
            SET
            $hasImageQuery
            sectionsTitle = :sectionsTitle,
            sectionsTxt = :sectionsTxt
            WHERE
            id = :id
            ;";
        $stmt = $conn->prepare($query);
        if ($hasImage) {
            $stmt->bindParam(":sectionsImg", $pathToDb);
        }
        $stmt->bindParam(":sectionsTitle", $title);
        $stmt->bindParam(":sectionsTxt", $txt);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }



}