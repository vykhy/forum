<?php
ob_start();

session_start();
$_SESSION['username'] = 'Guest user';
$_SESSION['id'] = 1;
$_SESSION['email'] = 'guest@forum.com';
$_SESSION['loggedin'] = true;

header('location: ../index.php?login=true');

ob_end_flush();
?>