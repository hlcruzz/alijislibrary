<?php
include "../lib/connection.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    try {
        $query = "SELECT 
        id, personnelImg, 
        personnelRole, 
        personnelName, 
        DATE_FORMAT(personnelDateAdded, '%W, %M %d, %Y %h:%i:%s %p') AS personnelDateAdded,
         DATE_FORMAT(personnelDateUpdated, '%W, %M %d, %Y %h:%i:%s %p') AS personnelDateUpdated
        FROM personnel;";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}