<?php
session_start();
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

<?php include './includes/_header.php' ?>
<body style="min-height: 80vh;">

<?php 
if(isset($_GET['key']) && $_GET['key']=='lmfao'){
    echo '<a href="includes/_automatical_login.php" ><div class="position-fixed bg-primary p-2 text-white rounded"
    style="z-index:2; left:30px; bottom:30px; cursor:pointer"
    > Log in as guest user automatically</div></a>';
}
?>
<!-- Masthead-->

    <header class="masthead text-white text-center bg-warning"> <!-- put background image in this element -->
    <?php
if(isset($_GET['login'])){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'.
   $_GET['login'] .'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if(isset($_GET['message'])){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'.
    $_GET['message'] .'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="..." />
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0">Find Answers- My Forum</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">Programming - Web Design - Languages</p>
        </div>
    </header>

    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Browse Categories</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                
            <!-- FETCH AND RENDER CATEGORIES -->
            <?php $categories = fetchCategories();

            foreach($categories as $category):
            ?>
                <!-- Category Items-->
                <div class="card m-3" style="width: 18rem;">
                    <img src="images/<?php echo $category['category_img'] ?>" class="card-img-top mt-3" style="height: 150px;object-fit:cover" alt="<?php $category['category_name'] ?>">
                    <div class="card-body pt-3">
                        <h5 class="card-title"><?php echo $category['category_name'] ?></h5>
                        <p class="card-text"><?php echo substr($category['category_desc'], 0, 120)?>...</p>
                        <a href="threads.php?id=<?php echo $category['category_id'] ?>" class="btn btn-primary">View Threads</a>
                    </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php include './includes/_footer.php' ?>

    
