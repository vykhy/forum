<?php
$id = $_GET['threadid'];
?>
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

<?php
     $plo = pdo_connect_mysql();
     $stmt = $plo->prepare("SELECT * FROM forum_threads WHERE thread_id=?");
     $stmt->execute([$id]);
     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $cat = $result[0]['thread_title'];
    $desc = $result[0]['thread_desc'];

?>
<!-- FORUM RULES AND CATEGORY DETAILS -->
<div class="container my-4">
    <div class="jumbotron m-3">
        <h4 class="display-4"><?=$cat?></h1>
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
  <?php
    //show comment form if user is logged in
    if(isset($_SESSION['loggedin']) and $_SESSION['loggedin'] ==true): ?>
        <!-- form to submit answers -->
        <div class="container my-4">
            <div class="jumbotron m-3">
    
            <form action="postA.php" method="POST">
            <h4 class="py-2">Post a comment</h4>
            <input type="hidden" name="thread_id" value="<?php echo $id ?>">
                <div class="form-group">
                    <label for="desc">Type your answer</label>
                    <textarea class="form-control" id="comment" name="answer" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post comment</button>
            </form>
            </div>
        </div>
    <?php else : ?>
        <!-- //tell user to login to comment if not logged in -->
            <div class="container"><p class="lead">Log in to post a comment</p></div>

<?php endif ?>
<!-- FETCH ANSWERS -->
<?php
$answers = fetchThread($id);
if(!$answers): ?>
    <div class="jumbotron">
        <div class="lead display-4">
         This thread has no answers yet.
        </div>
        Be the first person to answer the question!
    </div>
<?php
else:
    foreach($answers as $answer): 
        ?>
    <div class="container my-2">
         <h3 class="py-2">Discussions</h3>
            <div class="d-flex my-3">
                <div class="flex-shrink-0">
                    <img src="./images/default user.png" style="max-width: 100px; max-height:100px" alt="...">
                </div>
                <div class="just">
                    <div class="flex-1 ms-3 mb-2">
                        <?=$answer['answer_writer']  .' at '.$answer['answer_created']?>
                    </div>
                    <div class="px-3"> <?php echo $answer['answer_body']?></div>
                </div>
            </div>
     </div>

<?php endforeach;
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