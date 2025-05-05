<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $yearlyData = [];

    $query = "SELECT 
        YEAR(visitor_date) AS year,
        MONTH(visitor_date) AS month,
        COUNT(*) AS visitors
    FROM visitor
    GROUP BY YEAR(visitor_date), MONTH(visitor_date)
    ORDER BY year, month;
    ";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        $year = $row['year'];
        $month = (int) $row['month'] - 1;
        $visitors = (int) $row['visitors'];


        if (!isset($yearlyData[$year])) {
            $yearlyData[$year] = array_fill(0, 12, 0);
        }

        $yearlyData[$year][$month] = $visitors;
    }

    echo json_encode($yearlyData);
}
