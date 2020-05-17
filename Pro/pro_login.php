<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once '../pdo_connect.php';
session_start();
if (isset($_SESSION["ent_id"])) {
    header('location: pro_home.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Pro_login</title>
    </head>

    <body>
        <h1>Pro Page</h1>
        <form action="pro_home.php" method="post">
            <input type="text" name="email" placeholder="EMAIL">
            <input type="text" name="password" placeholder="PASSWORD">
            <button type="submit">Submit</button>
        </form>
        <p>No account ? <a href="pro_register.php">Register</a></p>
        <a href="/index.php">Back</a>
    </body>

</html>
