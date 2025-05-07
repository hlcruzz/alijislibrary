<?php
// include "../lib/connection.php";
// require '../vendor/autoload.php';

// use Firebase\JWT\JWT;

// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     $token = $_POST['token']; // Assuming you're sending the token in the POST request

//     $key = '1a3LM3W966D6QTJ5BJb9opunkUcw_d09NCOIJb9QZTsrneqOICoMoeYUDcd_NfaQyR787PAH98Vhue5g938jdkiyIZyJICytKlbjNBtebaHljIR6-zf3A2h3uy6pCtUFl1UhXWnV6madujY4_3SyUViRwBUOP-UudUL4wnJnKYUGDKsiZePPzBGrF4_gxJMRwF9lIWyUCHSh-PRGfvT7s1mu4-5ByYlFvGDQraP4ZiG5bC1TAKO_CnPyd1hrpdzBzNW4SfjqGKmz7IvLAHmRD-2AMQHpTU-hN2vwoA-iQxwQhfnqjM0nnwtZ0urE6HjKl6GWQW-KLnhtfw5n_84IRQ';

//     try {
//         // Decode the JWT
//         $decoded = JWT::decode($token, $key, ['HS256']);

//         // If successful, you will get the decoded payload
//         echo json_encode(["status" => "success", "data" => (array) $decoded]);
//     } catch (Exception $e) {
//         // Catch any decoding errors (e.g., expired token, invalid signature)
//         echo json_encode(["status" => "error", "message" => "Invalid token: " . $e->getMessage()]);
//     }
// }

$_COOKIE['token'] = "test";

echo $_COOKIE['token'];
?>