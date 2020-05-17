<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once '../pdo_connect.php';
session_start();
if (isset($_SESSION["user_id"])) {
    header('location: user_home.php');
}
?>

<?php

if (isset($_POST["submit"])) {
    $name = $_POST["nom"];
    $fname = $_POST["prenom"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $insert = $pdo->prepare("INSERT INTO Users (email, mdp, nom, prenom) VALUES(:email, :mdp, :nom, :prenom)");
    $insert->bindparam(":email", $email);
    $insert->bindparam(":mdp", $pass);
    $insert->bindparam(":nom", $name);
    $insert->bindparam(":prenom", $fname);
    $insert->execute();

    $query = $pdo->prepare('Select user_id from Users where email = :email');
    $query->bindParam(":email", $email);
    $query->execute();
    $user = $query->fetch();
    $_SESSION['user_id'] = $user['user_id'];

    header("location: user_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>

    <body>
        <form action="user_register.php" method="post">
            <input required type="text" name="nom" pattern="[a-zA-Z\s]+" placeholder="NOM">
            <input required type="text" name="prenom" pattern="[a-zA-Z\s]+" placeholder="PRENOM">
            <input required type="email" name="email" placeholder="EMAIL">
            <input required type="password" name="pass" placeholder="PASSWORD">
            <button type="submit" name="submit">Send</button> </form>
    </body>

</html>
