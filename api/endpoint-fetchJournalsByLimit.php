<?php
include "../lib/connection.php";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $stmt = $conn->prepare("SELECT id, eJournalImg, eJournalTitle, eJournalTxt, eJournalLink FROM ejournal ORDER BY id DESC LIMIT :limit;");
    $stmt->bindParam(':limit', $_GET['limit'], PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}