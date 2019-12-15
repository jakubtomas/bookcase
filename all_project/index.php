<?php
session_start();
require_once '_inc/config.php';
require_once '_inc/function.php';
include_once '_partials/header.php';


if (isset($_POST['searchBook']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'ejha';




    $value = getSearchBook();


}



if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])) {

    echo '<div class="messageContainer">';
    echo '<div class="alert  alert-success " role="alert">';
    echo $_SESSION['messages'];

    echo '<br>';
    echo '</div>';
    echo '</div>';

    unset($_SESSION['messages']);
}


?>


    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 font-weight-bold text-white">Welcome to our Library</h1>
            <form id="edit-form" class="" action="<?= $site_url ?>search-book.php" method="GET" enctype="multipart/form-data" name="search">
                <input type="search" placeholder="What're you searching for?" aria-describedby="button-addon1"
                       class="form-control border-0 bg-light" name = "searchbook">
            </form>

        </div>

    </div>






<?php include_once '_partials/footer.php'; ?>