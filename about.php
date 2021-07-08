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


        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="about" style="margin-top: 10vh;">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ms-auto"><p class="lead">This is a free forum website created using PHP and MySQL on the backend
                        and bootstrap as the front end framework.
                    </p></div>
                    <div class="col-lg-4 me-auto"><p class="lead">We are constantly working to improve this site, to provide more features and make
                        it more user Friendly. Some features planned for the future are:
                            <ul class="lead">
                                <li>Like and unlike system</li>
                                <li>Sort by date or likes</li>
                                <li>Load on scroll</li>
                                <li>User profiles</li>
                            </ul>
                    </p></div>
                </div>
            </div>
        </section>

<?php include './includes/_footer.php' ?>