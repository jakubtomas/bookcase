<?php
session_start();
require_once "_inc/config.php";
require_once "_inc/function.php";
include_once '_partials/header.php';

$data = getEvents();

echo '<pre>';
print_r($data);
echo '</pre>';


?>


    <div class="white">

        <div class="container">
            <h1 class="contactheader">Add oznam</h1>

            <form class="contact " action="_admin/add-item.php" method="post"
                  enctype="multipart/form-data" >
                <div class="form-group mt" data-validate="Name is required">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date">
                </div>

                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control textarea" rows="5" id="message"></textarea>
                </div>


                <p class="form-group">
                    <input class="btn-sm btn-danger" type="submit" value="Add book" name="add-event">
                </p>
            </form>
        </div>

    </div>



    <div class="rows ">

        <form id="add-book" class="col-sm-3 newclass" action="_admin/add-item.php" method="post"
              enctype="multipart/form-data">


            <p class="group">

                <label for="isbn">Isbn</label>
                <input type="text" name="isbn" placeholder="">

                <label for="book_name">Book name</label>
                <input type="text" name="book_name" placeholder="">

                <label for="book_autor">Book autor</label>
                <input type="text" name="book_autor" placeholder="">

                <label for="genre">Genre</label>
                <input type="text" name="genre" placeholder="">

                <label for="desription">Description</label>
                <input type="text" name="desription" placeholder="">
            </p>

            <p class="form-group">
                <input class="btn-sm btn-danger" type="submit" value="Add book" name="add-event">
            </p>
        </form>

    </div>


<?php include_once '_partials/footer.php' ?>