<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $file_name = $_FILES['personnel_image']['name'];
    $file_tmp = $_FILES['personnel_image']['tmp_name'];
    $file_size = $_FILES['personnel_image']['size'];
    $file_type = $_FILES['personnel_image']['type'];

    $pathToDb = "./assets/img/personnel/" . basename($file_name);
    $pathToFolder = "../assets/img/personnel/" . basename($file_name);

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

    try {
        $query = "INSERT
        INTO personnel (personnelImg,personnelRole, personnelName)
        VALUES (:personnelImg, :personnelRole, :personnelName);
        ";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':personnelImg', $pathToDb);
        $stmt->bindParam(':personnelRole', $_POST['personnelRole']);
        $stmt->bindParam(':personnelName', $_POST['personnelName']);
        $stmt->execute();

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}