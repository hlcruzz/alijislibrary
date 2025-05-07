<?php
include "../lib/connection.php";

require '../vendor/autoload.php';

use Firebase\JWT\JWT;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT id, accountUsername, accountPassword FROM accounts WHERE accountUsername = :username;");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($password, $result['accountPassword'])) {
            $id = $result['id'];
            $key = '1a3LM3W966D6QTJ5BJb9opunkUcw_d09NCOIJb9QZTsrneqOICoMoeYUDcd_NfaQyR787PAH98Vhue5g938jdkiyIZyJICytKlbjNBtebaHljIR6-zf3A2h3uy6pCtUFl1UhXWnV6madujY4_3SyUViRwBUOP-UudUL4wnJnKYUGDKsiZePPzBGrF4_gxJMRwF9lIWyUCHSh-PRGfvT7s1mu4-5ByYlFvGDQraP4ZiG5bC1TAKO_CnPyd1hrpdzBzNW4SfjqGKmz7IvLAHmRD-2AMQHpTU-hN2vwoA-iQxwQhfnqjM0nnwtZ0urE6HjKl6GWQW-KLnhtfw5n_84IRQ';
            $token = JWT::encode(
                array(
                    'iat' => time(),
                    'nbf' => time(),
                    'exp' => time() + 3600,
                    'data' => array(
                        'user_id' => $result['id']
                    )
                ),
                $key,
                'HS256'
            );

            setcookie("token", $token, time() + 3600, "/", "", true, true);

            // Update account login status
            $stmt2 = $conn->prepare("UPDATE accounts SET accountLogin = 1 WHERE id = :id;");
            $stmt2->bindParam(":id", $id);
            $stmt2->execute();

            // Send success response with the token
            echo json_encode(["status" => "success", "token" => $token]);
        } else {
            // Invalid username or password
            echo json_encode(["status" => "error", "message" => "Invalid Username or Password"]);
        }
    } catch (Exception $e) {
        // If there is any exception (e.g., database issue)
        echo json_encode(["status" => "error", "message" => "An error occurred"]);
    }
}
?>