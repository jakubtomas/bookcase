<?php
session_start();
require_once "_inc/config.php";
require_once "_inc/function.php";
include_once '_partials/header.php';


$reserve = 3;


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

    $book = getOneData();
//    echo $book[0]['book_id'];


    $status = getBookReservation();


    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $reserve = getRecordReserve($book[0]['book_id']);
     //   echo $reserve;

    }


} elseif ($_POST) {
    if (isset($_POST['reserve'])) {


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

            $message = "Reservation  was successfuly ";

        }

        if (isset($message)) {
            echo '<div class="alert alert-success">';
            echo '<strong>Success!</strong> You can change the reservation on your profile page';
            echo '</div>';

            $book = getOneBook($book_id);

        }


    }

} else die("404");


?>




<?php foreach ($book as $value) : ?>
<div class="container bg-white border rounded shadow p-3 mb-5 ">
    <div class="rowe mb-2 ">
        <div class="col-md-6">
            <div class="rowe no-gutters  overflow-hidden flex-md-row mb-4  position-relative">
                <div class="col p-4 d-flex flex-column position-static">

                    <img class="img-book"
                         src="<?php echo $site_url . 'user_images/' . $value["bookPic"] ?>" alt="book">


                </div>


            </div>
        </div>


        <div class="col-md-6">
            <div class="rowe no-gutters  overflow-hidden flex-md-row mb-4   position-relative">
                <div class="col p-4 d-flex flex-column position-static left">


                    <h2><?php echo $value["book_name"] ?></h2>
                    <p class="mb-auto"><b>Autor :</b><?php echo $value["book_autor"] ?></p>

                    <p class="mb-auto"><b>Publisher:</b> <?php echo $value["publisher"] ?></p>
                    <p class="mb-auto"><b>ISBN:</b> <?php echo $value["isbn"] ?></p>
                    <p class="mb-auto"><b>Pages</b> <?php echo $value["pages"] ?></p>
                    <p class="mb-auto"><b>Year</b> <?php echo $value["made_year"] ?></p>
                    <p>
                    </p>

                    <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])) : ?>
                        <?php if ($reserve == 1) : ?>
                            <p class="mb-auto">INFO : This book was already reserved</p>
                            <br>
                        <?php endif; ?>

                        <form name="myLetters" action="about-book.php" method="POST">
                            <input name="book_id" type="hidden" value="<?= $value['book_id'] ?>">

                            <?php if ($reserve == 0) : ?>


                                <?php if (empty($status)) : ?>
                                    <input type="submit" class="btn-warning btn-sm btn-reserve button-books"
                                           name="reserve"
                                           value="Reserve">

                                <?php endif; ?>

                            <?php endif; ?>
<!--                            <input type="submit" class="btn-warning btn-sm btn-reserve button-books" name="favorite"
                                   value="Add Favorite">
-->
                        </form>
                        <br>
                        <!--Only the admin section -->
                        <?php if ($_SESSION['id'] == 1): ?>
                            <a href="<?php echo $site_url . '_admin/edit-item.php?edit_id=' . $value["book_id"] . '&place=1'; ?>"
                               class="button btn btn-primary mx">Update</a>

                            <br>
                            <a href="<?php echo $site_url . '_admin/delete-item.php?delete_id=' . $value["book_id"]; ?>"
                               class="button btn btn-danger mx" onclick="return checkDelete()">Delete</a>


                        <?php endif; ?>
                    <?php else: ?>
                        <p> INFO : Only the registered users can reserve this book</p>
                    <?php endif; ?>
                    <p></p>
                    <p><b> Description:</b></p>
                    <p>
                    <p class="text-justify"> <?php echo $value["desription"]; ?>
                        <!--<span class="collapse " id="viewdetails3"><?php /*echo $value["desription"] */ ?></span>-->
                      <!--  <span class="collapse "
                              id="viewdetails3"><?php /*echo plain($value["desription"], 140, 6000) */?></span>
                        <a class="btn text-primary" data-toggle="collapse" data-target="#viewdetails3">Read more</a>-->
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php endforeach; ?>


</div>
<?php include_once "_partials/footer.php" ?>
