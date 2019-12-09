<?php
session_start();
require_once "_inc/config.php";
require_once "_inc/function.php";
include_once '_partials/header.php';


$reserve = 3;
/*
 * 1 vytiahnut data z databazi
 * 2. porovnat a spravit vysledok na zakalde dat
 *
}*/

if (isset($_SESSION['errorMessage']) && !empty($_SESSION['errorMessage'])) {

    echo '<div class="messageContainer">';
    echo '<div class="alert  alert-danger " role="alert">';
    echo $_SESSION['errorMessage'];

    echo '<br>';
    echo '</div>';
    echo '</div>';

    unset($_SESSION['errorMessage']);
}

if (isset($_SESSION['errorMessagenumber']) && !empty($_SESSION['errorMessagenumber'])) {

    echo '<div class="messageContainer">';
    echo '<div class="alert  alert-danger " role="alert">';
    echo $_SESSION['errorMessagenumber'];

    echo '<br>';
    echo '</div>';
    echo '</div>';

    unset($_SESSION['errorMessagenumber']);
}


if (isset($_GET['edit_id']) && $_SERVER['REQUEST_METHOD'] == 'GET') {
    /*echo '<pre>';
    print_r($_GET['edit_id']);
    echo '</pre>';*/

    $book = getOneData();
    echo $book[0]['book_id'];


    $status = getBookReservation();

    echo  count($status);
    if ($status) {
        echo 'mamae status viac nez 0';
    }

    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $reserve = getRecordReserve($book[0]['book_id']);
        echo $reserve;

    }


    /*
 *
    echo '<pre>';
    print_r($book);
    echo '</pre>';*/

} elseif ($_POST ) {
    if (isset($_POST['reserve'])) {
        echo "mam reserve";
        echo '<br>';

        /*1 udaje  2 kontrola 3 query 4 succes 5 presmerovanie stranky*/
        echo $_POST['book_id'];
        echo '<br>';
        echo $_SESSION['id'];

        $book_id = $_POST['book_id'];
        $user_id = $_SESSION['id'];


        $query = $conn->prepare("
                    INSERT INTO reserve
                        (  book_id , user_id )         
                    VALUES
                        ( :book_id, :user_id ) 
                ");


        $insert = $query->execute([
            'book_id' => $book_id,
            'user_id' => $user_id

        ]);

        if ($insert) {
            echo 'success add argument';
            $message = "Reservation success";

        }

        if (isset($message)) {
            echo '<div class="alert alert-success">';
            echo '<strong>Success!</strong> Reservation you can change in Account';
            echo '</div>';

            $book = getOneBook($book_id);

        }

    if (isset($_POST['favorite'])) {
        echo "mam favorite";

    }

    if (isset($_POST['update'])) {
        echo "mam update";
    }
    if (isset($_POST['delete']) && $_SESSION['id'] ==1 && $_POST['book_id'] ) {



    /*poznamka potrebujem id uzivatela id knihy  a vytvorit query  tabulku a message success */

        echo "mam delete";
    }

    }

}else die("404");


echo '<pre>';
print_r($book);
echo '</pre>';

?>




<?php foreach ($book as $value) : ?>
<div class="container bg-white border rounded shadow p-3 mb-5 ">
    <div class="rowe mb-2 ">
        <div class="col-md-6">
            <div class="rowe no-gutters  overflow-hidden flex-md-row mb-4  position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <img class="img-book"
                         src="https://mrtns.eu/tovar/_l/655/l655839.jpg?v=1574150481" alt="book">


                </div>


            </div>
        </div>


        <div class="col-md-6">
            <div class="rowe no-gutters  overflow-hidden flex-md-row mb-4   position-relative">
                <div class="col p-4 d-flex flex-column position-static left">

                    <h2><?php echo $value["book_name"] ?></h2>
                    <p> <?php echo $value["book_autor"] ?></p>

                    <p class="mb-auto"><b>Vydavateľ:</b> <?php echo $value["publisher"] ?></p>   <!--potrebne dokoncit-->
                    <p class="mb-auto"><b>ISBN:</b> <?php echo $value["isbn"] ?></p>
                    <p class="mb-auto"><b>Poč.strán:</b> <?php echo $value["pages"] ?></p>
                    <p class="mb-auto"><b>Rok vydania:</b> <?php echo $value["made_year"] ?></p>
                    <p>
                        <!--poznamka prva vec send instruction Laco , pato , jakub  and some example -->
                        <!-- poznamka POtrebne vytvorit nove tabulky do databazi  Vydavatel POcet stran rok vydania -->
                        <!--poznamka bude potrebne pridat new input do formularov, aj update formular  dopisat query  na pridanie do table -->
                    </p>
                    <!--                    <button type="button" class="btn btn-success btn-sm btn-reserve">Borrow</button>
                                       -->
               <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'] ) ) : ?>
                    <?php if ($reserve == 1) : ?>
                        <p class="mb-auto">INFO : This book someone reserved</p>
                        <br>
                    <?php endif; ?>

                    <form name="myLetters" action="about-book.php" method="POST">
                        <input name="book_id" type="hidden" value="<?= $value['book_id'] ?>">

                        <?php if ($reserve == 0) : ?>



                            <?php if (empty($status)) :?>
                            <input type="submit" class="btn btn-success btn-sm btn-reserve button-books" name="reserve"
                                   value="Reserve">

                            <?php endif; ?>

                        <?php endif; ?>
                        <input type="submit" class="btn btn-success btn-sm btn-reserve button-books" name="favorite"
                               value="Add Favorite">

                    </form>
                    <br>
                    <!--Only the admin section -->

                   <?php if ( $_SESSION['id'] ==1 ):?>
                <!--    <form name="myLetters" action="about-book.php" method="POST">
                        <input name="book_id" type="hidden" value="<?/*= $value['book_id'] */?>">
                        <input type="submit" class="btn btn-success btn-sm btn-reserve button-books" name="update"
                               value="Update">
                        <input type="submit" class="btn btn-success btn-sm btn-reserve button-books" name="delete"
                               value="Delete">

                    </form>
-->                 <!--<a href="http://google.com" class="button btn btn-success mx">Update</a>-->
               <a href="<?php echo $site_url . '_admin/edit-item.php?edit_id='.$value["book_id"].'&place=1'; ?>" class="button btn btn-success mx">Update</a>
               <a href="<?php echo $site_url . '_admin/delete-item.php?delete_id='.$value["book_id"]; ?>" class="button btn btn-success mx" onclick="return checkDelete()">Delete</a>
               <!--<a href="<?php /*echo $site_url . '_admin/delete-item.php?delete_id='. $data ['book_id']  ; */?>" class="button btn btn-success mx">Delete</a>-->
<!--$site_url . '_admin/delete-item.php?delete_id=' . $data ['book_id'] . '-->
                   <?php endif;   ?>
               <?php else:?>
                   <p> INFO : Only the registration users can  reserve this book</p>
               <?php endif;   ?>
                    <p></p>
                    <p><b> Description:</b></p>
                    <p>
                    <p class="text-justify"> <?php echo substr($value["desription"],0,140);?>
                        <!--<span class="collapse " id="viewdetails3"><?php /*echo $value["desription"] */?></span>-->
                        <span class="collapse " id="viewdetails3"><?php echo plain($value["desription"],140,6000) ?></span>
                        <a class="btn text-primary" data-toggle="collapse" data-target="#viewdetails3">Read more</a>
                    </p>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php endforeach; ?>
    <!--    <hr>

        <p></p>

        <h2> You might also like</h2>
        <p></p>


        <div class="rowe also-like flex-wrap">


            <div class="col-md-3 ">

                <div class="view overlay">
                    <img class="card-img-top" src="https://mrtns.eu/tovar/_l/678/l678795.jpg?v=1573813064" alt="Card image cap">


                </div>


                <button type="button" class="btn  btn-success btn-sm img-borrow "> Borrow</button>


            </div>


            <div class="col-md-3">


                <div class="view overlay">
                    <img class="card-img-top" src="https://mrtns.eu/tovar/_l/678/l678795.jpg?v=1573813064" alt="Card image cap">

                </div>


                <button type="button" class="btn  btn-success btn-sm img-borrow ">Borrow</button>


            </div>


            <div class="col-md-3">


                <div class="view overlay">
                    <img class="card-img-top" src="https://mrtns.eu/tovar/_l/678/l678795.jpg?v=1573813064" alt="Card image cap">
                    <a href="#!">

                    </a>
                </div>


                <button type="button" class="btn  btn-success btn-sm img-borrow ">Borrow</button>


            </div>

            <div class="col-md-3">

                <div class="view overlay">
                    <img class="card-img-top" src="https://mrtns.eu/tovar/_l/678/l678795.jpg?v=1573813064" alt="Card image cap">


                </div>


                <button type="button" class="btn  btn-success btn-sm img-borrow"> Borrow</button>

            </div>
        </div>



        <hr>
        <h2 class="availability"> Availability: </h2>

    -->

    <table class="table table-striped info-panel">

        <thead>

        <tr>

            <th scope="col">Location</th>
            <th scope="col">Overall</th>
            <th scope="col">Borrowed</th>
            <th scope="col">Free</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">Centrálna požičovňa</th>
            <td>2</td>
            <td>1</td>
            <td>0</td>
        </tr>
        <tr>
            <th scope="row">KVP</th>
            <td>2</td>
            <td>1</td>
            <td>0</td>
        </tr>
        <tr>
            <th scope="row">Barca</th>
            <td>2</td>
            <td>1</td>
            <td>0</td>
        </tr>

        <tr>
            <th scope="row">Furča</th>
            <td>2</td>
            <td>1</td>
            <td>0</td>
        </tr>
        </tbody>
    </table>

</div>
<?php include_once "_partials/footer.php" ?>
