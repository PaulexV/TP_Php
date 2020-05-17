<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once '../pdo_connect.php';
session_start();
if (isset($_SESSION["user_id"])) {
    header('location: user_home.php');
}

$query = $pdo->prepare('SELECT user_id FROM Users WHERE email = :email');
$query->bindParam(":email", $email);
$query->execute();
$user = $query->fetch();
$_SESSION['user_id'] = $user['user_id'];

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>User_login</title>
    </head>

    <body>
        <h1>User Page</h1>
        <form action="user_home.php" method="post">
            <input type="text" name="email" placeholder="EMAIL">
            <input type="text" name="password" placeholder="PASSWORD">
            <button type="submit">Submit</button>
        </form>
        <p>No account ? <a href="user_register.php">Register</a></p>
        <a href="/index.php">Back</a>
    </body>

</html>
