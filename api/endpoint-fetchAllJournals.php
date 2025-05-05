<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    try {
        $query = "SELECT id,eJournalImg,eJournalTitle,eJournalTxt,eJournalLink, DATE_FORMAT(eJournalDate, '%W, %M %d, %Y %h:%i:%s %p') AS text_date FROM ejournal WHERE status = 1;";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}