<?php
session_start();
$_SESSION['ent_id'];
$_SESSION['user_id'];
$_SESSION['admin_id'];
session_destroy();
header('location: /');
exit();
