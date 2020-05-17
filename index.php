<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'pdo_connect.php';
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>Index</title>
    </head>

    <body>
        <button><a href="Users/user_login.php">User</a></button>
        <button><a href="Pro/pro_login.php">Professional</a></button>
        <button><a href="Admin/admin_login.php">Admin</a></button>
    </body>

</html>
