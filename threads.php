<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php include './includes/_links.php' ?>
</head>
<body> 
<?php include './includes/_header.php' ?>

<div class="container" style="min-height: 80vh;margin-top:20vh"> 

<!-- FETCH CATEGORY DETAILS -->
<?php
     $plo = pdo_connect_mysql();
     $id = $_GET['id'];
     $stmt = $plo->prepare("SELECT * FROM forum_categories WHERE category_id=?");
     $stmt->execute([$id]);
     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

     foreach($result as $question){
         $cat = $question['category_name'];
         $desc = $question['category_desc'];
     }

?>
<!-- FORUM RULES AND CATEGORY DETAILS -->
<div class="container my-4">
    <div class="jumbotron m-3">
        <h3 class="display-4">Threads on <?=$cat?></h1>
        <p class="lead"><?=$desc?></p>
        <hr class="my-4">
        <p>No Spam / Advertising / Self-promote in the forums. <br>
            Do not post copyright-infringing material. <br>
            Do not post “offensive” posts, links or images. <br>
            Do not cross post questions. <br>
            Do not PM users asking for help. <br>
            Remain respectful of other members at all  </p>
    </div>
  </div>

<!-- IF USER IS LOGGED IN SHOW THE FORM TO POST A QUESTION  -->
<?php
    if(isset($_SESSION['loggedin']) and $_SESSION['loggedin'] ==true){
        echo '
        <h2>Post a Question</h2>
        <form action="postQ.php" method="POST">
            <div class="form-group">
                <input type="hidden" name="category_id" value="'. $id .'">
                <label for="title">Thread Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" required placeholder="Enter title">
                <small id="emailHelp" class="form-text text-muted">Concise titles are better</small>
            </div>
            <div class="form-group">
                <label for="desc">Provide a decription of your concern</label>
                <textarea class="form-control" id="desc" name="desc" rows="5" required></textarea>
            </div>
            <button type="submit" onclick="postQuestion()" class="btn btn-primary">Submit</button>
        </form>';
    }
// ELSE TELL THEM TO LOG IN TO ASK A QUESTION
    else{
        echo '
            <div class="container"><p class="lead">Log in to start a discussion</p></div>
        ';
    }
?>

<!-- HANDLE QUESTION POSTS -->
<?php

$id = $_GET['id'];

$threads = fetchThreads($id);

if(!$threads): ?>
    <div class="jumbotron">
        <div class="lead display-4">
         No Questions here yet
        </div>
        Be the first person to ask a question!
    </div>'
<?php 
else:
    foreach($threads as $thread): ?>

        <a class= "thread-link" href="thread.php?threadid=<?=$thread['thread_id'] ?>">
            <div class="d-flex my-3">
                <div class="flex-shrink-0">
                    <img src="./images/default user.png" style="max-width: 100px; max-height:100px;" alt="...">
                </div>
                <div class="just">
                    <div class="question"><?=$thread['thread_title'] ?></div>
                    <div class="flex-grow-1 ms-3">
                        <?= substr($thread['thread_desc'], 0, 200) ?>...
                    </div>
                    <div class="flex-1 ms-3">
                        <?=$thread['thread_user_id']  .' at '.$thread['thread_created']?>
                    </div>
                </div>
            </div>
        </a>

<?php
    endforeach;
endif;
?>
</div>

<style>
        .jumbotron {
            padding: 2rem 1rem;
            margin-bottom: 2rem;
            background-color: #e9ecef;
            border-radius: .3rem;
        }
        .just{
            display: flex;
            flex-direction: column;
        }
        .question {
            font-size: 2rem;
            font-weight: bold;
        }
        .thread-link {
            text-decoration: none;
            color: black;
        }
    </style>

<?php include './includes/_footer.php' ?>