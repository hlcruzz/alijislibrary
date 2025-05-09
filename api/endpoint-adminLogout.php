<?php
include "../lib/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    setcookie("token", "", time() - 3600, "/", "", true, true);
}