<?php
session_start();
require_once "_inc/config.php";
require_once "_inc/function.php";
include_once '_partials/header.php';


?>




<div class="white">
    <div class="search">


       <!-- <form action="search-book.php" method="POST" class="form-inline">
            <label for="search" class="mr-sm-2">Search books </label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="search" name="search">

            <input class="btn-sm btn-primary margin-bottom" type="submit" value="Send" name="searchbook">
        </form>-->

        <form action="search-book.php" method="POST" class="form-inline">
            <div class="form-group mx-sm-3 ">

            <label for="search" class="mr-sm-2 ">Search books </label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="search" name="search">

            </div>
            <input class="btn-sm btn-primary " type="submit" value="Search" name="searchbook">
        </form>

       <!-- <form class="form-inline">

            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only">Password</label>
                <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
        </form>-->

    </div>

    <?php if (isset($_POST["searchbook"]) && $_SERVER['REQUEST_METHOD'] === 'POST') {


        $books = getSearchBook();

        if (empty($books)) {
            echo '<div class="alert  alert-danger " role="alert">';
            echo 'We dont have this book ';
            echo '</div>';

            include_once '_partials/footer.php';
            die();

        } else {
            echo '<div class="alert  alert-success " role="alert">';
            echo 'Success we have something ';
            echo '</div>';
        }

        ?>

        <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table">
                        <div class="row header">
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
                                Availability
                            </div>
                        </div>


                        <?php
                        foreach ($books as $data) :
                            ?>
                            <div class="row">
                                <div class="cell" data-title="Title">

                                    <a href="<?php echo $site_url ?>about-book.php?edit_id=<?php echo $data["book_id"]; ?>"
                                       class="back-link text-warning "><?php echo plain($data["book_name"]); ?></a>

                                </div>
                                <div class="cell" data-title="Autor">
                                    <?= plain($data["book_autor"]) ?>

                                </div>
                                <div class="cell" data-title="Genre">
                                    <?= plain($data["genre"]) ?>
                                </div>
                                <div class="cell" data-title="Availability">
                                    Yes
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>


    <?php } ?>
</div>


<?php include_once '_partials/footer.php' ?>
