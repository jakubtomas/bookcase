<?php
require_once '../_inc/config.php';
require_once '../_inc/function.php';


if (isset($_GET['delete_id'])) {

    $delete_book = getOneBook($_GET['delete_id']);

    unlink("../user_images/" . $delete_book[0]['bookPic']);

    $query = $conn->prepare("DELETE FROM books WHERE book_id = :get_id");

    $delete = $query->execute([
        'get_id' => $_GET['delete_id']
    ]);

    if ($delete) {
/*        unset($_SESSION['isbn'], $_SESSION['book_autor'], $_SESSION['book_name'], $_SESSION['genre'], $_SESSION['desription']  );*/

        $_SESSION['errorMessage'] = "Data were successfully erased";
        header("Location: $site_url" ."admin-book.php?update-delete=1");
        die();


    }
}


if (isset($_GET['delete_reservation'])) {
    echo '<pre>';
    print_r($_GET['delete_reservation']);
    echo '</pre>';


    $query = $conn->prepare("DELETE FROM reserve WHERE id = :get_id");

    $delete = $query->execute([
        'get_id' => $_GET['delete_reservation']
    ]);

    if ($delete) {
        /*        unset($_SESSION['isbn'], $_SESSION['book_autor'], $_SESSION['book_name'], $_SESSION['genre'], $_SESSION['desription']  );*/

        $_SESSION['errorMessage'] = "The reservation was  canceled";


        if (isset($_GET['adminreservation']) ){

        header("Location: $site_url" ."admin-book.php?reserve=1");
        die();
        }
        header("Location: $site_url" ."user.php");


    }
}

?>