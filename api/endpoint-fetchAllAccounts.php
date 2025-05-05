<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $query = "SELECT
    id,
    accountImg,
    accountEmail,
    accountUsername,
    accountPassword,
    accountLogin,
    DATE_FORMAT(accountDateAdded, '%W, %M %d, %Y %h:%i:%s %p') AS accountDateAdded,
    accountDateUpdated
    FROM 
    accounts
    WHERE
    status = 1
    ;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}
