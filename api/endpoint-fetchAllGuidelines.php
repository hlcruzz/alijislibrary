<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $query = "SELECT guidelines.*, guideline_rules.*, GROUP_CONCAT(guideline_rules.guideline_rules_txt SEPARATOR '\n') as txt, DATE_FORMAT(guidelines.guidelines_date, '%W, %M %d, %Y %h:%i:%s %p') AS text_date FROM guidelines INNER JOIN guideline_rules ON guidelines.id = guideline_rules.guideline_id GROUP BY guidelines.guidelineName;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}