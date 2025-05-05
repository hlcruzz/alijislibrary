<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $code = $_POST['code'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $checkQuery = "SELECT authCode FROM accounts WHERE authCode = :authCode AND accountEmail = :accountEmail;";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bindParam(":authCode", $code);
    $checkStmt->bindParam(":accountEmail", $email);
    $checkStmt->execute();

    if ($checkStmt->rowCount() == 0) {
        echo "incorrect";
        exit;
    }

    try {
        $query = "UPDATE accounts SET accountPassword = :accountPassword WHERE accountEmail = :accountEmail;";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":accountPassword", $password);
        $stmt->bindParam(":accountEmail", $email);
        $stmt->execute();
        echo 1;
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}
