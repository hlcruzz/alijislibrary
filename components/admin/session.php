<?php
require './vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = 'asdkcyn347y5cn37ywuercyn237ryccnQcwYCn9YCn3ycOW3Y5CO9w3y5owyOYCNW7YcwhwjmfiJWPECTwpct-wervWERVwoejrhwcmERHOWihcrCRIJRrORCOERMC832y823y4m';
if (isset($_COOKIE['token'])) {
    $decoded = JWT::decode($_COOKIE['token'], new Key($key, 'HS256'));
} else {
    setcookie("token", "", [
        'expires' => time() - 3600,
        'path' => '/',
        'domain' => 'alijis-library.chmsu.edu.ph',
        'secure' => true,
        'httponly' => true,
        'samesite' => 'Strict'
    ]);
    echo '
    <script>
    alert("Session Expired. Please login again");
    window.location.href = "./?page=admin-login";
    </script>
    ';
    exit;
}


?>