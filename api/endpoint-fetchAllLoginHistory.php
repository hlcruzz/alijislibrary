<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $query = "SELECT 
    login_history.id as history_id, 
    login_history.loginDate as history_date,
    accounts.accountImg as image,
    accounts.accountEmail as email,
    accounts.accountUsername as username
    FROM 
    login_history
    INNER JOIN 
    accounts
    ON
    login_history.account_id = accounts.id
    WHERE
    accounts.status = 1
    ;";
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}