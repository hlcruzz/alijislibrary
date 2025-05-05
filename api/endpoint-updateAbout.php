<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = 1;
    $aboutTextarea = $_POST['aboutTextarea'];

    try {
        $queryImg = empty($_FILES['aboutImg']['name']) ? '' : 'aboutImg = :aboutImg, ';
        $query = "UPDATE about SET $queryImg aboutTxt = :aboutTxt WHERE id = :id;";
        $stmt = $conn->prepare($query);
        if (!empty($_FILES['aboutImg']['name'])) {
            $file_name = $_FILES['aboutImg']['name'];
            $file_tmp = $_FILES['aboutImg']['tmp_name'];
            $file_size = $_FILES['aboutImg']['size'];
            $file_type = $_FILES['aboutImg']['type'];
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
            $stmt->bindParam(':aboutImg', $pathToDb);
        }
        $stmt->bindParam(':aboutTxt', $aboutTextarea);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}