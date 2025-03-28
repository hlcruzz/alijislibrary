<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $guidelineName = $_GET['guidelineName'];

    $query = "SELECT *,GROUP_CONCAT(guideline_rules.id) as rules_id , GROUP_CONCAT(guideline_rules.guideline_rules_txt SEPARATOR '\n') AS rules_txt FROM guidelines INNER JOIN guideline_rules ON guidelines.id = guideline_rules.guideline_id WHERE guidelines.guidelineName = :guidelineName GROUP BY guidelines.guidelineName;";
    $stmt = $conn->prepare(query: $query);
    $stmt->bindParam(":guidelineName", $guidelineName);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($result);
}