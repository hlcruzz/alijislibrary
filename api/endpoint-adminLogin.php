<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT accountUsername, accountPassword FROM accounts WHERE accountUsername = :username;");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {

            if ($password == $result['accountPassword']) {
                echo 1;
            } else {
                throw new Exception(message: "Invalid Password");
            }

        } else {
            throw new Exception("Account not found");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
