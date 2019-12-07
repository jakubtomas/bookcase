<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <title>Title</title>
</head>
<body class=" ">-->
<!-- bg-secondary
<nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
  <a class="py-2" href="#">
    <img
      src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-JulUCb7w_GPOzi9Vc08MfHapHX6-xi7v5mTN6A0w4tq70-sn&amp;s"
      class=" rounded-corners img-fluid " alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav ml-auto ">
      <li class="nav-item active">
        <a class="nav-link waves-effect waves-light " href="#">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="#">Contact</a>
      </li>

      <li class="nav-item">
        <a class="nav-link waves-effect waves-light " href="#">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light" href="#">Register</a>
      </li>

    </ul>
    <form class="form-inline">
      <div class="md-form my-0">

      </div>
    </form>
  </div>
</nav>-->

<?php
session_start();
require_once '_inc/config.php';
require_once '_inc/function.php';
include_once '_partials/header.php';


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



<?php include_once "_partials/footer.php" ?>

