<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $periodicalId = $_POST['periodical_pk_id'];
    $periodicalsTitle = $_POST['editTitle'];
    $periodicalsType = $_POST['type'];
    $periodicalsCategory = $_POST['editCategory'];
    $periodicalsAuthor = $_POST['editAuthor'];
    $periodicalsDesc = $_POST['editDesc'];

    try {
        $query = "UPDATE periodicals 
          SET 
            periodicalsTitle = :periodicalsTitle,
            periodicalsType = :periodicalsType,
            periodicalsCategory = :periodicalsCategory,
            periodicalsAuthor = :periodicalsAuthor,
            periodicalsDesc = :periodicalsDesc
          WHERE id = :id;
          ";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':periodicalsTitle', $periodicalsTitle);
        $stmt->bindParam(':periodicalsType', $periodicalsType);
        $stmt->bindParam(':periodicalsCategory', $periodicalsCategory);
        $stmt->bindParam(':periodicalsAuthor', $periodicalsAuthor);
        $stmt->bindParam(':periodicalsDesc', $periodicalsDesc);
        $stmt->bindParam(':id', $periodicalId);
        $stmt->execute();

        if (!empty($_FILES['files']['name'][0])) {
            $query2 = "INSERT INTO periodical_images
            (periodical_id,image_url)
            VALUES
            (:periodical_id, :image_url);
            ";
            for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
                $file_name = $_FILES['files']['name'][$i];
                $file_tmp = $_FILES['files']['tmp_name'][$i];
                $file_type = $_FILES['files']['type'][$i];
                $file_size = $_FILES['files']['size'][$i];

                $maxSize = (1024 * 1024) * 5; // 2MB
                $allowedTypes = array('image/jpeg', 'image/png', 'image/gif', 'image/jpg');
                $pathToFolder = '../assets/img/magazine&journal/' . basename($file_name);
                $pathToDb = './assets/img/magazine&journal/' . basename($file_name);

                if ($file_size > $maxSize) {
                    die("File size exceeds the maximum limit of 5MB.");
                }
                if (!in_array($file_type, $allowedTypes)) {
                    die("Invalid file type. Only JPG, JPEG and PNG are allowed.");
                }

                if (!move_uploaded_file($file_tmp, $pathToFolder)) {
                    die("Failed Uploading Images.");
                }


                $stmt2 = $conn->prepare($query2);
                $stmt2->bindParam(':periodical_id', $periodicalId);
                $stmt2->bindParam(':image_url', $pathToDb);
                $stmt2->execute();
            }
        }

        echo 1;


    } catch (Exception $e) {
        echo $e->getMessage();
    }
}