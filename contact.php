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

<!-- CONTACT FORM -->

<section class="page-section" id="contact" style="margin-top: 10vh;">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
         <!-- Contact Section Form-->
         <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <form id="contactForm" action="includes/_contact.php" method="POST">
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" type="text" placeholder="Enter your name..." required 
                        <?php if(isset($_SESSION['username'])){
                        echo 'value='.$_SESSION['username'] ;
                        } ?>/>
                        <label for="name">Full name</label>
                    </div>
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="email" placeholder="name@example.com" required 
                        <?php if(isset($_SESSION['username'])){
                        echo 'value='.$_SESSION['email'] ;
                        } ?>>
                        <label for="email">Email address</label>
                    </div>
                    <!-- Phone number input-->
                    <!--<div class="form-floating mb-3">-->
                    <!--    <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" required />-->
                    <!--    <label for="phone">Phone number</label>-->
                    <!--</div>-->
                    <!-- Message input-->
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" required></textarea>
                        <label for="message">Message</label>
                    </div>
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include './includes/_footer.php' ?>