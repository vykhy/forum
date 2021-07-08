<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    include '_dbconnect.php';
    $conn = pdo_connect_mysql();

    $id = $_POST['id'];
    $threadid = $_POST['threadid'];
    $action = $_POST['action'];
    $user_id = $_SESSION['user_id'];

    switch($action){
        case('like'): 
            {
                $stmt = $conn->prepare('INSERT INTO forum_likes (liked_user, liked_answer, threadid) VALUES (?,?,?)');
                $stmt->execute([$user_id, $id, $threadid]);
                $stmt = $conn->prepare('UPDATE forum_answers SET answer_likes = answer_likes+1 where answer_id = ?');
                $stmt->execute([$id]);
                echo 'like successful';
                break;
            }
        case('unlike'): 
            {
                $stmt = $conn->prepare('DELETE FROM forum_likes WHERE liked_user=? AND liked_answer=?');
                $stmt->execute([$user_id, $id]);
                $stmt = $conn->prepare('UPDATE forum_answers SET answer_likes = answer_likes-1 where answer_id = ?');
                $stmt->execute([$id]);
                echo 'unlike successful';
                break;
            }
    }
}

?>