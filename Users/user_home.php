<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once '../pdo_connect.php';
session_start();
if (!isset($_SESSION["user_id"])) {
    header('location: user_login.php');
}

$query = $pdo->prepare('Select user_id from Users where email = :email');
$query->bindParam(":email", $email);
$query->execute();
$user = $query->fetch();
$_SESSION['user_id'] = $user['user_id'];

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
