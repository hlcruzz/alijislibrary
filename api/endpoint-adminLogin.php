<?php
include "../lib/connection.php";
require '../vendor/autoload.php';

use Firebase\JWT\JWT;

if ($_SERVER['REQUEST_METHOD'] == "POST") {


    function sanitize_input($data)
    {

        return htmlspecialchars(trim(stripslashes($data)), ENT_QUOTES, 'UTF-8');
    }

    try {
        $username = sanitize_input($_POST['username']);
        $password = sanitize_input($_POST['password']);
        $stmt = $conn->prepare("SELECT id, accountUsername, accountPassword,accountEmail,accountImg FROM accounts WHERE accountUsername = ?;");
        $stmt->execute([$username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && password_verify($password, $result['accountPassword'])) {
            $stmt2 = $conn->prepare("INSERT INTO login_history (account_id) VALUES (?);");
            $stmt2->execute([$result['id']]);
            $key = 'asdkcyn347y5cn37ywuercyn237ryccnQcwYCn9YCn3ycOW3Y5CO9w3y5owyOYCNW7YcwhwjmfiJWPECTwpct-wervWERVwoejrhwcmERHOWihcrCRIJRrORCOERMC832y823y4m';
            $token = JWT::encode(
                array(
                    'iat' => time(),
                    'nbf' => time(),
                    'exp' => time() + 3600,
                    'data' => array(
                        'admin_id' => $result['id'],
                        'username' => $result['accountUsername'],
                        'email' => $result['accountEmail'],
                        'img' => $result['accountImg'],
                        'role' => 'admin',
                    )
                ),
                $key,
                'HS256'
            );

            setcookie("token", $token, time() + 1800, "/", "", true, true);

            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid Username or Password"]);
        }
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
}
?>