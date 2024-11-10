<?php
header("Access-Control-Allow-Origin: http://localhost:8083");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");

session_start();
session_destroy();
echo "Logged out";
?>
