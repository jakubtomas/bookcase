<?php
require_once '../_inc/config.php';
require_once '../_inc/function.php';
include_once '../_partials/header.php';

/*poznamka overenie či  na danu stranku ma povelenie ist inak 401  ,, kontrolujes to cez $_SESSION['id']
ako sa roby presmerovanie stranky  pozri video

 */


/*poznamka change the background color from black to white like on the another page*/


if (isset($_GET['edit_id']) && !isset($_GET['backid']) && $_SERVER['REQUEST_METHOD'] == 'GET') {

    echo '<pre>';
    print_r($_GET['edit_id']);
    echo '</pre>';

    echo '<pre>';
    print_r($_SESSION );
    echo '</pre>';

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


    $result = getOneData();

    ?>


    <div class="rows">

    <?php if (count($result)) : foreach ($result as $value) : ?>
        <form id="edit-form" class="col-sm-3 newclass" action="add-item.php" method="post"
              enctype="multipart/form-data">
            <p class="group">

                <?php if (isset($_GET['place'])) : ?>
                    <input type="hidden" name="about-book" value="1">
                <?php endif; ?>

                <label for="isbn">Isbn</label>
                <input required type="text" name="isbn" placeholder="" value="<?= $value ['isbn']; ?>">

                <label for="book_name">Book name</label>
                <input required type="text" name="book_name" placeholder="" value="<?= $value ['book_name']; ?>">

                <label for="book_autor">Autor</label>
                <input required type="text" name="book_autor" placeholder="" value="<?= $value ['book_autor']; ?>">

                <label for="genre">Genre</label>
                <!--<input required type="text" name="genre" placeholder="" value="<?/*= $value ['genre']; */?>">-->
                <input required class="datalist" list="genres" name="genre" placeholder="" value="<?= $value ['book_autor']; ?>">


                <datalist class="" id="genres">
                    <option value="Drama">
                    <option value="Action">
                    <option value="Romantic">
                    <option value="Sci-Fi">
                    <option value="Fairytale">
                </datalist>

                <label for="pages">Pages</label>
                <input required type="number" name="pages" placeholder="" value="<?= $value ['pages']; ?>">

                <label for="year">Year</label>
                <input required type="number" name="year" placeholder="" value="<?= $value ['made_year']; ?>">

                <label for="publisher">Publisher</label>
                <input required type="text" name="publisher" placeholder="" value="<?= $value ['publisher']; ?>">




                <label for="desription">Description</label>
                <textarea  class="form-control textarea" rows="5" id="desription" name="desription"
                          required><?php  echo $value ['desription'];?></textarea>
            </p>

            <p class="form-group">
                <input required name="book_id" type="hidden" value="<?= $_GET['edit_id'] ?>">
                <a href="<?php echo $site_url ?>admin-book.php" class="back-link text-warning ">back</a>

                <input required class="btn-sm btn-danger margin-bottom" type="submit" value="Update "
                       name="update_book">


            </p>
        </form>
        </div>


    <?php endforeach; else: ?>
        <p>prazdna databasa edit-clanok</p>
    <?php endif; ?>


    <?php
} elseif (isset($_GET['edit_id']) && isset($_GET['backid']) && $_SERVER['REQUEST_METHOD'] == 'GET') {


    echo '<pre>';
    print_r($_SESSION );
    echo '</pre>';


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

    ?>
    <div class="rows">

        <form id="edit-form" class="col-sm-3 newclass" action="add-item.php" method="post"
              enctype="multipart/form-data">
            <p class="group">

                <?php if (isset($_SESSION['about-book'] ) && !empty($_SESSION['about-book'] )) : ?>
                    <input type="hidden" name="about-book" value="1">
                <?php endif; ?>

                <label for="isbn">Isbn</label>
                <input required type="text" name="isbn" placeholder="" value="<?= $_SESSION['isbn']; ?>">


                <label for="book_name">Book name</label>
                <input required type="text" name="book_name" placeholder="" value="<?= $_SESSION['book_name']; ?>">


                <label for="book_autor">Book autor</label>
                <input required type="text" name="book_autor" placeholder="" value="<?= $_SESSION['book_autor']; ?>">

                <label for="genre">GENRE</label>
                <!--<input required type="text" name="genre" placeholder="" value="<?/*= $_SESSION['genre']; */?>">-->
                <input required class="datalist" list="genres" name="genre" placeholder="" value="<?= $_SESSION['genre'] ; ?>">


                <datalist class="" id="genres">
                    <option value="Drama">
                    <option value="Action">
                    <option value="Romantic">
                    <option value="Sci-Fi">
                    <option value="Fairytale">
                </datalist>

                <label for="pages">Pages</label>
                <input required type="number" name="pages" placeholder="" value="<?= $_SESSION['pages'] ; ?>">

                <label for="year">Year</label>
                <input required type="number" name="year" placeholder="" value="<?= $_SESSION['year']  ; ?>">

                <label for="publisher">Publisher</label>
                <input required type="text" name="publisher" placeholder="" value="<?= $_SESSION['publisher'] ; ?>">



                <!--<label for="desription">Description</label>-->
                <!--<input required type="text" name="desription" placeholder="" value="<?/*= $_SESSION['desription']; */?>">-->
                <label for="desription">Description</label>
                <textarea  class="form-control textarea" rows="5" id="desription" name="desription"
                           required><?php  echo $_SESSION['desription'];?></textarea>

            </p>

            <p class="form-group">
                <input name="book_id" type="hidden" value="<?php echo $_GET['edit_id']?>">
                <a href="<?php echo $site_url ?>admin-book.php" class="back-link text-warning ">back</a>
            <!--poznamka  potrebne vyriesit  ked sa sem dostaneš z sekcie about boook tak sa
            tam aj vratis pri stlaceny na tlacidlo back a to plati aj na ten formular 2 krat -->
                <input class="btn-sm btn-danger margin-bottom" type="submit" value="Update " name="update_book">
                <!--test komentara-->

            </p>
        </form>
        
        
        <!--zrejem neposiela  book id pri druhom posielani nwm preco mozno pouzi $_POST['] -->
    </div>
    <?php
} else {

    die("404");
}


?>






<?php include_once '../_partials/footer.php' ?>

