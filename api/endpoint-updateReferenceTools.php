<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $fileName = $_FILES['edit_file_tool']['name'];
    $file_tmp_name = $_FILES['edit_file_tool']['tmp_name'];
    $pathToFolder = "../assets/img/onlineReferenceTools/" . basename($fileName);
    $pathToDb = "./assets/img/onlineReferenceTools/" . basename($fileName);

    $id = $_POST['edit_online_reference_id'];
    $refType = $_POST['edit_online_reference_type'];
    $refName = $_POST['edit_online_reference_name'];
    $refDesc = $_POST['edit_online_reference_desc'];
    $refLink = $_POST['edit_online_reference_link'];

    $isFileEmpty = (empty($fileName)) ? '' : "online_reference_path = :online_reference_path,";
    $query = "UPDATE online_reference 
    SET 
    online_reference_type = :online_reference_type,
    online_reference_name = :online_reference_name,
    online_reference_desc = :online_reference_desc,
    $isFileEmpty
    online_reference_link = :online_reference_link
    WHERE id = :id;
    ";

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":online_reference_type", $refType);
        $stmt->bindParam(":online_reference_name", $refName);
        $stmt->bindParam(":online_reference_desc", $refDesc);
        $stmt->bindParam(":online_reference_link", $refLink);
        $stmt->bindParam(":id", $id);
        if ($isFileEmpty != '') {
            $stmt->bindParam(":online_reference_path", $pathToDb);
            move_uploaded_file($file_tmp_name, $pathToFolder);
        }
        $stmt->execute();

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}