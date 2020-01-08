<?php
session_start();
require_once '_inc/config.php';
require_once '_inc/function.php';


/*if (isset($_SESSION['user_id'])) {
    header("Location: /userautentification");
}*/

$errorEmail = 0;
$email = "";
$permission = TRUE;
$bad_password = FALSE;


if (isset($_POST['add-registration']) && $_SERVER['REQUEST_METHOD'] === 'POST') {


    $desktopMessage = array();

    $email = plain(trim($_POST['email']));
    $password = plain(trim($_POST['password']));
    $confirm_password = plain(trim($_POST['confirm_password']));

    $_SESSION['email'] = plain(trim($_POST['email']));


    // check email =========================================
    if (empty($email)) {

        array_push($desktopMessage, "Email is required");


        $errorEmail = TRUE;
        $permission = FALSE;

    } else {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        // najprv ocistim email od bordelu
        // az potom  skontrolujem spravnost emailu


        ///  It this good correct condition  , i mean ! before filter var  ,, check this
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
            /* .= ("email is a valid email address  ");
            array_push($desktopMessage, "Email is valid correct " );
            */

        } else {
            array_push($desktopMessage, "Email is not valid");


            $permission = FALSE;
            $errorEmail = TRUE;
        }
    }

    // Password control check ========================================


    // check input ,, that do we have something
    /*1*/
    if (empty($password) || empty($confirm_password)) { // if empty one input


        array_push($desktopMessage, "Password or confirm  password input is empty ");
        $permission = FALSE;

        /*2*/
    } else {  // if not empty next check sameness password


        /*2a*/
        if ($password == $confirm_password) {

            //   array_push($desktopMessage, "hesla sa zhoduju " );

            // if password are sameness next check length passsword
            // kontorola dlzky hesla
            /*2a1*/
            if (strlen($password) < 6 || strlen($password) > 150) {
                array_push($desktopMessage, "Invalid password : minimum charachters 6 and max 150");

                $permission = FALSE;

                /*2a2*/
            }/* else {
                array_push($desktopMessage, "Dlzka hesla je okey " );

                ;
            }*/
            /*2b*/
        } else {
            array_push($desktopMessage, "Please make sure your passwords match");;

            $permission = FALSE;
        }
    }

    if (!$errorEmail) {

        $records = $conn->prepare('SELECT (1) FROM users WHERE email= :email');


        $records->execute(array(':email' => $email));

        $results = $records->fetch(PDO::FETCH_ASSOC);

        if ($results) {
            $permission = FALSE;
            array_push($desktopMessage, "This email is not available");

        } /*else {
            array_push($desktopMessage, "thid email we dont have in our database" );

             = "this email isnt in our databse";
        }*/

    }


    if ($permission):
        echo 'insert';

        $hash = md5(rand(0, 10000)); // neccessary add hash into databas
        echo ' second step is ';
        // enter the new user in the database
        $sql = "INSERT INTO users   (password, email,hash, active_account) VALUES  (:password, :email, :hash,:active_account)";
        $stmt = $conn->prepare($sql);


        $hash_password = password_hash($password, PASSWORD_BCRYPT);

        $one = 1;

        $stmt->bindParam(':password', $hash_password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':hash', $hash);
        $stmt->bindParam(':active_account', $one);

        $results = $stmt->execute();
        if ($results):


            require_once 'email.php';

            sendEmail($email, $hash);

            $_SESSION['message'] = "Registration was successfully. Please check your email";
            header("Location: $site_url" . "login.php");
        else:
            $message = 'Sorry registration failed  ,Try again';
        endif;

    endif;

}


$records = $conn->prepare('SELECT * FROM users');
//$records->bindParam(':email', $_POST['email']);
$records->execute();
$results = $records->fetchAll(PDO::FETCH_ASSOC);


include_once '_partials/header.php';

?>


<h1 class="loginwords">Sign up</h1>
<span class="loginwords">or <a class="loginwords" href="login.php">login here</a></span>


<div class="messageContainer">


    <?php if (!empty($desktopMessage)) {
        foreach ($desktopMessage as $value) {

            echo '<div class="alert  alert-danger" role="alert">';
            echo $value;
            echo '<br>';
            echo '</div>';
        }
    } ?>

</div>


<div class="skuska">


    <form action="register.php" method="POST">

        <?php if ($permission) {

            echo '<input type="text" placeholder="Enter your email" name="email"  required >';

        } elseif (($errorEmail)) {

            echo '<input type="email" placeholder="Enter your email" name="email"  class="bc-danger" value=" ' . $email . '"  required>';
        } else {
            echo '<input type="email" name="email"  class="" value="' . $email . '"  required>';

        }
        ?>


        <input type="password" placeholder="and password" name="password" required>


        <input type="password" placeholder="confirm password" name="confirm_password" required>


        <input class="btn-sm btn-danger margin-bottom" type="submit" value="Send" name="add-registration">

    </form>

</div>
<?php


unset($_SESSION['email']);
include_once '_partials/footer.php' ?>
