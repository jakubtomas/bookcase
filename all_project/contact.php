<?php
session_start();
require_once "_inc/config.php";
require_once "_inc/function.php";
include_once '_partials/header.php';
?>



<div class="white">

    <div class="container">
        <h1 class="contactheader">Contact us</h1>

        <form class="contact ">
            <div class="form-group mt" data-validate="Name is required">
                <label for="name">Name:</label>
                <input  required type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input  required type="email" class="form-control" id="email">
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea  required class="form-control textarea" rows="5" id="message"></textarea>
            </div>


            <p class="form-group">
                <input class="btn-sm btn-danger" type="submit" value="Send email" name="add-book">
            </p>
        </form>
    </div>

</div>
<?php include_once '_partials/footer.php' ?>
