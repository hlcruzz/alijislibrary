<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    setcookie("token", "", [
        'expires' => time() - 3600,
        'path' => '/',
        'domain' => 'alijis-library.chmsu.edu.ph',
        'secure' => true,
        'httponly' => true,
        'samesite' => 'Strict'
    ]);
}