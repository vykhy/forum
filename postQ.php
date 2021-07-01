<?php
session_start();
include 'includes/_dbconnect.php';

ob_start();
    
    $conn = pdo_connect_mysql();
    $stmt = $conn->prepare("INSERT INTO forum_threads (thread_title, thread_desc, category_id, thread_user_id) VALUES(?,?,?,?)");
    
    $id = $_POST['category_id'];
    $thread_title = $_POST['title'];
    $thread_desc = $_POST['desc'];
    $user_name = $_SESSION['username'];

    $thread_desc = str_replace("<", "&lt;", $thread_desc);
    $thread_desc = str_replace(">", "&gt;", $thread_desc);

    $thread_title = str_replace("<", "&lt;", $thread_title);
    $thread_title = str_replace(">", "&gt;", $thread_title);

    $stmt->execute([$thread_title, $thread_desc, $id, $user_name]);

    header('Location: threads.php?id='.$id.'');

ob_end_flush();
?>