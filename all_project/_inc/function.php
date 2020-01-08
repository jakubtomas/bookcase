<?php
require_once "config.php";


function plain($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}


/* */

function getBooks()
{
    global $conn;
    $records = $conn->prepare('SELECT * FROM books');

    $records->execute();
    $results = $records->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}


function getBookswithpagination($start_from, $record_per_page)
{
    global $conn;


    $query = $conn->prepare("SELECT * FROM books order by book_name 
            DESC  LIMIT  {$start_from},{$record_per_page}");

    /*$stmt->bindParam(':username', $start_from);*/
    $query->execute(/*array($start_from)*/);

    if ($query->rowCount()) {
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

    } else {
        $results = [];
    }

    return $results;
}

function getcountBooks()
{
    global $conn;
    $records = $conn->prepare('SELECT count(*) FROM books');

    $records->execute();
    $results = $records->fetchAll(PDO::FETCH_COLUMN);

    return $results;
}


function getOneData()
{

    if (!($_GET['edit_id']) || !is_numeric($_GET['edit_id'])) {

        die();
    }

    global $conn;


    $query = $conn->prepare("SELECT * FROM books WHERE book_id = ? LIMIT 1");

    $query->execute(array($_GET['edit_id']));


    if ($query->rowCount()) {
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

    } else {
        $results = [];
    }

    return $results;
}



function getOneBook($id)
{

    global $conn;


    $query = $conn->prepare("SELECT * FROM books WHERE book_id = ? LIMIT 1");

    $query->execute(array($id));


    if ($query->rowCount()) {
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

    } else {
        $results = [];
    }

    return $results;
}

function getSearchBook($start_from, $record_per_page)
{
    global $conn;
    $query = $conn->prepare("SELECT  *  FROM books 
                             WHERE  isbn LIKE :isbn
                             OR book_name LIKE :book_name
                             OR book_autor LIKE :book_autor 
                             OR genre LIKE  :genre
                             OR desription LIKE :desription
                    order by  book_name
                DESC  LIMIT  {$start_from},{$record_per_page}
                                 ");

    /* $query = $conn->prepare("SELECT * FROM books order by book_name
            DESC  LIMIT  {$start_from},{$record_per_page}");*/

    /*if (empty($_POST['search'])) {
        $q = plain($_POST['searchbook']);
    }else {

    $q = plain($_POST['search']);
    }*/


    if (empty($_GET['search'])) {
        $q = plain($_GET['searchbook']);
    }else {

        $q = plain($_GET['search']);
    }
    


    $query->execute([
        'isbn'       => "%$q%",
        'book_name'  => "%$q%",
        'book_autor' => "%$q%",
        'genre'      => "%$q%",
        'desription' => "%$q%"
    ]);

    if ($query->rowCount()) {
        $results = $query->fetchAll(PDO::FETCH_ASSOC);


    } else {
        $results = [];
    }

    return $results;

}

function getCountSearchBooks()
{
    global $conn;
    $query = $conn->prepare("SELECT  COUNT(*)  FROM books 
                             WHERE  isbn LIKE :isbn
                             OR book_name LIKE :book_name
                             OR book_autor LIKE :book_autor 
                             OR genre LIKE  :genre
                             OR desription LIKE :desription
                    order by  book_name
                DESC  LIMIT  0,10
                                 ");

    /* $query = $conn->prepare("SELECT * FROM books order by book_name
            DESC  LIMIT  {$start_from},{$record_per_page}");*/

    /*if (empty($_POST['search'])) {
        $q = plain($_POST['searchbook']);
    }else {

    $q = plain($_POST['search']);
    }*/


    if (empty($_GET['search'])) {
        $q = plain($_GET['searchbook']);
    }else {

        $q = plain($_GET['search']);
    }



    $query->execute([
        'isbn'       => "%$q%",
        'book_name'  => "%$q%",
        'book_autor' => "%$q%",
        'genre'      => "%$q%",
        'desription' => "%$q%"
    ]);

    if ($query->rowCount()) {
        $results = $query->fetchAll(PDO::FETCH_COLUMN);
    } else {
        $results = [];
    }
    return $results;

}

function getSearchBookwithPagination($start_from, $record_per_page)
{
    global $conn;
    $query = $conn->prepare("SELECT *  FROM books 
                             WHERE  isbn LIKE :isbn
                             OR book_name LIKE :book_name
                             OR book_autor LIKE :book_autor 
                             OR genre LIKE  :genre
                             OR desription LIKE :desription
                              ORDER BY book_name
                            DESC  LIMIT  {$start_from},{$record_per_page}
                                 ");


    if (empty($_GET['search'])) {
        $q = plain($_GET['searchbook']);
    }else {

        $q = plain($_GET['search']);
    }



    $query->execute([
        'isbn'       => "%$q%",
        'book_name'  => "%$q%",
        'book_autor' => "%$q%",
        'genre'      => "%$q%",
        'desription' => "%$q%"
    ]);

    if ($query->rowCount()) {
        $results = $query->fetchAll(PDO::FETCH_ASSOC);


    } else {
        $results = [];
    }

    return $results;

}



function getRecordReserve($book_id)
{
    global $conn;

    $query = $conn->prepare("SELECT * FROM reserve WHERE book_id = ? AND user_id = ?  ");

    $query->execute(array($book_id, $_SESSION['id']));

    if ($query->rowCount()) {
        /*$results = $query->fetchAll(PDO::FETCH_ASSOC)*/;

        $results =1;

    } else {
       // echo 'Nothing reservation ';
        $results = 0;
    }
    return $results;
}



function getReservation()
{
    global $conn;
    $records = $conn->prepare('SELECT * FROM books Inner JOIN reserve 
                                ON books.book_id= reserve.book_id WHERE user_id = ?'  );

    $records->execute(array($_SESSION['id'] ));
    $results = $records->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}



function getBookReservation()
{
    global $conn;
    $records = $conn->prepare('SELECT * FROM books Inner JOIN reserve 
                                ON books.book_id= reserve.book_id WHERE books.book_id = ?'  );

    $records->execute(array($_GET['edit_id']));
    $results = $records->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}



function getAllReservation()
{
    global $conn;

    $records = $conn->prepare('SELECT * , reserve.id as idReservation FROM books 
                                INNER JOIN  reserve ON books.book_id = reserve.book_id 
                                INNER JOIN  users ON users.id = reserve.user_id 
order by  status'  );



    $records->execute();
    $results = $records->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}


function getDataReservedBook($id)
{
    global $conn;

    $records = $conn->prepare('SELECT users.email, books.book_autor,books.book_name, books.isbn FROM users 
                                INNER JOIN  reserve ON users.id = reserve.user_id 
                                INNER JOIN  books ON  reserve.book_id = books.book_id
                               WHERE reserve.id = ? LIMIT 1'  );



    $records->execute(array($id));
    $results = $records->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}






