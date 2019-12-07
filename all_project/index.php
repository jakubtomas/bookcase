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
            <form id="edit-form" class="" action="<?= $site_url ?>search-book.php" method="post" enctype="multipart/form-data" name="search">
                <input type="search" placeholder="What're you searching for?" aria-describedby="button-addon1"
                       class="form-control border-0 bg-light" name = "searchbook">
            </form>

        </div>

    </div>


    <div class="card-deck">
        <div class="card ">
            <img class="card-img-top"
                 src="https://spectator.imgix.net/content/uploads/2019/09/Anthony-Quinn.jpg?auto=compress,enhance,format&crop=faces,entropy,edges&fit=crop&w=820&h=550"
                 alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Event name </h5>
                <p class="card-text">Description</p>
                <p class="card-text">
                    <small class="text-muted"> 12 November 2019</small>
                </p>
                <a
                        class="button text-primary is-outlined is-rounded primary-bg-hover primary-text primary-border text-light-hover "
                        href="">
                    Learn More...

                </a>
            </div>
        </div>
        <div class="card ">
            <img class="card-img-top"
                 src="https://spectator.imgix.net/content/uploads/2019/09/Anthony-Quinn.jpg?auto=compress,enhance,format&crop=faces,entropy,edges&fit=crop&w=820&h=550"
                 alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Event name </h5>
                <p class="card-text">Description</p>
                <p class="card-text">
                    <small class="text-muted"> 12 November 2019</small>
                </p>
                <a
                        class="button text-primary is-outlined is-rounded primary-bg-hover primary-text primary-border text-light-hover "
                        href="">
                    Learn More...

                </a>
            </div>
        </div>
        <div class="card ">
            <img class="card-img-top"
                 src="https://spectator.imgix.net/content/uploads/2019/09/Anthony-Quinn.jpg?auto=compress,enhance,format&crop=faces,entropy,edges&fit=crop&w=820&h=550"
                 alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Event name </h5>
                <p class="card-text">Description</p>
                <p class="card-text">
                    <small class="text-muted"> 12 November 2019</small>
                </p>
                <a
                        class="button text-primary is-outlined is-rounded primary-bg-hover primary-text primary-border text-light-hover "
                        href="">
                    Learn More...

                </a>
            </div>
        </div>
    </div>

    <hr>

<?php include_once '_partials/footer.php'; ?>