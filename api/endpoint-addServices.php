<?php
include "../lib/connection.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $table = $_POST['table'];
    $title = $_POST['title'];
    $txt = $_POST['txt'];

    $valid_tables = ['automated_circulation', 'virtual_library_orientation', 'internet_computer_aided_research', 'information_dissemination', 'online_subscription_databases', 'news_current_events'];
    if (!in_array($table, $valid_tables)) {
        die("Invalid table name");
    }
    $query = "INSERT INTO `$table` (title, txt) VALUES (:title, :txt);";
    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":txt", $txt);
        $stmt->execute();
        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }

}