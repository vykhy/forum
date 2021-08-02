<?php
ob_start();

session_start();

if(isset($_SESSION['username'])){
    $msg = 'You are already logged in';
    header("location: ../index.php?login=$msg");
}

$_SESSION['username'] = 'Guest user';
$_SESSION['id'] = 1;
$_SESSION['email'] = 'guest@forum.com';
$_SESSION['loggedin'] = true;

$msg = 'Logged in successully';
header("location: ../index.php?login=$msg");

ob_end_flush();
?>