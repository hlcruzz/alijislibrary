<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = $_POST['accountEmail'];
    $username = $_POST['accountUsername'];
    $password = password_hash($_POST['accountPword'], PASSWORD_DEFAULT);

    $file_name = $_FILES['accountImg']['name'] ?? null;
    $file_tmp = $_FILES['accountImg']['tmp_name'];
    $file_size = $_FILES['accountImg']['size'];
    $file_type = $_FILES['accountImg']['type'];

    $pathToDb = !empty($file_name) ? "./assets/img/accounts/" . basename($file_name) : null;
    $pathToFolder = "../assets/img/accounts/" . basename($file_name);

    $checkQuery = "SELECT * FROM accounts WHERE accountEmail = :email OR accountUsername = :username LIMIT 1;";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bindParam(":email", $email);
    $checkStmt->bindParam(":username", $username);
    $checkStmt->execute();

    if ($checkStmt->rowCount() > 0) {
        echo "exists";
        exit;
    }

    // Image validation and upload
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
        $query = "INSERT INTO accounts (accountImg, accountEmail, accountUsername, accountPassword)
                  VALUES (:accountImg, :accountEmail, :accountUsername, :accountPassword);";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":accountImg", $pathToDb);
        $stmt->bindParam(":accountEmail", $email);
        $stmt->bindParam(":accountUsername", $username);
        $stmt->bindParam(":accountPassword", $password);
        $stmt->execute();

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
