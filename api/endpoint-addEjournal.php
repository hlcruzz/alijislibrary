<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $file_name = $_FILES['journalImg']['name'];
    $file_tmp = $_FILES['journalImg']['tmp_name'];
    $file_size = $_FILES['journalImg']['size'];
    $file_type = $_FILES['journalImg']['type'];

    $journalTitle = $_POST['journalTitle'];
    $journalTxt = $_POST['journalTxt'];
    $journalLink = $_POST['journalLink'];

    //CHECK IMAGE
    $validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    $maxSize = 2 * 1024 * 1024;
    $pathToDb = "./assets/img/eJournals/" . basename($file_name);
    $pathToFolder = "../assets/img/eJournals/" . basename($file_name);

    if ($file_size > $maxSize) {
        die("File size is too large. Maximum size is 2MB.");
    }
    if (!in_array($file_type, $validTypes)) {
        die("Invalid file type. Only JPG, JPEG and PNG are allowed.");
    }

    if (!move_uploaded_file($file_tmp, $pathToFolder)) {
        die("Failed to upload file.");
    }
    try {
        $query = "INSERT INTO ejournal (eJournalImg,eJournalTitle,eJournalTxt,eJournalLink) VALUES (:journalImg,:journalTitle,:journalTxt,:journalLink)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':journalImg', $pathToDb);
        $stmt->bindParam(':journalTitle', $journalTitle);
        $stmt->bindParam(':journalTxt', $journalTxt);
        $stmt->bindParam(':journalLink', $journalLink);
        $stmt->execute();

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}