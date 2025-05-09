<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['adminContactsId'];
    $website = preg_replace('/\s+/', '', $_POST['adminContactsWebsite']);
    $telNum = $_POST['adminContactsTelNum'];
    $email = $_POST['adminContactsEmail'];
    $address = $_POST['adminContactsAddress'];

    $query = "UPDATE contacts 
        SET
        contactsEmail = :contactsEmail,
        contactsTelNum = :contactsTelNum,
        contactsAddress = :contactsAddress,
        contactsWebsite = :contactsWebsite
        WHERE 
        id = :id;
    ";
    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':contactsEmail', $email);
        $stmt->bindParam(':contactsTelNum', $telNum);
        $stmt->bindParam(':contactsAddress', $address);
        $stmt->bindParam(':contactsWebsite', $website);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo 1;

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}