<?php
session_start();
require_once "_inc/config.php";
require_once "_inc/function.php";
include_once '_partials/header.php';


if (isset($_SESSION['errorMessage']) && !empty($_SESSION['errorMessage'])) {

    echo '<div class="messageContainer">';
    echo '<div class="alert  alert-success " role="alert">';
    echo $_SESSION['errorMessage'];

    echo '<br>';
    echo '</div>';
    echo '</div>';

    unset($_SESSION['errorMessage']);
}


/// FORMULAR
$value =getReservation();
echo '<pre>';
print_r($value);
echo '</pre>';


?>
<div class="white">
    <h1 class="header">My reservation</h1>

    <?php if (!$value) {
        echo '<h3>Now you dont have reserve any book</h3>';

        die();
    }?>
    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table">
                    <div class="row rowTable header">

                        <div class="cell">
                            Book name
                        </div>
                        <div class="cell">
                            Autor
                        </div>
                        <div class="cell">
                            Status
                        </div>
                        <div class="cell">
                            Posibility
                        </div>

                    </div>

                    <?php
                    foreach ($value as $data) :
                        ?>

                        <div class="row rowTable">

                            <div class="cell" data-title="Name">
                                <?= plain($data["book_name"]) ?>
                            </div>
                            <div class="cell" data-title="Autor">
                                <?= plain($data["book_autor"]) ?>
                            </div>
                            <div class="cell" data-title="Status">
                                <?php
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
                                    if ($data["status"] != 2) {

                                    echo '<a class="link delete-link" href=" ' . $site_url . '_admin/delete-item.php?delete_reservation=' . $data ['id'] . '" 

onclick="return checkDelete()" > delete reserve </a>';
                                    }
                                } ?>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>


</div>



<?php include_once '_partials/footer.php' ?>


<?php


?>
