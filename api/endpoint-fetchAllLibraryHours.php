<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $query = "SELECT 
    id,
    semesterName,
    semesterDateStart,
    semesterDateEnd,
    DATE_FORMAT(semesterDateStart, '%r') AS start,
    DATE_FORMAT(semesterDateEnd, '%r') AS end
    FROM
    library_hours
    WHERE 
    status = 1
    ;";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}