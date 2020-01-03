<?php
session_start();
require_once "_inc/config.php";
require_once "_inc/function.php";
include_once '_partials/header.php';



if (isset($_POST["send-email"]) && $_SERVER['REQUEST_METHOD']  === 'POST' ) {
    require_once "email.php";


    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

     sendContactEmail($_POST["email"],$_POST["name"],$_POST["message"]);
}


?>


<!--<div class="bg-contact2" style="background-image: url('/*images/bg-01.jpg*/');">-->
<div class="white">

    <div class="container">
        <h1 class="contactheader">Contact uss</h1>

        <form class="contact " action="" method="POST">
            <div class="form-group mt" data-validate="Name is required">
                <label for="name">Name:</label>
                <input  required type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input  required type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea  required class="form-control textarea" rows="5" id="message" name="message"></textarea>
            </div>
            <p class="form-group">
                <input class="btn-sm btn-danger" type="submit" value="Send email" name="send-email">

            </p>
        </form>
    </div>

</div>
<?php include_once '_partials/footer.php' ?>
