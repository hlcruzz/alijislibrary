<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $file_name = $_FILES['editJournalImg']['name'];
    $file_tmp = $_FILES['editJournalImg']['tmp_name'];
    $file_size = $_FILES['editJournalImg']['size'];
    $file_type = $_FILES['editJournalImg']['type'];
    $pathToFolder = "../assets/img/eJournals/" . basename($file_name);
    $pathToDb = "./assets/img/eJournals/" . basename($file_name);
    $isImgEmpty = true;
    //CHECK IMAGES
    try {
        if (!empty($file_name)) {
            $isImgEmpty = false;
            $validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            $validSize = (1024 * 1024) * 5;

            if (!in_array($file_type, $validTypes)) {
                die("Invalid file type. Only JPG, JPEG, and PNG are allowed.");
            }

            if ($file_size > $validSize) {
                die("File size exceeds 5MB limit.");
            }

            if (!move_uploaded_file($file_tmp, $pathToFolder)) {
                die("Failed to upload file.");
            }
        }

        $imgQuery = $isImgEmpty ? '' : 'eJournalImg = :eJournalImg,';
        $query = "UPDATE ejournal SET $imgQuery eJournalTitle = :eJournalTitle, eJournalTxt = :eJournalTxt, eJournalLink = :eJournalLink WHERE id = :id;";
        $stmt = $conn->prepare($query);
        if (!$isImgEmpty) {
            $stmt->bindParam(':eJournalImg', $pathToDb);
        }
        $stmt->bindParam(':eJournalTitle', $_POST['editJournalTitle']);
        $stmt->bindParam(':eJournalTxt', $_POST['editJournalTxt']);
        $stmt->bindParam(':eJournalLink', $_POST['editJournalLink']);
        $stmt->bindParam(':id', $_POST['editJournalId']);
        $stmt->execute();

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }


}