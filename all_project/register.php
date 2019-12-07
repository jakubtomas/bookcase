<?php
session_start();
require_once '_inc/config.php';
require_once '_inc/function.php';

/*if (isset($_SESSION['user_id'])) {
    header("Location: /userautentification");
}*/

$errorEmail   = 0;
$email        = "";
$permission   = TRUE;
$bad_password = FALSE;


if (isset($_POST['add-registration']) && $_SERVER['REQUEST_METHOD'] === 'POST') {



    $desktopMessage = array();

    $email            = plain(trim($_POST['email']));
    $password         = plain(trim($_POST['password']));
    $confirm_password = plain(trim($_POST['confirm_password']));

    $_SESSION['email'] = plain(trim($_POST['email']));


    // check email =========================================
    if (empty($email)) {

        array_push($desktopMessage, "you forgot email");


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
            array_push($desktopMessage, "Email is not a valid");


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
                array_push($desktopMessage, "password have to have minimum 6 values and max 150");

                $permission = FALSE;

                /*2a2*/
            }/* else {
                array_push($desktopMessage, "Dlzka hesla je okey " );

                ;
            }*/
            /*2b*/
        } else {
            array_push($desktopMessage, "Hesla  niesu zhodne ");;

            $permission = FALSE;
        }
    }

    if (!$errorEmail) {

        $records = $conn->prepare('SELECT (1) FROM users WHERE email= :email');



        $records->execute(array(':email' => $email));

        $results = $records->fetch(PDO::FETCH_ASSOC);

        if ($results) {
            $permission = FALSE;
            array_push($desktopMessage, "Nasledujuci email už bol použity musis použit iny email ");

        } /*else {
            array_push($desktopMessage, "thid email we dont have in our database" );

             = "this email isnt in our databse";
        }*/

    }

    /*
            $stmt->bindParam(':email', $_POST['email'] );
            $stmt->bindParam(':password', password_hash($_POST['password'] , PASSWORD_BCRYPT));*/


    if ($permission):
        echo 'insert';

        $hash = md5(rand(0, 10000)); // potrebne ten hash vlozit do tabulky
        echo ' second step is ';
        // enter the new user in the database
        $sql  = "INSERT INTO users   (password, email,hash, active_account) VALUES  (:password, :email, :hash,:active_account)";
        $stmt = $conn->prepare($sql);


        $hash_password = password_hash($password, PASSWORD_BCRYPT);

        $one = 1;

        $stmt->bindParam(':password', $hash_password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':hash', $hash);
        $stmt->bindParam(':active_account', $one);

        $results = $stmt->execute();
        if ($results):


            /* 1.  poznamka generovanie  hash md5 pre email
             md5(rand(0,1000)) its okey

            2. musim pridat do databazi stlpec active a predefinovana hodnota bude
            nula akože nieje aktivovany a po kliknuti na aktivacčnyý link
            sa acitve zmeni na jedna a presmeruje na stranku login okey

            3. you have to create new stlpec in database for hash md5
             generovany hash bude ukladat do databazi   potrebne dokoncit

            4. you have to create  verify.php where you check hash and if hash is
            correct after this  change active user from 0 to 1
            */


            /*

                        */

            /* SEND EMAIL  CONTROL */

            /*$subject = 'Account Verification';

            $messagebody = ' Hello ' . $email . '
            Thank you for signing up 
            
            Please click this link to activate your account
            
             
            http://localhost:80/library/verification.php?email=' . $email . '&hash=' . $hash;

            //http://localhost:82/library/verification.php?email=oriesok4@gmail.com&hash=069654d5ce089c13f642d19f09a3d1c0

            mail($email, $subject, $messagebody);

*/
            $message = 'Successfully created new user you have to active your account via the link in your email';

            echo '            http://localhost:82/library/verify.php?email= ' . $email . '&hash=' . $hash;

            $_SESSION['message'] = " Uspesna registracia";
            header("Location: $site_url" . "login.php");
        else:
            $message = 'Sorry registration failed  ,Try again';
        endif;

    endif;

}


// poznamka kontrolny vypis
$records = $conn->prepare('SELECT * FROM users');
//$records->bindParam(':email', $_POST['email']);
$records->execute();
$results = $records->fetchAll(PDO::FETCH_ASSOC);


include_once '_partials/header.php';

?>




<h1>Registration users</h1>
<span>or <a href="login.php">login here</a></span>


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


        <input type="password" placeholder="and password" name="password"  required>


        <input type="password" placeholder="confirm password" name="confirm_password" required>


        <input class="btn-sm btn-danger margin-bottom" type="submit" value="Send" name="add-registration">

    </form>

</div>
<?php


// poznamka nefunguje vypisvanie  priradenie do hodnot erromessage ,, riesenie je vytvorenie pola
// do ktoreho budeme pridavat error message a potom to vypisem  ries  to cez pole video youtube codesource

// nekuzaju vypis  ked zadam  male heslo do 6 znakov
unset($_SESSION['email']);
include_once '_partials/footer.php' ?>
