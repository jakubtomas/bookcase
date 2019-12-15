<?php
session_start();
require_once "_inc/config.php";
require_once "_inc/function.php";
include_once '_partials/header.php';

echo '<pre>';
print_r($_SESSION );
echo '</pre>';

$value = getBooks();



if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])) {

    echo '<div class="messageContainer">';
    echo '<div class="alert  alert-success " role="alert">';
    echo $_SESSION['messages'];

    echo '<br>';
    echo '</div>';
    echo '</div>';

    unset($_SESSION['messages']);
}



if (isset($_GET['reserve-ready']) && !empty($_GET['reserve-ready'])) {


    $query = $conn->prepare("
                UPDATE reserve SET
                    status        = :status
                 WHERE  id = :id
            ");


    $update_post = $query->execute([
        'status' => 1,
        'id'     => $_GET['reserve-ready']

    ]);

    if ($update_post) {
        echo '<div class="messageContainer">';
        echo '<div class="alert  alert-success " role="alert">';
        echo "Status was changed for";

        echo '<br>';
        echo '</div>';
        echo '</div>';
    }


}

/*  get reserve reading */

if (isset($_GET['reserve-reading']) && !empty($_GET['reserve-reading'])) {

    $query = $conn->prepare("
                UPDATE reserve SET
                    status        = :status
                 WHERE  id = :id
            ");


    $update_post = $query->execute([
        'status' => 2,
        'id'     => $_GET['reserve-reading']

    ]);

    if ($update_post) {
        echo '<div class="messageContainer">';
        echo '<div class="alert  alert-success " role="alert">';

        echo "Status was changed, user is already reading";


        echo '<br>';
        echo '</div>';
        echo '</div>';
    }
}


if (empty($_SESSION['id']) || ($_SESSION['id']) != 1) {

    //  poznamka presmerovat na 401 alebo 404 alebo na hlavnu stranku
    $_SESSION['messages'] = "You dont have permission";
    exit("You dont have permission");


}
/// FORMULAR

?>
<div class="white">
    <h1 class="header">Admin section</h1>

    <div class="navigation-menu">


        <ul class="navigation">
            <li class="padding">
                <a class="nav-link btn-success but" href="<?php echo $site_url ?>admin-book.php?addbook=1">Add book</a>
            </li>
            <li class="padding">
                <a class="nav-link btn-warning but" href="<?php echo $site_url ?>admin-book.php?update-delete=1">Update/Delete
                    Book</a>
            </li>
            <li class="padding">
                <a class="nav-link btn-info but" href="<?php echo $site_url ?>admin-book.php?reserve=1"> Reservation</a>
            </li>
        </ul>


    </div>


    <?php if (isset($_SESSION['errorMessage']) && !empty($_SESSION['errorMessage'])) {

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
    } ?>


    <!--SECTION ADD BOOK =======================================================================================-->
    <!--SECTION ADD BOOK =======================================================================================-->
    <!--SECTION ADD BOOK =======================================================================================-->

    <?php if (isset($_GET['addbook']) == 1) { ?>


        <h2>Add book</h2>

        <p>
            Instruction : ISBN have to be only number without other symbols and has to consist of 10 or 13 numbers </p>
        <?php

        if (isset($_SESSION['start']) || isset($_SESSION['isbn']) || isset($_SESSION['book_name']) || isset($_SESSION['book_autor']) || isset($_SESSION['desription'])) {
            echo '<div class="fm">';
            echo '<form id="add-book" class="col-sm-3 newclass margin-bottom" action="_admin/add-item.php" method="post" enctype="multipart/form-data">';
            echo '<p class="group">';


            if (!empty($_SESSION['isbn'])) {
                echo '<label for="isbn">Isbn</label>';
                echo ' <input required type="number" name="isbn" placeholder="" value="' . $_SESSION['isbn'] . '">';

            } else {
                echo '<label for="isbn">Isbn</label>';
                echo ' <input required class = "bc-danger" type="number" name="isbn" placeholder="Isbn" value="">';

            }

            if (!empty($_SESSION['book_name'])) {
                echo '<label for="book_name">Book name</label>';
                echo ' <input required type="text" name="book_name" placeholder=""  value="' . $_SESSION['book_name'] . '">';
            } else {
                echo '<label for="book_name">Book name</label>';
                echo ' <input required class = "bc-danger" type="text" name="book_name" placeholder="">';

            }


            if (!empty($_SESSION['book_autor'])) {
                echo '<label for="book_autor">Book autor</label>';
                echo ' <input required type="text" name="book_autor"   value="' . $_SESSION['book_autor'] . '">';
            } else {
                echo '<label for="book_autor">Book autor</label>';
                echo ' <input required class = "bc-danger" type="text" name="book_autor" placeholder="">';

            }

            // poznamka mozno pridat datalist
            if (!empty($_SESSION['genre'])) {
                echo '<label for="genre">Genre</label>';
                echo ' <input required type="text" name="genre"  placeholder="" value="' . $_SESSION['genre'] . '">';
            } else {
                echo '<label for="genre">Genre</label>';
                echo ' <input required class = "bc-danger" type="text" name="genre" placeholder="">';

            }

            if (!empty($_SESSION['pages'])) {
                echo '<label for="pages">Pages</label>';
                echo ' <input required type="number" name="pages" placeholder="" value="' . $_SESSION['pages'] . '">';

            } else {
                echo '<label for="pages">Pages</label>';
                echo ' <input required class = "bc-danger" type="number" name="pages" placeholder="" value="">';

            }

            if (!empty($_SESSION['year'])) {
                echo '<label for="year">Years</label>';
                echo ' <input required type="number" name="year" placeholder="" value="' . $_SESSION['year'] . '">';

            } else {
                echo '<label for="year">Years</label>';
                echo ' <input required class = "bc-danger" type="number" name="year" placeholder="" value="">';

            }

            if (!empty($_SESSION['publisher'])) {
                echo '<label for="publisher">Publisher</label>';
                echo ' <input required type="text" name="publisher" placeholder="" value="' . $_SESSION['publisher'] . '">';
                echo '<br>';
                echo '<label class="control-label">Book Img.</label>';
                echo '<input   class="input-group" type="file" name="user_image" accept="image/*"/>';
            } else {
                echo '<label for="publisher">Publisher</label>';
                echo ' <input required class = "bc-danger" type="text" name="publisher" placeholder="" value="">';
                echo '<br>';
                echo '<label class="control-label">Book Img.</label>';
                echo '<input   class="input-group" type="file" name="user_image" accept="image/*"/>';
            }

            if (!empty($_SESSION['desription'])) {
                /*<label class="control-label">Book Img.</label>
                            <input   class="input-group" type="file" name="user_image" accept="image/*"/>*/
                echo '<br>';
                echo '<label for="desription">Description</label>';
                /*echo ' <input required type="text" name="desription"   value="' . $_SESSION['desription'] . '">';*/
                echo '<textarea class="form-control textarea" rows="5" id="desription" name="desription" 
                                      required > ' . $_SESSION['desription'] . '</textarea>';
            } else {
                echo '<br>';
                echo '<label for="desription">Description</label>';
                /*echo ' <input required  class = "bc-danger" type="text" name="desription" placeholder="">';*/
                echo '<textarea class="form-control textarea bc-danger" rows="5" id="desription" name="desription"
                                      required></textarea>';
            }
            echo '</p>';

            echo '<p class="form-group">';
            echo '<input required class="btn-sm btn-danger" type="submit" value="Add book" name="add-book">';
            echo '</p>';

            echo '</form>';
            echo '</div>';
            echo '</div>';

            unset($_SESSION['isbn'], $_SESSION['book_autor'], $_SESSION['book_name'], $_SESSION['genre'],
                $_SESSION['desription'], $_SESSION['publisher'], $_SESSION['year'], $_SESSION['pages']);
        } else {

            ?>


            <div class="rows ">
                <div class="fm">
                    <form id="add-book" class="col-sm-3 newclass" action="_admin/add-item.php" method="post"
                          enctype="multipart/form-data">


                        <p class="group">

                            <label for="isbn">Isbn</label>
                            <input required type="number" name="isbn" placeholder="" maxlength="13">

                            <label for="book_name">Book name</label>
                            <input required type="text" name="book_name" placeholder="">

                            <label for="book_autor">Book autor</label>
                            <input required type="text" name="book_autor" placeholder="">


                            <label for="genre">Genre</label>
                            <!--treba to este upravit aby nazov genre bol nad poľom-->

                            <input required class="datalist" list="genres" name="genre" placeholder=" Click to choose">


                            <datalist class="" id="genres">
                                <option value="Drama">
                                <option value="Action">
                                <option value="Romantic">
                                <option value="Sci-Fi">
                                <option value="Fairytale">
                            </datalist>


                            <label for="pages">Pages</label>
                            <input required type="number" name="pages" placeholder="">

                            <label for="year">Year</label>
                            <input required type="number" name="year" placeholder="">

                            <label for="publisher">Publisher</label>
                            <input required type="text" name="publisher" placeholder="">

                            <br>

                            <label class="control-label">Book Img.</label>
                            <input   class="input-group" type="file" name="user_image" accept="image/*"/>
                            <br>
                            <label for="desription">Description</label>
                            <!--<input required type="text" name="desription" placeholder="">-->
                            <textarea class="form-control textarea" rows="5" id="desription" name="desription"
                                      required></textarea>
                        </p>

                        <p class="form-group">
                            <input required class="btn-sm btn-danger" type="submit" value="Add book" name="add-book">
                        </p>
                    </form>
                </div>
            </div>
        <?php } ?>

    <?php } ?>
    <!--==================================================================================================================-->

    <!--SECTION UPDATE BOOK===============================================-->
    <!--SECTION UPDATE BOOK===============================================-->
    <!--SECTION UPDATE BOOK===============================================-->
    <?php if (isset($_GET['update-delete']) == 1) : ?>


        <h2>Edit and delete books</h2>
        <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table">
                        <div class="row  rowTable header">
                            <div class="cell">
                                id
                            </div>

                            <div class="cell">
                                isbn
                            </div>
                            <div class="cell">
                                Title
                            </div>
                            <div class="cell">
                                Autor
                            </div>
                            <div class="cell">
                                Genre
                            </div>
                            <div class="cell">
                                Possibility
                            </div>
                        </div>


                        <?php
                        foreach ($value as $data) :
                            ?>
                            <div class="row rowTable ">
                                <div class="cell" data-title="Title">
                                    <?= plain($data["book_id"]) ?>
                                </div>
                                <div class="cell" data-title="Title">
                                    <?= plain($data["isbn"]) ?>
                                </div>
                                <div class="cell" data-title="Title">
                                    <?= plain($data["book_name"]) ?>
                                </div>
                                <div class="cell" data-title="Autor">
                                    <?= plain($data["book_autor"]) ?>

                                </div>
                                <div class="cell" data-title="Genre">
                                    <?= plain($data["genre"]) ?>
                                </div>
                                <div class="cell" data-title="Availability">
                                    <?php
                                    if ($value) {

                                        echo '<a class="link edit-link" href=" ' . $site_url . '_admin/edit-item.php?edit_id=' . $data ['book_id'] . '" class="edit-link text-muted glyphicon glyphicon-remove">edit</a>';

                                        echo '<a class="link2 delete-link" href=" ' . $site_url . '_admin/delete-item.php?delete_id=' . $data ['book_id'] . '" 
class="delete-link text-muted glyphicon glyphicon-remove"
onclick="return checkDelete()" > delete</a>';
                                    } ?>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>


    <!--   SECTION ABOUT RESERVATION BOOK ===========================================================-->
    <!--   SECTION ABOUT RESERVATION BOOK ===========================================================-->
    <!--   SECTION ABOUT RESERVATION BOOK ===========================================================-->


    <?php if (isset($_GET['reserve'])) : ?>

    <?php $reserve = getAllReservation();
    echo '<pre>';
    print_r($reserve);
    echo '</pre>'; ?>

    <h2>Reservation books</h2>
    <div class="limiter">


        <?php if (empty($reserve)) {
            echo '<h3>They are no reseravtions in this library</h3>'; }?>



        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table">
                    <div class="row  rowTable  header">

                        <div class="cell">
                            Email
                        </div>
                        <div class="cell">
                            Book name
                        </div>
                        <div class="cell">
                            Status
                        </div>

                        <div class="cell">
                            Change status
                        </div>
                        <div class="cell">
                            Posibility
                        </div>

                    </div>

                    <?php
                    foreach ($reserve as $data) :
                        ?>

                        <div class="row rowTable ">

                            <div class="cell" data-title="Name">
                                <?= plain($data["email"]) ?>
                            </div>
                            <div class="cell" data-title="Autor">
                                <?= plain($data["book_name"]) ?>
                            </div>
                            <div class="cell" data-title="Status">
                                <?php
                                echo '<pre>';
                                print_r($data["status"]);
                                echo '</pre>';

                                if ($data["status"] == 1) {
                                    echo 'READY ';
                                } elseif ($data["status"] == 2) {
                                    echo 'READING';
                                } else {
                                    echo 'Unprepared';
                                }
                                ?>
                            </div>

                            <div class="cell" data-title="Posibility">
                                <?php
                                if ($value) {

                                    echo '<a class="link btn-success" href=" ' . $site_url . 'admin-book.php?reserve=1&reserve-ready=' . $data ['idReservation'] . '" 
>Book is ready </a>';
                                    echo '<br>';
                                    /*tusom*/

                                    echo '<a class="link delete-link" href=" ' . $site_url . 'admin-book.php?reserve=1&reserve-reading=' . $data ['idReservation'] . '" 
 > User is reading </a>';                                                                           /*pridam adresu  a budem vediet ze header admin reservation*/

                                }
                                ?>
                            </div>

                            <div class="cell" data-title="Posibility">
                                <?php
                                if ($value) {

                                    echo '<a class="link delete-link" href=" ' . $site_url . '_admin/delete-item.php?delete_reservation=' . $data ['id'] . '&adminreservation=1" 
class="delete-link text-muted glyphicon glyphicon-remove"
onclick="return checkDelete()" > delete reservation </a>';


                                }
                                ?>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>


</div>
<?php endif; ?>


<?php include_once '_partials/footer.php' ?>


