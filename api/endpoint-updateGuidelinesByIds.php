<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $ids = explode(",", $_POST['rules_id']);
    $rules = $_POST['editGuidelineRules'];

    foreach ($ids as $index => $id) {
        $rule = $rules[$index];

        $stmt = $conn->prepare("UPDATE guideline_rules SET guideline_rules_txt = :guideline_rules_txt WHERE id = :ids;");
        $stmt->bindParam(":guideline_rules_txt", $rule);
        $stmt->bindParam(":ids", $id);
        $result = $stmt->execute();

    }

    if (!$result) {
        echo "Updated Failed";
    } else {
        echo 1;
    }
}