<?php
include "../lib/connection.php";
date_default_timezone_set('Asia/Manila');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_FILES['edit_personnel_image']['name'])) {
        $file_name = $_FILES['edit_personnel_image']['name'];
        $file_tmp = $_FILES['edit_personnel_image']['tmp_name'];
        $file_size = $_FILES['edit_personnel_image']['size'];
        $file_type = $_FILES['edit_personnel_image']['type'];


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
    }
    try {
        $personnelDateUpdated = date("Y-m-d H:i:s");
        $imgQuery = (empty($_FILES['edit_personnel_image']['name'])) ? '' : 'personnelImg = :personnelImg,';

        $query = "UPDATE
        personnel
        SET 
        personnelRole = :personnelRole,
        $imgQuery
        personnelName = :personnelName,
        personnelDateUpdated = :personnelDateUpdated
        WHERE
        id = :id;
        ";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":personnelRole", $_POST['editPersonnelRole']);
        if (!empty($_FILES['edit_personnel_image']['name'])) {
            $pathToDb = "./assets/img/personnel/" . basename($_FILES['edit_personnel_image']['name']);
            $stmt->bindParam(":personnelImg", $pathToDb);
        }
        $stmt->bindParam(":personnelName", $_POST['editPersonnelName']);
        $stmt->bindParam(":personnelDateUpdated", $personnelDateUpdated);
        $stmt->bindParam(":id", $_POST['editPersonnelId']);
        $stmt->execute();

        echo 1;

    } catch (Exception $e) {
        echo $e->getMessage();
    }

}