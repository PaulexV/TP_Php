<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once '../pdo_connect.php';
session_start();
if (!isset($_SESSION["admin_id"])) {
    header('location: admin_login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Home</title>
    </head>

    <body>
        <h1>Welcome</h1>
        <a href="../logout.php">Logout</a>

    </body>

</html>
