<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $guidelinesName = $_POST['guidelinesName'];
    $guidelineRules = $_POST['guidelineRules'];

    try {
        $stmt1 = $conn->prepare("INSERT INTO guidelines (guidelineName) VALUES (:guidelinesName);");
        $stmt1->bindParam(":guidelinesName", $guidelinesName);
        $stmt1->execute();
        $guideline_id = $conn->lastInsertId();

        foreach ($guidelineRules as $rule) {
            $stmt2 = $conn->prepare("INSERT INTO guideline_rules (guideline_id, guideline_rules_txt) VALUES (:guideline_id, :guideline_rules_txt);");
            $stmt2->bindParam(":guideline_id", $guideline_id);
            $stmt2->bindParam(":guideline_rules_txt", var: $rule);
            $stmt2->execute();
        }

        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
    }

}