<?php
include "../lib/connection.php";
date_default_timezone_set('Asia/Manila');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['editAccountId'];
    $email = $_POST['editAccountEmail'];
    $username = $_POST['editAccountUsername'];
    $current_date = date("Y-m-d H:i:s");

    $file_name = $_FILES['editAccountImg']['name'] ?? null;
    $file_tmp = $_FILES['editAccountImg']['tmp_name'];
    $file_size = $_FILES['editAccountImg']['size'];
    $file_type = $_FILES['editAccountImg']['type'];

    $pathToDb = !empty($file_name) ? "./assets/img/accounts/" . basename($file_name) : null;

    $pathToFolder = "../assets/img/accounts/" . basename($file_name);
    if (!empty($file_name)) {
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
        $query = "UPDATE
            accounts
            SET
            accountImg = :editAccountImg,
            accountEmail = :editAccountEmail,
            accountUsername = :editAccountUsername,
            accountDateUpdated = :accountDateUpdated
            WHERE 
            id = :id
            ;";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":editAccountImg", $pathToDb);
        $stmt->bindParam(":editAccountEmail", $email);
        $stmt->bindParam(":editAccountUsername", $username);
        $stmt->bindParam(":accountDateUpdated", $current_date);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
