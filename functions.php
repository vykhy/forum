<?php

function fetchCategories(){

    $conn = pdo_connect_mysql();
    $stmt = $conn->prepare("SELECT * from forum_categories");
    $stmt->execute();

    return( $stmt->fetchAll(PDO::FETCH_ASSOC));
}

function fetchCategoryDetails($id){

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

?>