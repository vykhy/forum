<?php

function pdo_connect_mysql(){
    //update details with database details
    $dbhost = 'localhost';
    $dbuser = 'root'; 
    $dbpassword = ''; 
    $dbname = '';

    try{
        return new PDO('mysql:host='.$dbhost.';dbname=' . $dbname . ';charset=utf8', $dbuser, $dbpassword);
    } catch (PDOException $exception){
        //if error to connect
        die ('Failed to connect to database');
    }
}

?>
