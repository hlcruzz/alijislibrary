<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $code = htmlspecialchars(trim($_POST['code']), ENT_QUOTES, 'UTF-8');
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);


    try {

        function decryptthis($data, $key)
        {
            $encryption_key = base64_decode($key);
            list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2), 2, null);
            return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
        }
        $key = 'asdkcyn347y5cn37ywuercyn237ryccnQcwYCn9YCn3ycOW3Y5CO9w3y5owyOYCNW7YcwhwjmfiJWPECTwpct-wervWERVwoejrhwcmERHOWihcrCRIJRrORCOERMC832y823y4m';

        $checkQuery = "SELECT authCode FROM accounts WHERE accountEmail = ?;";
        $stmtCheck = $conn->prepare($checkQuery);
        $stmtCheck->execute([$email]);
        $result = $stmtCheck->fetch(PDO::FETCH_ASSOC);

        $dbCode = decryptthis($result['authCode'], $key);

        if ($code !== $dbCode) {
            echo json_encode([
                "status" => false,
                "message" => "Incorrect Verification Code"
            ]);
            exit;
        }

        $query = "UPDATE accounts SET accountPassword = :accountPassword WHERE accountEmail = :accountEmail;";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":accountPassword", $password);
        $stmt->bindParam(":accountEmail", $email);
        $stmt->execute();

        echo json_encode([
            "status" => true,
            "message" => "Account Password Changed"
        ]);
    } catch (Exception $e) {
        echo json_encode([
            "status" => false,
            "message" => $e->getMessage()
        ]);
    }
}
