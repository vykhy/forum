<?php
session_start();
echo '

<!-- Navigation-->
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="index.php">My Forum</a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <!--<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">Portfolio</a></li>-->
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="about.php">About</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="contact.php">Contact</a></li>';
                if(isset($_SESSION['username']))
                {
                    echo '<li class="nav-item mx-0 mx-lg-1 py-3 px-0 px-lg-3 rounded text-warning">Welcome '. $_SESSION['username']. '</li>
                    <li class="nav-item mx-0 mx-lg-1"><button class="btn btn-primary ml-2 py-3 px-0 px-lg-3" data-bs-toggle="modal" data-bs-target="#logoutModal">Log out</button></li>';
                }
                else{
                    echo '<li class="nav-item mx-0 mx-lg-1"><button class="btn btn-outline-primary ml-2 nav-link py-3 px-0 px-lg-3" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button></li>
                <li class="nav-item mx-0 mx-lg-1"><button class="btn btn-primary ml-2 py-3 px-0 px-lg-3" data-bs-toggle="modal" data-bs-target="#loginModal">Log in</button></li>';
                }
            echo '
            </ul>
        </div>

    </div>
</nav>
';

include '_modals.php';
include '_dbconnect.php';
include './functions.php';
?>