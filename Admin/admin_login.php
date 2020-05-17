<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once '../pdo_connect.php';
session_start();
if (isset($_SESSION["admin_id"])) {
    header('location: admin_home.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Admin_login</title>
    </head>

    <body>
        <h1>Admin Page</h1>
        <form action="admin_home.php" method="post">
            <input type="text" name="user" placeholder="USER">
            <input type="text" name="password" placeholder="PASSWORD">
            <button type="submit">Submit</button>
        </form>
        <a href="/index.php">Back</a>
    </body>

</html>
