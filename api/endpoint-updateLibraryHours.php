<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['editSemesterId'];
    $editSemesterName = $_POST['editSemesterName'];
    $editSemesterDateStart = $_POST['editSemesterDateStart'];
    $editSemesterDateEnd = $_POST['editSemesterDateEnd'];

    try {
        $query = "UPDATE
        library_hours
        SET
        semesterName = :semesterName,
        semesterDateStart = :semesterDateStart,
        semesterDateEnd = :semesterDateEnd
        WHERE
        id = :id
        ;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":semesterName", $editSemesterName);
        $stmt->bindParam(":semesterDateStart", $editSemesterDateStart);
        $stmt->bindParam(":semesterDateEnd", $editSemesterDateEnd);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}