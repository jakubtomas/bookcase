<?php
session_start();

require_once '../_inc/config.php';
require_once '../_inc/function.php';

$permission = 1;

if (isset($_POST['add-book']) && $_SERVER['REQUEST_METHOD'] === 'POST') {




    $errorMessage = "";


    // ak isbn nieje integer
    $_SESSION['isbn']       = plain(trim($_POST['isbn']));
    $_SESSION['book_name']  = plain(trim($_POST['book_name']));
    $_SESSION['book_autor'] = plain(trim($_POST['book_autor']));
    $_SESSION['genre']      = plain(trim($_POST['genre']));
    $_SESSION['pages']      = plain(trim($_POST['pages']));
    $_SESSION['year']       = plain(trim($_POST['year']));
    $_SESSION['publisher']  = plain(trim($_POST['publisher']));
    $_SESSION['desription'] = plain(trim($_POST['desription']));


    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];

    if (empty($imgFile)) {
        $_SESSION['errorMessage'] = "Please select Image File.";
        $permission               = 0;

    } else {
        $upload_dir = '../user_images/'; // upload directory
        // male pismena
        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension


        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

        // rename uploading image
        $userpic = rand(1000, 1000000) . "." . $imgExt;


        if (in_array($imgExt, $valid_extensions)) {
            // Check file size '5MB'
            if ($imgSize < 5000000) {
                move_uploaded_file($tmp_dir, $upload_dir . $userpic);
            } else {
                $_SESSION['errorMessage'] = "Sorry, your file is too large.";
                $permission               = 0;
            }
        } else {
            $_SESSION['errorMessage'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $permission               = 0;
        }
    }


    $year = $_POST['year'];

    if ($year > 2020 || $year < 200) {
        $_SESSION['errorMessage'] = "Year is not valid";
        $permission               = 0;


    }

    $pages = $_POST['pages'];
    if ($pages > 10000 || $pages < 1) {

        $_SESSION['errorMessage'] = "Pages - wrong input";
        $permission               = 0;

    }


    /*poznamka potrebna validacia pages and year*/

    if (!is_numeric($_POST['isbn'])) {
        $_SESSION['errorMessagenumber'] = "Warning  in isbn, you have to use numbers only";

        $permission = 0;

    }
    $isbn = strlen($_SESSION['isbn']);

    if ($isbn != 10 && $isbn != 13) {
        $_SESSION['errorMessagenumber'] = "Warning  isbn have to be number ,which has to consist of 10 or 13 numbers";

        $permission = 0;
    }
    if ($_POST['isbn'] && $_POST['book_name'] && $_POST['book_autor'] && $_POST['genre'] && $_POST['desription'] && $_POST['year'] && $_POST['pages'] && $_POST['publisher']) {


        if ($permission == 1) {
            $query = $conn->prepare("
                INSERT INTO books
                    (  isbn, book_name,book_autor, genre, desription, pages, made_year, publisher,bookPic)         
                VALUES
                    ( :isbn, :book_name ,:book_autor, :genre, :desription , :pages, :made_year, :publisher , :bookPic) 
            ");


            /*$isbn = $_POST['isbn'];*/

            $insert = $query->execute([
                'isbn'       => ucfirst(plain(trim($_POST['isbn']))),
                'book_name'  => ucfirst(plain(trim($_POST['book_name']))),
                'book_autor' => ucfirst(plain(trim($_POST['book_autor']))),
                'genre'      => ucfirst(plain(trim($_POST['genre']))),
                'desription' => ucfirst(plain(trim($_POST['desription']))),
                'pages'      => ucfirst(plain(trim($_POST['pages']))),
                'made_year'  => ucfirst(plain(trim($_POST['year']))),
                'publisher'  => ucfirst(plain(trim($_POST['publisher']))),
                'bookPic'    => $userpic


            ]);
            // poznamka vytvorit message ked spravne  ulozis data do databazi
            // poznamka vytvorit message aj pri update data

            $_SESSION['errorMessage'] = "Data has been saved successfully";
            unset($_SESSION['isbn'], $_SESSION['book_autor'], $_SESSION['book_name'],
                $_SESSION['genre'], $_SESSION['desription'], $_SESSION['errorMessagenumber']);

        } else {
            header("Location: $site_url" . "admin-book.php?addbook=1");

        }


    } else {
        $_SESSION['errorMessage'] = "Warning you have to feel all  fields";
        //$_SESSION['errorTwo']  = $errorMessage;
    }
    header("Location: $site_url" . "admin-book.php?addbook=1");

    die();
}


/*UPDATE BOOK ´================================================================================================*/
/*UPDATE BOOK ´================================================================================================*/
/*UPDATE BOOK ´================================================================================================*/
/*UPDATE BOOK ´================================================================================================*/

if (isset($_POST['update_book']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';


    $permission = 1;

    $id                     = plain(trim($_POST['book_id']));
    $_SESSION['isbn']       = plain(trim($_POST['isbn']));
    $_SESSION['book_name']  = plain(trim($_POST['book_name']));
    $_SESSION['book_autor'] = plain(trim($_POST['book_autor']));
    $_SESSION['genre']      = plain(trim($_POST['genre']));
    $_SESSION['pages']      = plain(trim($_POST['pages']));
    $_SESSION['year']       = plain(trim($_POST['year']));
    $_SESSION['publisher']  = plain(trim($_POST['publisher']));
    $_SESSION['desription'] = plain(trim($_POST['desription']));
    $_SESSION['about-book'] = plain(trim($_POST['about-book']));
    $_SESSION['bookPic']    = plain(trim($_POST['bookPic']));





    $year = $_POST['year'];

    if ($year > 2020 || $year < 200) {
        $_SESSION['errorMessage'] = "Year is not valid";
        $permission               = 0;


    }

    $pages = $_POST['pages'];
    if ($pages > 10000 || $pages < 1) {

        $_SESSION['errorMessage'] = "Pages - wrong input";
        $permission               = 0;

    }


    if (!is_numeric($_POST['isbn'])) {
        $_SESSION['errorMessagenumber'] = "Warning  in isbn, you have to use numbers only";

        $permission = 0;

    }
    $isbn = strlen($_SESSION['isbn']);

    if ($isbn != 10 && $isbn != 13) {
        $_SESSION['errorMessagenumber'] = "Warning  isbn have to be number ,which has to consist of 10 or 13 numbers";
        $permission                     = 0;
    }


    /*poznamka you have to control length $_POST['isbn'] ci je 13 alebo 10 else error message */

    if ($_POST['isbn'] && $_POST['book_name'] && $_POST['book_autor'] && $_POST['genre'] && $_POST['desription']
        && $_POST['pages'] && $_POST['year'] && $_POST['publisher'] && $id) {


        if ($permission !== 1) {
            header("Location: $site_url" . "_admin/edit-item.php?edit_id=$id" . "&backid=1");
            die();
        }



        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];

        if ($imgFile) {
            $upload_dir       = '../user_images/'; // upload directory
            $imgExt           = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $userpic          = rand(1000, 1000000) . "." . $imgExt;
            if (in_array($imgExt, $valid_extensions)) {
                if ($imgSize < 5000000) {
                    unlink($upload_dir . $_SESSION['bookPic']);
                    move_uploaded_file($tmp_dir, $upload_dir . $userpic);
                } else {
                    $_SESSION['errorMessagenumber'] = "Sorry, your file is too large it should be less then 5MB";
                }
            } else {
                $_SESSION['errorMessagenumber'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        } else {
            // if no image selected the old image remain as it is.
            $userpic = $_SESSION['bookPic']; // old image from database
        }







        if ($permission == 1) {



            $query = $conn->prepare("
                UPDATE books SET
                    isbn        = :isbn,
                    book_name   = :book_name,
                    book_autor  = :book_autor,
                    genre       = :genre,
                    desription  = :desription,
                    pages       = :pages,
                    made_year  = :made_year,
                    publisher  = :publisher,
                    bookPic   = :bookPic             
                                                                  
                 WHERE  book_id = :book_id
            ");
            /*poznamka neaktiluzuje nove data something is wrong */
            $update_post = $query->execute([
                'isbn'       => plain(trim($_POST['isbn'])),
                'book_name'  => ucfirst(plain(trim($_POST['book_name']))),
                'book_autor' => ucfirst(plain(trim($_POST['book_autor']))),
                'genre'      => ucfirst(plain(trim($_POST['genre']))),
                'desription' => ucfirst(plain(trim($_POST['desription']))),
                'book_id'    => ucfirst(plain(trim($_POST['book_id']))),
                'pages'      => ucfirst(plain(trim($_POST['pages']))),
                'made_year'  => ucfirst(plain(trim($_POST['year']))),
                'publisher'  => ucfirst(plain(trim($_POST['publisher']))),
                'bookPic'    => $userpic

            ]);
            /*die(" i am here and you  he was certanly die ");*/

            if ($update_post) {
                unset($_SESSION['isbn'], $_SESSION['book_name'], $_SESSION['book_autor'], $_SESSION['genre'],
                    $_SESSION['desription'], $_SESSION['pages'], $_SESSION['year'], $_SESSION['publisher'],
                    $_SESSION['errorMessagenumber'], $_SESSION['about-book']);
                // ak uspesne spravim update

                if (isset($_POST['about-book'])) { /*ked mam about book*/
                    $_SESSION['errorMessage'] = "Data were successfully changed";
                    $book_id                  = $_POST['book_id'];
                    header("Location: $site_url" . "about-book.php?edit_id=$book_id");
                    die();
                } else {
                    $_SESSION['errorMessage'] = "Data were successfully changed";
                    header("Location: $site_url" . "admin-book.php?update-delete=1=1");
                    // poznamka  podmienka nemsu byrt
                }

            } else {
                $_SESSION['errorMessage'] = "The change was not successful";
                header("Location: $site_url" . "_admin/edit-item.php?edit_id=$id" . "&backid=1");

            }
        } else {
            header("Location: $site_url" . "_admin/edit-item.php?edit_id=$id" . "&backid=1");

        }
    } else {

        $_SESSION['errorMessage'] = "Warning you have to feel all  fields";
        header("Location: $site_url" . "_admin/edit-item.php?edit_id=$id" . "&backid=1");

        /*/_admin/edit-item.php?edit_id=26*/

    }


}

?>

