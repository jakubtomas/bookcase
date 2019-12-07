<?php
session_start();
require_once '_inc/config.php';
require_once '_inc/function.php';
include_once '_partials/header.php';


// poznamka na tuto stranku sa dostanem pomocou $_GET['id']
/*Kde vytiahne mdata z databazi na zaklade id

*/
if (isset($_GET['edit_id'])  && $_SERVER['REQUEST_METHOD'] === 'GET') {
    echo 'som tu ';

    $book = getOneData();
    echo '<pre>';
    print_r($book);
    echo '</pre>';


}
    // poznamka  you have to create page where will be information abou one book
    // page consist of   maybe picture  and other information book_name , book_autor etc
    // add posibilities to choose registration this book ,, like we have this book in this library
    // or how many day has someone this book ,,  for make reseravtion books you have to create new table in database

    //  next step admin  have to check list of reservation and prepare books for that ,users
    // take this book  and users have to only 5 day for take this orders after this is delete this orders
    // create new page where will be  list of reservation
foreach ($book as $data) :

?>

    <div class="container bg-white border rounded shadow p-3 mb-5 ">
        <div class="row mb-2 ">
            <div class="col-md-6">
                <div class="row no-gutters  overflow-hidden flex-md-row mb-4  position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <img class="img-book"
                             src="https://mrtns.eu/tovar/_l/655/l655839.jpg?v=1574150481" alt="book">


                    </div>


                </div>
            </div>


            <div class="col-md-6">
                <div class="row no-gutters  overflow-hidden flex-md-row mb-4   position-relative">
                    <div class="col p-4 d-flex flex-column position-static">

                        <h2> Nevieš dňa, nevieš hodiny </h2>
                        <p> Dominik Dán</p>

                        <p class="mb-auto"><b>Vydavateľ:</b> Citadella</p>
                        <p class="mb-auto"><b>ISBN:</b> 9788089628193</p>
                        <p class="mb-auto"><b>Poč.strán:</b> 85</p>
                        <p class="mb-auto"><b>Rok vydania:</b> 2013</p>
                        <p></p>
                        <button type="button" class="btn btn-success btn-sm btn-reserve">Borrow</button>
                        <p></p>
                        <p><b> Description:</b></p>
                        <p class="text-justify">V Biblii nájdeme poučný odkaz, že človek ani netuší, kedy
                            sa priblíži jeho koniec. Ak je však niekto nepoučiteľný a postaví
                            sa osudu, sú z toho len problémy. Detektív Richard Krauz je tu na to,
                            aby osudové problémy riešil. Tak to bolo aj v pamätný deň na prelome
                            tisícročí – na Silvestra 1999.
                            <span class="collapse " id="viewdetails3"> Dve hodiny pred polnocou ho zavolali na cintorín
            k náhrobnému kameňu postriekanému krvou. Krv nebola jediná zvláštnosť na hrobe, záhadnejší
            bol čerstvo vytesaný dátum úmrtia – zajtrajší deň, prvý deň nového milénia. Na prvý pohľad
            hlúpy žart, no detektíva Krauza prejde smiech v momente, keď mu z operačného strediska zahlásia,
            že majiteľ hrobu prvú hodinu po polnoci naozaj zomrel. Osud sa s ním kruto zahral, nech plánoval
            voju smrť akokoľvek precízne, niekto ho predbehol. Muža strelili do chrbta spôsobom vylučujúcim
            samovraždu.
          </span>
                        <p>
                            <a class="btn text-primary" data-toggle="collapse" data-target="#viewdetails3">Read more</a>
                        </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <p></p>

        <h2> You might also like</h2>
        <p></p>


        <div class="row also-like flex-wrap">


            <div class="col-md-3 ">

                <div class="view overlay">
                    <img class="card-img-top" src="https://mrtns.eu/tovar/_l/678/l678795.jpg?v=1573813064" alt="Card image cap">


                </div>


                <button type="button" class="btn  btn-success btn-sm img-borrow "> Borrow</button>


            </div>


            <div class="col-md-3">


                <div class="view overlay">
                    <img class="card-img-top" src="https://mrtns.eu/tovar/_l/678/l678795.jpg?v=1573813064" alt="Card image cap">

                </div>


                <button type="button" class="btn  btn-success btn-sm img-borrow ">Borrow</button>


            </div>


            <div class="col-md-3">


                <div class="view overlay">
                    <img class="card-img-top" src="https://mrtns.eu/tovar/_l/678/l678795.jpg?v=1573813064" alt="Card image cap">
                    <a href="#!">

                    </a>
                </div>


                <button type="button" class="btn  btn-success btn-sm img-borrow ">Borrow</button>


            </div>

            <div class="col-md-3">

                <div class="view overlay">
                    <img class="card-img-top" src="https://mrtns.eu/tovar/_l/678/l678795.jpg?v=1573813064" alt="Card image cap">


                </div>


                <button type="button" class="btn  btn-success btn-sm img-borrow"> Borrow</button>

            </div>
        </div>



        <hr>
        <h2 class="availability"> Availability: </h2>


        <table class="table table-striped info-panel">

            <thead>

            <tr>

                <th scope="col">Location</th>
                <th scope="col">Overall</th>
                <th scope="col">Borrowed</th>
                <th scope="col">Free</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">Centrálna požičovňa</th>
                <td>2</td>
                <td>1</td>
                <td>0</td>
            </tr>
            <tr>
                <th scope="row">KVP</th>
                <td>2</td>
                <td>1</td>
                <td>0</td>
            </tr>
            <tr>
                <th scope="row">Barca</th>
                <td>2</td>
                <td>1</td>
                <td>0</td>
            </tr>

            <tr>
                <th scope="row">Furča</th>
                <td>2</td>
                <td>1</td>
                <td>0</td>
            </tr>
            </tbody>
        </table>

    </div>
<?php endforeach; ?>




<?php include_once "_partials/footer.php" ?>
