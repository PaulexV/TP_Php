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

<?php
if (isset($_POST["submit"])) {
    $name = $_POST["nom"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $verif = $pdo->prepare('SELECT * FROM Entreprises WHERE email = :email');
    $verif->bindParam(':email', $email);
    if ($verif->rowCount() > 0) {
        $err =  "Email déjà utilisé";
        var_dump($err);
        die();
    } else {
        $insert = $pdo->prepare("INSERT INTO Entreprises (email, mdp, nom) VALUES(:email, :mdp ,:nom)");
        $insert->bindparam(":email", $email);
        $insert->bindparam(":mdp", $pass);
        $insert->bindparam(":nom", $name);
        $insert->execute();

        $query = $pdo->prepare('SELECT ent_id FROM Entreprises WHERE email = :email');
        $query->bindParam(":email", $email);
        $query->execute();
        $user = $query->fetch();
        $_SESSION['ent_id'] = $user['ent_id'];

        header("location: pro_login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>

    <body>
        <form action="pro_register.php" method="post">
            <input required type="text" name="nom" pattern="[a-zA-Z\s]+" placeholder="NOM">
            <input required type="email" name="email" placeholder="EMAIL">
            <input required type="password" name="pass" placeholder="PASSWORD">
            <button type="submit" name="submit">Send</button>
        </form>

    </body>

</html>
