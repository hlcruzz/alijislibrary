<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT id,accountUsername, accountPassword FROM accounts WHERE accountUsername = :username;");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {

            if (password_verify($password, $result['accountPassword'])) {
                $id = $result['id'];

                $stmt2 = $conn->prepare("UPDATE accounts SET accountLogin = 1 WHERE id = :id;");
                $stmt2->bindParam(":id", $id);
                $stmt2->execute();

                echo $id;
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