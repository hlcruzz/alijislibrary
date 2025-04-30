<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    try {
        $stmt = $conn->prepare("
            SELECT 
                id,
                objectives_icon,
                objectives_text,
                DATE_FORMAT(objectives_date, '%W, %M %d, %Y %h:%i:%s %p') AS objectives_date
            FROM library_objectives
            WHERE objectives_date > '1970-01-01 00:00:00'
            ORDER BY objectives_date DESC
        ");

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
