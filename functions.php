<?php

/**
 * THIS FUNCTION FETCHES THE DISCUSSION CATEGORIES
 */
function fetchCategories(){

    $conn = pdo_connect_mysql();
    $stmt = $conn->prepare("SELECT * from forum_categories");
    $stmt->execute();

    return( $stmt->fetchAll(PDO::FETCH_ASSOC));
}

function fetchCategoryDetails($id){

    $conn = pdo_connect_mysql();
    $stmt = $conn->prepare("SELECT * FROM forum_categories WHERE category_id=?");
    $stmt->execute([$id]);
    
    return ($stmt->fetchAll(PDO::FETCH_ASSOC));
}

function fetchThreads($id){

    $conn = pdo_connect_mysql();
    $stmt = $conn->prepare("SELECT * from forum_threads WHERE category_id = ?");
    $stmt->execute([$id]);

    return( $stmt->fetchAll(PDO::FETCH_ASSOC));
}

function fetchThread($id){

    $conn = pdo_connect_mysql();
    $stmt = $conn->prepare("SELECT * from forum_answers WHERE thread_id = ?");
    $stmt->execute([$id]);

    return( $stmt->fetchAll(PDO::FETCH_ASSOC));
}

function fetchUserThreadLikes($id, $user){
    $conn = pdo_connect_mysql();
    $stmt = $conn->prepare("SELECT liked_answer from forum_likes WHERE threadid = ? AND liked_user = ?");
    $stmt->execute([$id, $user]);

    $result = [];
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        array_push($result, $row['liked_answer']);
    }
    return $result;
}
?>