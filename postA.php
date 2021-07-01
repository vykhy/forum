<?php
session_start();
include 'includes/_dbconnect.php';

ob_start();
    
    $conn = pdo_connect_mysql();
    $stmt = $conn->prepare("INSERT INTO forum_answers ( answer_body, thread_id, answer_writer, answer_likes) VALUES(?,?,?,?)");
    
    $id = $_POST['thread_id'];
    $answer = $_POST['answer'];
    $user_name = $_SESSION['username'];

    $answer = str_replace("<", "&lt;", $answer);
    $answer = str_replace(">", "&gt;", $answer);

    $stmt->execute([$answer, $id, $user_name, 0]);

    header('Location: thread.php?threadid='.$id.'');

ob_end_flush();
?>