<?php
session_start();
require_once "_inc/config.php";
require_once "_inc/function.php";
include_once '_partials/header.php';


?>


<div class="white min-vh-100">
    <div class="">

<!--

        <form action="search-book.php" method="POST" class="form-inline">
            <div class="form-group mx-sm-3 ">

            <label for="search" class="mr-sm-2 ">Search books </label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="search" name="search">

            </div>
            <input class="btn-sm btn-primary " type="submit" value="Search" name="searchbook">
        </form>

-->


  <!--      <form action="search-book.php" method="GET" class="form-inline justify-content-center">
            <div class="form-group mx-sm-3 ">

                <label for="search" class="mr-sm-2 ">Search books </label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="search" name="search">

            </div>
            <button type="submit" class="btn btn-primary btn-lg"  value="Search " name="searbook">Search</button>
        </form>
-->
            <!--<input class="btn-sm btn-primary " type="submit" value="Search" name="searchbook">-->

        <div class="px-2">
            <form action="search-book.php" method="GET" class="justify-content-center">


                <div class="form-group">
                    <label class="sr-only">Textl</label>
                    <input type="text" class="form-control" placeholder="search" id="search" name="search">
                </div>
                <button type="submit" class="btn btn-primary " name="searchbook" >Search</button>
            </form>
        </div>

    </div>

    <?php if (isset($_GET["searchbook"]) && $_SERVER['REQUEST_METHOD'] === 'GET') {

        echo '<pre>';
        print_r($_GET );
        echo '</pre>';


        echo 'say hellou  please call oparator, that i need instruction';

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

       <!-- <div class="limiter">
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
/*                        foreach ($books as $data) :
                            */?>
                            <div class="row">
                                <div class="cell" data-title="Title">

                                    <a href="<?php /*echo $site_url */?>about-book.php?edit_id=<?php /*echo $data["book_id"]; */?>"
                                       class="back-link text-warning "><?php /*echo plain($data["book_name"]); */?></a>

                                </div>
                                <div class="cell" data-title="Autor">
                                    <?/*= plain($data["book_autor"]) */?>

                                </div>
                                <div class="cell" data-title="Genre">
                                    <?/*= plain($data["genre"]) */?>
                                </div>
                                <div class="cell" data-title="Availability">
                                    Yes
                                </div>
                            </div>

                        <?php /*endforeach; */?>
                    </div>
                </div>
            </div>
        </div>-->



        <div class="container bg-grey p-3 mb-5 mw">

            <?php foreach ($books as $data) :?>
            <table class=" table table-striped table-dark margin-bottom">

                <tbody>

                <tr >
                    <th scope="row">Title</th>
                    <!--<td><?php /*echo plain($data["book_name"])*/?></td>-->
                 <td>
                    <a href="<?php echo $site_url ?>about-book.php?edit_id=<?php echo $data["book_id"]; ?>"
                       class="back-link text-warning "><?php echo plain($data["book_name"]); ?></a>
                 </td>


                </tr>
                <tr>
                    <th scope="row">Autor</th>
                    <td><?php echo plain($data["book_autor"])?></td>
                </tr>
                <tr>
                    <th scope="row">ISBN</th>
                    <td><?php echo plain($data["genre"])?></td>
                </tr>
                </tbody>
            </table>
                <hr>
            <?php endforeach;?>
        </div>


    <?php } ?>
</div>


<?php include_once '_partials/footer.php' ?>
