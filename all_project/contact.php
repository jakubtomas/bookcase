<?php
session_start();
require_once "_inc/config.php";
require_once "_inc/function.php";
include_once '_partials/header.php';


if (isset($_POST["send-email"]) && isset($_POST["g-recaptcha-response"]) && $_POST["g-recaptcha-response"] && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once "email.php";

    $secret = "6Le5r8wUAAAAAJMYpNO2-ywlXOlaD7MTEZivK_NN";
    $ip = $_SERVER["REMOTE_ADDR"];
    $captcha = $_POST["g-recaptcha-response"];
    $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $ip);

    $arr = json_decode($rsp);


    if (isset($arr->success) && $arr->success === true) {
        // if everything is okey lets send email

        unset($_SESSION["name_contact"], $_SESSION["email_contact"], $_SESSION["message_contact"]);

        $email = sendContactEmail($_POST["email"], $_POST["name"], $_POST["message"]);

        if (isset($email)) {
            echo '<div class="alert alert-secondary">';
            echo $email;
            echo '</div>';

        }


    } else {
        echo '<div class="alert alert-secondary">';
        echo "Probably this is SPAM";
        echo '</div>';
    }


} elseif (isset($_POST["send-email"])) {

    $_SESSION["name_contact"] = $_POST["name"];
    $_SESSION["email_contact"] = $_POST["email"];
    $_SESSION["message_contact"] = $_POST["message"];


    echo '<div class="alert alert-danger">';
    echo "please click on reCAPTCHA";
    echo '</div>';
}
?>


<!--<div class="bg-contact2" style="background-image: url('/*images/bg-01.jpg*/');">-->
<div class="white">

    <div class="container">
        <h1 class="contactheader">Contact us</h1>

        <form class="contact " action="" method="POST">
            <div class="form-group mt" data-validate="Name is required">
                <label for="name">Name:</label>
                <input required type="text" class="form-control" id="name" name="name"
                       value="<?php if (isset($_SESSION["name_contact"])) echo $_SESSION["name_contact"] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input required type="email" class="form-control" id="email" name="email"
                       value="<?php if (isset($_SESSION["email_contact"])) echo $_SESSION["email_contact"] ?>">
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea required class="form-control textarea" rows="5" id="message"
                          name="message"><?php if (isset($_SESSION["message_contact"])) echo $_SESSION["message_contact"] ?></textarea>
            </div>


            <!--            <div class="g-recaptcha" data-sitekey="6Le5r8wUAAAAADq9dPf2aKWdZoV_E3CxR06hL0Li"></div>
            -->

            <div class="stred">

                <div class="g-recaptcha" data-sitekey="6Le5r8wUAAAAADq9dPf2aKWdZoV_E3CxR06hL0Li"></div>
            </div>

            <p class="form-group">


                <input class="btn-sm btn-danger" type="submit" value="Send email" name="send-email">

            </p>
        </form>
    </div>

</div>
<?php include_once '_partials/footer.php' ?>
