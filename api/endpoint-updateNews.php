<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['editNewsId'];
    $editNewsSubject = $_POST['editNewsSubject'];
    $editNewsMsg = $_POST['editNewsMsg'];

    if (!empty($_FILES['files']['name'][0])) {
        foreach ($_FILES['files']['name'] as $key => $file_name) {
            $maxSize = (1024 * 1024) * 5;

            if ($_FILES['files']['size'][$key] > $maxSize) {
                die("Image is too large!");
            }

            $file_types = ['image/jpg', 'image/jpeg', 'image/png'];

            if (!in_array($_FILES['files']['type'][$key], $file_types)) {
                die("Invalid File type!");
            }

            $pathToFolder = "../assets/img/libraryNews/" . basename($file_name);
            $pathToDb = "./assets/img/libraryNews/" . basename($file_name);

            try {
                $stmt1 = $conn->prepare("INSERT INTO library_news_img (library_news_id, library_news_img_path) VALUES (:library_news_id, :library_news_img_path);");
                $stmt1->bindParam(":library_news_id", $id);
                $stmt1->bindParam(":library_news_img_path", $pathToDb);
                $stmt1->execute();

                move_uploaded_file($_FILES['files']['tmp_name'][$key], $pathToFolder);
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
    }

    try {
        $stmt2 = $conn->prepare("UPDATE library_news SET library_news_subject = :library_news_subject, library_news_txt = :library_news_txt WHERE id = :id;");

        $stmt2->bindParam(":library_news_subject", $editNewsSubject);
        $stmt2->bindParam(":library_news_txt", $editNewsMsg);
        $stmt2->bindParam(":id", $id);
        $stmt2->execute();

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }



}