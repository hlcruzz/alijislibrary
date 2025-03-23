<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newsSubject = $_POST['newsSubject'];
    $newsMsg = $_POST['newsMsg'];

    if (!empty($_FILES['files']['name'][0])) {
        foreach ($_FILES['files']['name'] as $key => $file_name) {
            $file_type = $_FILES['files']['type'][$key];
            $file_size = $_FILES['files']['size'][$key];

            $maxSize = (1024 * 1024) * 5;
            $fileTypes = ["image/jpg", "image/jpeg", "image/png"];

            if ($file_size > $maxSize) {
                die("File is too large!");
            }

            if (!in_array($file_type, $fileTypes)) {
                die("Invalid File Type!");
            }
        }
    }

    try {
        $stmt = $conn->prepare("INSERT INTO library_news (library_news_subject,library_news_txt) VALUES (:library_news_subject , :library_news_txt);");
        $stmt->bindParam(":library_news_subject", $newsSubject);
        $stmt->bindParam(":library_news_txt", $newsMsg);
        $stmt->execute();
        $id = $conn->lastInsertId();

        foreach ($_FILES['files']['name'] as $key => $file_name) {
            $file_tmp_name = $_FILES['files']['tmp_name'][$key];
            $file_type = $_FILES['files']['type'][$key];
            $file_size = $_FILES['files']['size'][$key];
            $pathToDb = "./assets/img/libraryNews/" . basename($file_name);
            $pathToFolder = "../assets/img/libraryNews/" . basename($file_name);


            $stmt2 = $conn->prepare("INSERT INTO library_news_img (library_news_id, library_news_img_path) VALUES (:library_news_id, :library_news_img_path)");
            $stmt2->bindParam(":library_news_id", $id);
            $stmt2->bindParam(":library_news_img_path", $pathToDb);
            $stmt2->execute();

            move_uploaded_file($file_tmp_name, $pathToFolder);
        }

        echo "News Uploaded!";

    } catch (Exception $e) {
        echo $e->getMessage();
    }





}
?>