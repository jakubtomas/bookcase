<?php
$page_name = basename($_SERVER["SCRIPT_NAME"], ".php");

if ($page_name == "index") $page_name = "home";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ucfirst($page_name); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?=  $site_url?>assets/style.css">



</head>


<body class="">
<!--<body class="bg-dark">-->


<nav class="navbar navbar-expand-sm navbar-dark ">
    <a class="py-2" href="<?= $site_url?>index.php">
        <img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-JulUCb7w_GPOzi9Vc08MfHapHX6-xi7v5mTN6A0w4tq70-sn&s"
                class=" rounded-corners img-logo " alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ml-auto ">
            <li class="nav-item ">
                <a class="nav-link waves-effect waves-light " href="<?= $site_url ?>index.php">Home

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="<?= $site_url ?>search-book.php">Search</a>
            </li>


            <?php if (isset($_SESSION['id']) && $_SESSION['id'] == 1): ?>

                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="<?= $site_url ?>admin-book.php">Admin </a>
                </li>
            <?php endif; ?>

            <li class="nav-item ">
                <a class="nav-link waves-effect waves-light " href="<?= $site_url ?>contact.php">Contact us
                </a>
            </li>


            <li class="nav-item ">
                <a class="nav-link waves-effect waves-light " href="<?= $site_url ?>aboutus.php">About us </a>
            </li>


            <?php if (isset($_SESSION['email'])  && isset($_SESSION['id'] )  ): ?>

                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="<?= $site_url ?>user.php">Account</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="<?= $site_url ?>logout.php">Logout</a>
                </li>               <!--poznamka odhlasit sa anglicky-->


            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="<?= $site_url ?>login.php">Login </a>
                </li>   <!--poznamka prihlasit sa anglicky-->

            <?php endif; ?>

        </ul>
        <form class="form-inline">
            <div class="md-form my-0">

            </div>
        </form>
    </div>
</nav>

