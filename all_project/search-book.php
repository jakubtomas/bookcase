<?php
session_start();
require_once "_inc/config.php";
require_once "_inc/function.php";
include_once '_partials/header.php';

?>


<div class="white min-vh-100">
    <div class="">


        <div class="px-2">
            <form action="search-book.php" method="GET" class="justify-content-center">


                <div class="form-group">
                    <label class="sr-only">Textl</label>
                    <input type="text" class="form-control" placeholder="search" id="search" name="search">
                </div>
                <button type="submit" class="btn btn-primary " name="searchbook">Search</button>
            </form>
        </div>

    </div>

    <?php if (isset($_GET["searchbook"]) && $_SERVER['REQUEST_METHOD'] === 'GET') {


        if (isset($_GET["page"]) && !empty($_GET['page'])) {
            $page = $_GET["page"];
        } else {
            $page = 1;
        }


        $record_per_page = 5; // number of record for page
        $start_from = ($page - 1) * $record_per_page;/*$books = getSearchBookwithPagination($start_from, $record_per_page)*/;
        $books = getSearchBook($start_from, $record_per_page);
        $count = getCountSearchBooks();
        $count = $count[0];


        if (empty($books)) {
            echo '<div class="alert  alert-danger mb600" role="alert">';
            echo 'We dont have this book ';
            echo '</div>';

            include_once '_partials/footer.php';
            die();

        } else {
            echo '<div class="alert  alert-success " role="alert">';
            echo 'Successfully found ';
            echo '</div>';
        }

        ?>


        <div class="container bg-grey p-3 mb-5 mw">

            <?php foreach ($books as $data) : ?>
                <table class=" table table-striped table-dark margin-bottom">

                    <tbody>

                    <tr>
                        <th scope="row">Title</th>
                        <!--<td><?php /*echo plain($data["book_name"])*/ ?></td>-->
                        <td>
                            <a href="<?php echo $site_url ?>about-book.php?edit_id=<?php echo $data["book_id"]; ?>"
                               class="back-link text-warning "><?php echo plain($data["book_name"]); ?></a>
                        </td>


                    </tr>
                    <tr>
                        <th scope="row">Autor</th>
                        <td><?php echo plain($data["book_autor"]) ?></td>
                    </tr>
                    <tr>
                        <th scope="row">ISBN</th>
                        <td><?php echo plain($data["isbn"]) ?></td>
                    </tr>
                    </tbody>
                </table>
                <hr>
            <?php endforeach; ?>
        </div>


        <?php
        $countBooks = getCountSearchBooks();

        $total_pages = ceil($countBooks[0] / $record_per_page);

        echo "page " . $page;
        echo '<br>';
        echo '<br>';

        for ($i = 1; $i <= $total_pages; $i++) {


            if (!empty($_GET['search'])) {
                echo '<a class="link edit-link" href=" ' . $site_url . 'search-book.php?&searchbook=&search=' . $_GET["search"] . '&page=' . $i . '" class="edit-link "> ' . $i . ' </a>';

            } else {
                echo '<a class="link edit-link" href=" ' . $site_url . 'search-book.php?&searchbook=&search=' . $_GET["searchbook"] . '&page=' . $i . '" class="edit-link "> ' . $i . ' </a>';
            }
        }

        echo '<br>'; ?>

        <?php echo '<br>';
    } ?>
</div>


<?php include_once '_partials/footer.php' ?>
