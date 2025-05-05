<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    try {
        $semesterName = $_POST['semesterName'];
        $semesterDateStart = $_POST['semesterDateStart'];
        $semesterDateEnd = $_POST['semesterDateEnd'];

        $query = "INSERT INTO
        library_hours 
        (semesterName, semesterDateStart, semesterDateEnd)
        VALUES
        (:semesterName, :semesterDateStart, :semesterDateEnd)
        ;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":semesterName", $semesterName);
        $stmt->bindParam(":semesterDateStart", $semesterDateStart);
        $stmt->bindParam(":semesterDateEnd", $semesterDateEnd);
        $stmt->execute();

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}