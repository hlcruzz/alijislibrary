<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    try {
        $query = "SELECT
        activity_logs.id as log_id,
        activity_logs.admin_id as admin_id,
        activity_logs.action,
        activity_logs.details,
        activity_logs.ip_address,
        activity_logs.created_at,
        DATE_FORMAT(activity_logs.created_at, '%W, %M %d, %Y %h:%i:%s %p') AS text_date,
        accounts.accountImg as image,
        accounts.accountEmail as email,
        accounts.accountUsername as username
        FROM 
        activity_logs
        INNER JOIN
        accounts
        ON
        activity_logs.admin_id = accounts.id
        ;";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}