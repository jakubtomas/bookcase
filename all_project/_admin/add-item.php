<?php
session_start();

require_once '../_inc/config.php';
require_once '../_inc/function.php';

$permission = 1;

if (isset($_POST['add-book']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';


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


    /*Array
(
    [isbn] => 123123123
    [book_name] => required
    [book_autor] => required
    [genre] => Action
    [pages] => 123
    [year] => 2016
    [desription] => Hallo asdlôfkjasdôflkasjdfôlasdfkj
    [add-book] => Add book
)*/
    $year = $_POST['year'];

    if ($year > 2020 || $year < 200) {
        echo 'cislo nie je v rozsahu';
        $_SESSION['errorMessage'] = "Bad years";
        $permission = 0;
                    /*english*/


    }

    $pages = $_POST['pages'];
    if ($pages > 10000 || $pages < 1) {
        echo 'pocet stran je zly';
        $_SESSION['errorMessage'] = "Pages are bad";
        $permission = 0;
        /*english*/

    }


    /*poznamka potrebna validacia pages and year*/

    if (!is_numeric($_POST['isbn'])) {
        $_SESSION['errorMessagenumber'] = "Warning  in isbn, you have to use only number";

        $permission = 0;

    }
    $isbn = strlen($_SESSION['isbn']);

    if ($isbn != 10 && $isbn != 13) {
        $_SESSION['errorMessagenumber'] = "Warning  isbn have to be type number ,which have to consist of 10 or 13 number";

        $permission = 0;
    }
    if ($_POST['isbn'] && $_POST['book_name'] && $_POST['book_autor'] && $_POST['genre'] && $_POST['desription'] && $_POST['year'] && $_POST['pages'] && $_POST['publisher']) {


        if ($permission == 1) {
            $query = $conn->prepare("
                INSERT INTO books
                    (  isbn, book_name,book_autor, genre, desription, pages, made_year, publisher)         
                VALUES
                    ( :isbn, :book_name ,:book_autor, :genre, :desription , :pages, :made_year, :publisher) 
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
                'publisher'  => ucfirst(plain(trim($_POST['publisher'])))


            ]);
            // poznamka vytvorit message ked spravne  ulozis data do databazi
            // poznamka vytvorit message aj pri update data

            $_SESSION['errorMessage'] = " data was success insert";
            unset($_SESSION['isbn'], $_SESSION['book_autor'], $_SESSION['book_name'],
                $_SESSION['genre'], $_SESSION['desription'], $_SESSION['errorMessagenumber']);

        } else {
            header("Location: $site_url" . "admin-book.php?addbook=1");

        }


    } else {
        $_SESSION['errorMessage'] = "Warning some place are empty ";
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


    if (!is_numeric($_POST['isbn'])) {
        $_SESSION['errorMessagenumber'] = "Warning  in isbn, you have to use only number";

        $permission = 0;

    }
    $isbn = strlen($_SESSION['isbn']);

    if ($isbn != 10 && $isbn != 13) {
        $_SESSION['errorMessagenumber'] = "Warning  isbn have to consist of 10 or 13 number";
        $permission                     = 0;
    }


    /*poznamka skontrolovat  dlzku $_POST['isbn'] ci je 13 alebo 10 inak error message */

    if ($_POST['isbn'] && $_POST['book_name'] && $_POST['book_autor'] && $_POST['genre'] && $_POST['desription']
        && $_POST['pages'] && $_POST['year'] && $_POST['publisher'] && $id) {


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
                    publisher  = :publisher
                                                                  
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
                'publisher'  => ucfirst(plain(trim($_POST['publisher'])))

            ]);
            /*die(" i am here and you  he was certanly die ");*/

            if ($update_post) {
                unset($_SESSION['isbn'], $_SESSION['book_name'], $_SESSION['book_autor'], $_SESSION['genre'],
                    $_SESSION['desription'], $_SESSION['pages'], $_SESSION['year'], $_SESSION['publisher'],
                    $_SESSION['errorMessagenumber'], $_SESSION['about-book']);
                // ak uspesne spravim update

                if (isset($_POST['about-book'])) { /*ked mam about book*/
                    $_SESSION['errorMessage'] = "Data was successfully update";
                    $book_id                  = $_POST['book_id'];
                    header("Location: $site_url" . "about-book.php?edit_id=$book_id");
                    die();
                } else {
                    $_SESSION['errorMessage'] = "Data was successfully update";
                    header("Location: $site_url" . "admin-book.php?update-delete=1=1");
                    // poznamka  podmienka nemsu byrt
                }

            } else {
                $_SESSION['errorMessage'] = "Update was unsuccessfully ";
                header("Location: $site_url" . "_admin/edit-item.php?edit_id=$id" . "&backid=1");

            }
        } else {
            header("Location: $site_url" . "_admin/edit-item.php?edit_id=$id" . "&backid=1");

        }
    } else {

        $_SESSION['errorMessage'] = "You didnt ";
        header("Location: $site_url" . "_admin/edit-item.php?edit_id=$id" . "&backid=1");

        /*/_admin/edit-item.php?edit_id=26*/

    }


}


/*EVENTS  add new article   */

if (isset($_POST['add-event']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'i am here';

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

}

?>

