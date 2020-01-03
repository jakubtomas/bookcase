<?php
session_start();
require_once '_inc/config.php';
require_once '_inc/function.php';
include_once '_partials/header.php';

//http://localhost:82/library/verification.php?email= '.$email. '&hash'.$hash
if (isset($_GET['email']) && isset($_GET['hash']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    echo 'i am here verification .php';


    $email = $_GET['email'];
    $hash  = $_GET['hash'];

    $records = $conn->prepare('SELECT * FROM users WHERE email= :email');
    $records->execute(array(':email' => $email));
    $results = $records->fetch(PDO::FETCH_ASSOC);

    echo '<pre>';
    print_r($results);
    echo '</pre>';




    if ($results['hash'] == $hash && $results ['email'] == $email) {
        echo 'hash a email su v poriadku ';
        //  change value na database active-account from 1 to 2 (active)
        $numberTwo = 2;  //  2 number means your account is active you can login

        $query = $conn->prepare('UPDATE users
									     SET active_account=:active_account 
  								       WHERE email=:email
  							           /*AND hash = :hash 	 */     ');

        $query->bindParam(':active_account', $numberTwo);
        $query->bindParam(':email', $email);

        if ($query->execute()) {
            ?>
            <script>
                alert('Successfully Updated ...');
                   window.location.href = 'login.php';
            </script>
            <?php
        } else {
            $errMSG = "Sorry Data Could Not Updated !";
            echo $errMSG;
        $_SESSION['message'] = "your account was succesfully active you can sig in  ";
        }


        /*
                $update_post = $query->execute([
                    'active-account' => $one,
                    'email'          => $_GET['email']

                ]);*/

        /*if (1 == 3) {
            echo 'uspesne pridane';
        }
        else {
            echo 'nnic si nepridal ZLEEEEEE';
        }
         */
       // header("Location: $site_url" ."index.php");

        echo 'kontrolny vypis ';

    }else {
        echo 'tvoj ucet nebol aktivovany  nesedel hash alebo email ';

    }

    // i need message about ok and aobu everythink is bad

    /*1 simply select data from database where email is get email okey
     2. after this you have to compare  get hash and has from database
    if everything is correct you change value in column  active-account ,, change from zero to 1

    3. you have to create / add this column in database and default value have to be 0
    */


}else {
    echo '404.php'; // poznamka do file 404.php
}


?>
