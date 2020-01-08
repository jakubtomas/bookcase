<?php
session_start();
require_once '_inc/config.php';
require_once '_inc/function.php';

$errorMessage = array();
if (isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = plain(trim($_POST['email']));

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    // najprv ocistim email od bordelu
    // az potom  skontrolujem spravnost emailu


    ///  It this good correct condition  , i mean ! before filter var  ,, check this
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
        /* .= ("email is a valid email address  ");
        array_push($desktopMessage, "Email is valid correct " );
        */

    } else {
        array_push($errorMessage, "Your email isnt valid ");
    }


    $records = $conn->prepare('SELECT * FROM users WHERE email= :email');
    $records->execute(array(':email' => $email));
    $results = $records->fetch(PDO::FETCH_ASSOC);

    // password_verify($_POST['password'],$results["password"] );


    if ($results) {
        // array_push($errorMessage, "Nasledujuci email  máme v databaze");
        if ($results ['active_account'] == 2) {

            echo '<pre>';
            print_r(password_verify(plain(trim($_POST['password'])), $results["password"]));
            echo '</pre>';


            if (password_verify(plain(trim($_POST['password'])), $results["password"])) {
                $_SESSION['id']    = $results  ["id"];
                $_SESSION['email'] = $results  ["email"];


                $_SESSION['messages'] = "You was successfully logged in";



                header("Location: $site_url" . "index.php");
                //    header("Content-Language: en-GB");

            } else {

                array_push($errorMessage, "Invalid username or password");

            }

        } else {
            array_push($errorMessage, "Please you have to activate your account via the email");
        }

    } else {

        array_push($errorMessage, "Invalid username or password");
    }



}

include_once '_partials/header.php';
?>



<?php if (!empty($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>


<?php
if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {

    echo '<div class="messageContainer">';
    echo '<div class="alert  alert-success " role="alert">';
    echo $_SESSION['message'];

    echo '<br>';
    echo '</div>';
    echo '</div>';

    unset($_SESSION['message']);
}
?>

<div class="messageContainer">

    <?php if (!empty($errorMessage)) {
        foreach ($errorMessage as $value) {
            echo '';
            echo '<div class="alert  alert-danger " role="alert">';
            echo $value;
            echo '<br>';
            echo '</div>';
        }
    } ?>
</div>


<h1 class="loginwords">Login</h1>
<span class="loginwords">or  <a  class="loginwords" href="<?= $site_url ?>register.php">Sign up</a></span>



<div class="skuska">


    <form action="login.php" method="POST">

        <div class="imgcontainer">
            <img src="img_avatar2.png" alt="Avatar" class="avatar">

        </div>


        <?php if (!empty($email)): ?>
            <input type="text" placeholder="Enter your email" name="email" value="<?= trim($email) ?>">

        <?php else: ?>
            <input type="email" placeholder="Enter your email" name="email" required>
        <?php endif; ?>

        <input type="password" placeholder="Enter your password" name="password" required>

        <input class="btn-sm btn-danger margin-bottom" type="submit" value="Send" name="login">

    </form>
</div>


<?php


include_once '_partials/footer.php' ?>
