<?php
include "../lib/connection.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $foundationName = $_POST['foundationName'];
    $foundationTxt = $_POST['foundationTxt'];

    try {
        $stmt = $conn->prepare("UPDATE foundation SET foundationName = :foundationName, foundationTxt = :foundationTxt WHERE foundationName = :foundationName;");
        $stmt->bindParam(":foundationName", $foundationName);
        $stmt->bindParam(":foundationTxt", $foundationTxt);
        $stmt->execute();

        echo $foundationName;
    } catch (Exception $e) {
        echo $e->getMessage();
    }

}