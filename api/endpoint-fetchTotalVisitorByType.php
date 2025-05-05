<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $query = "SELECT COUNT(*) as total_visitor,visitor_type  FROM visitor GROUP BY visitor_type;";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $labels = [];
    $data = [];
    foreach ($result as $row) {
        $labels[] = $row['visitor_type'];
        $data[] = (int)$row['total_visitor'];
    }

    echo json_encode(["labels" => $labels, "data" => $data]);
}
