<?php
$page_name = basename($_SERVER["SCRIPT_NAME"], ".php");

if ($page_name == "index") $page_name = "home";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ucfirst($page_name); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<style>


    .bg {
        background-image: url("https://wallpaperaccess.com/full/253371.jpg");
        width: 100%;
        margin: 0 0 1em auto !important;
        height: 750px;
        position: relative;
        display: flex;
        display: -ms-flexbox;
        align-items: center;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;

    }

    .left {
        text-align: left;
    }

    .button {
        padding: 0 !important;
    }

    a {
        color: white;
    }

    a:hover, a:focus {
        color: #0088a9;
        text-decoration: none;
        list-style: none;
    }


    .card-deck {
        width: 70%;
        margin: 0 15% 0 15%;
    }

    .tac {
        text-align: center;
    }

    .add-form {

        background-color: #f1f1f1;
        border-radius: 5px;
        border: 1px solid black;

        margin: 0 auto;
        max-width: 400px;
        margin-top: 100px;
    }


    @media screen and (max-width: 600px) {
        .img-fluid {
            display: none;
        }
    }

    @media (min-width: 576px) {
        .navbar-expand-sm .navbar-nav .nav-link {
            padding-right: 3.5rem;
            padding-left: .5rem;
        }
    }


    body {
        margin: 0;
        padding: 0;
        font-family: serif;
        text-align: center;
        background-color: #337ab7;
    }


    .bc-danger {
        background-color: #dd999f;
        color: #333333;
        border: 5px solid #dd2222;
    }

    input[type="text"], input[type="password"], input[type="email"], input[type="date"] , input[type="number"], .datalist{
        outline: none;
        padding: 10px;
        display: block;
        max-width: 300px;
        border-radius: 3px;
        border: 1px solid #382c2c;
        margin: 20px auto;
    }

    .textarea {
        border-radius: 3px;

        padding: 10px;
        border: 1px solid #382c2c;
        max-width: 500px;
    }

    .login-form {
        border-radius: 5px;
        border: 1px solid black;

    }

    .skuska {
        background-color: #f1f1f1;
        border-radius: 5px;
        border: 1px solid black;

        margin: 0 auto;
        max-width: 400px;
        margin-top: 100px;
        margin-bottom: 300px;
    }

    .margin-bottom {
        margin-bottom: 15px;
    }

    .button-books {
        min-width: 100px;

    }

    /*  zmenene
        .img-fluid {
        .margin-bottom {
            margin-bottom: 15px;
        }
   */

    .mt {
        margin-top: 15px;
    }

    .rows {
        margin-bottom: 10%;
        margin-top: 10%;
    }

    .messageContainer {

        max-width: 700px;
        margin: 0 auto;
        margin-top: 20px;
    }

    .header {
        border-bottom: 1px solid #eeeeee;
        padding: 10px 0px;
        width: 100%;
        text-align: center;
    }

    pre {
        background-color: #337ab7;
    }

    .header a {
        color: #333;
        text-decoration: none;
    }

    .controls a {
        font-size: 13px;
        margin-left: 8px;
        text-decoration: none;
    }

    .edit-link {
        position: relative;
        top: 2px;
        color: #337ab7;
    }

    .delete-link {
        position: relative;
        top: 2px;
        color: #c7254e;
    }

    .color-white {
        background-color: white;
    }

    .list-group-item .controls {
        display: none;
    }

    .list-group-item:hover .controls {
        display: block;
    }

    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
        position: relative;
    }

    img.avatar {
        width: 140px;
        border-radius: 50%;
    }

    h1 {
        font-weight: normal;
        letter-spacing: -1px;
        color: #34495E;
    }

    .rwd-table {
        background: #112a44;
        color: #fff;
        border-radius: .4em;
        overflow: hidden;
    }


    .rwd-table tr {
        border-color: #46637f;
    }

    .rwd-table th, .rwd-table td {
        margin: .5em 1em;
    }

    @media (min-width: 250px) {
        .rwd-table th, .rwd-table td {
            padding: 1em !important;
        }
    }


    .rwd-table {
        margin: 1em 0;
        min-width: 300px;
    }

    .rwd-table th, .rwd-table td:before {
        color: #dd5;
    }


    .rwd-table tr {
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
    }

    .rwd-table th {
        display: none;
    }

    .rwd-table td {
        display: block;
    }

    .rwd-table td:first-child {
        padding-top: .5em;
    }

    .rwd-table td:last-child {
        padding-bottom: .5em;
    }

    .rwd-table td:before {
        content: attr(data-th) ": ";
        font-weight: bold;
        width: 6.5em;
        display: inline-block;
    }

    /*@media (min-width: 100px) {
        .rwd-table td:before {

        .rwd-table td:before {
            display: none;
        }
    }*/

    .rwd-table th, .rwd-table td {
        text-align: left;
    }

    @media (min-width: 480px) {
        .rwd-table th, .rwd-table td {
            display: table-cell;
            padding: .25em .5em;
        }

        .rwd-table th:first-child, .rwd-table td:first-child {
            padding-left: 0;
        }

        .rwd-table th:last-child, .rwd-table td:last-child {
            padding-right: 0;
        }
    }


    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown a:hover {
        background-color: #ddd
    }

    .newclass {

        /*width: 340px;*/
        margin: 0 auto;
        background-color: #eaeaea;
        border-radius: 4px;
        max-width: 400px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .white {
        background-color: #eaeaea;
        min-height: 700px;
        padding-bottom: 1px;
        padding-top: 1px;
    }

    .search {
        align-items: center;


        text-align: center;
        margin: 0 auto;

        padding: 50px;
        margin-left: 25%;
    }


    /*zmenene


             a {
                 margin: 0px;
                 transition: all 0.4s;
                 -webkit-transition: all 0.4s;
                 -o-transition: all 0.4s;
                 -moz-transition: all 0.4s;
             }

             a:focus {
                 outline: none !important;
             }

             a:hover {
                 text-decoration: none;
             }




             p {
                 margin: 0px;
                 padding: 22px 0;
             }

             ul,
             li {
                 margin: 0px;
                 list-style-type: none;
             }
   */


    textarea {
        display: block;
        outline: none;
        margin: 0 auto;
    }

    .contact {
        border: 1px solid black;
        border-radius: 2px;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .contactheader {
        margin: 30px 0;

    }

    textarea:focus,
    input:focus {
        border-color: transparent !important;
    }


    button {
        outline: none !important;
        border: none;
        background: transparent;
    }

    button:hover {
        cursor: pointer;
    }
    a:hover {
        cursor: pointer;
    }

    iframe {
        border: none !important;
    }


    .limiter {
        width: 100%;
        margin: 0 auto;
    }

    .container-table100 {
        width: 100%;
        min-height: 50vh;
        /*
                background: #dad9d9;*/

        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        padding: 33px 30px;
    }

    .wrap-table100 {
        width: 960px;
        border-radius: 10px;
        overflow: hidden;
    }

    .table {
        width: 100%;
        display: table;
        margin: 0;
    }

    @media screen and (max-width: 768px) {
        .table {
            display: block;
        }
    }

    .rowe {
        display: flex;

        flex-wrap: wrap;
    }

    .row {
        display: table-row;
        background: #fff;
    }

    /* zmena
*/
    .row.header {
        color: #ffffff;
        background-color: #343a40;
    }

    @media screen and (max-width: 768px) {
        .row {
            display: block;
        }

        .row.header {
            padding: 0;
            height: 0px;
        }

        .row.header .cell {
            display: none;
        }

        .row .cell:before {
            font-family: Poppins-Bold;
            font-size: 12px;
            color: #808080;
            line-height: 1.2;
            text-transform: uppercase;
            font-weight: unset !important;

            margin-bottom: 13px;
            content: attr(data-title);
            min-width: 98px;
            display: block;
        }
    }

    /* zmena
    */
    .cell {
        display: table-cell;
    }

    @media screen and (max-width: 768px) {
        .cell {
            display: block;
        }
    }

    .row .cell {
        font-family: Poppins-Regular;
        font-size: 15px;
        color: #666666;
        line-height: 1.2;
        font-weight: unset !important;

        padding-top: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #f2f2f2;
    }

    .row.header .cell {
        font-family: Poppins-Regular;
        font-size: 18px;
        color: #fff;
        line-height: 1.2;
        font-weight: unset !important;

        padding-top: 19px;
        padding-bottom: 19px;
    }

    .row .cell:nth-child(1) {

        padding-left: 40px;
        width: 100px;
    }

    .row .cell:nth-child(2) {
        width: 160px;
    }

    .row .cell:nth-child(3) {
        width: 200px;
    }

    .row .cell:nth-child(4) {
        width: 190px;
    }

    .row .cell:nth-child(6) {
        width: 190px;
    }

    .table,
    .row {
        width: 100% !important;
        /*  margin : 20px 0;*/
    }


    @media (max-width: 768px) {
        .row {
            border-bottom: 1px solid #f2f2f2;
            padding-bottom: 18px;
            padding-top: 30px;
            padding-right: 15px;
            margin: 0;
        }

        .row .cell {
            border: none;
            padding-left: 30px;
            padding-top: 16px;
            padding-bottom: 16px;
        }

        .row .cell:nth-child(1) {
            padding-left: 30px;
        }

        .row .cell {
            font-family: Poppins-Regular;
            font-size: 18px;
            color: #555555;
            line-height: 1.2;
            font-weight: unset !important;
        }

        .table,
        .row,
        .cell {
            width: 100% !important;
            margin: 20px 0;
        }
    }


    /* zmenA
*/

    .img-fluid {
        width: 20%;
        margin: 0;

    }

    .container {
        margin-left: auto;
        margin-right: auto;


    }


    .img-book {
        width: 55%;
        margin-left: auto;
        margin-right: auto;

    }


    .btn-reserve {
        width: 20%;
    }

    .featured {
        margin-left: auto;
        margin-right: auto;

    }

    .also-like {
        margin-left: auto;
        margin-right: auto;
        width: 80%;
    }

    .img-borrow {
        width: 100%;
    }


    .info-panel {
        margin-top: 20px;


    }

    .availability {
        margin-top: 50px;
    }

    @media screen and (max-width: 767px) {
        .card-img-top {
            width: 40%;
            margin-right: auto;
            margin-left: 100px;

        }

        .img-borrow {
            width: 40%;
            margin-left: 100px;
            margin-bottom: 20px;
        }
    }

    @media screen and (max-width: 600px) {
        .img-fluid {
            display: none;
        }
    }

    @media (min-width: 576px) {
        .navbar-expand-sm .navbar-nav .nav-link {
            padding-right: 3.5rem;
            padding-left: .5rem;
        }
    }

    @media screen and (max-width: 1200px) {
        .img-book {
            width: 70%;
            justify-content: center;

        }

    }

    /*poznamka*/

    .fm {
        border: 1px solid black;
        width: 40%;
        margin: 0 auto;
        min-width: 270px;
    }

    @media (min-width: 280px)
        .fm {
            border: 1px solid black;
            width: 40%;
            margin: 0 auto;
            min-width: 270px;
        }

        .link {
            padding-right: 15px;
        }

        .header {
            border-bottom: 1px solid #eeeeee;
            padding: 10px 0px;
            width: 100%;
            text-align: center;
        }

        .header a {
            color: #333;
            text-decoration: none;
        }

        .controls a {
            font-size: 13px;
            margin-left: 8px;
            text-decoration: none;
        }

        .delete-link {
            position: relative;
            top: 2px;
        }


        h1 {
            font-weight: normal;
            letter-spacing: -1px;
            color: #34495E;
        }

        .rwd-table {
            background: #112a44;
            color: #fff;
            border-radius: .4em;
            overflow: hidden;
        }

        .rwd-table tr {
            border-color: #46637f;
        }

        .rwd-table th, .rwd-table td {
            margin: .5em 1em;
        }

        @media (min-width: 480px) {
            .rwd-table th, .rwd-table td {
                padding: 1em !important;
            }
        }

        .rwd-table th, .rwd-table td:before {
            color: #dd5;
        }

        .rwd-table {
            margin: 1em 0;
            min-width: 300px;
        }

        .rwd-table tr {
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
        }

        .rwd-table th {
            display: none;
        }

        .rwd-table td {
            display: block;
        }

        .rwd-table td:first-child {
            padding-top: .5em;
        }

        .rwd-table td:last-child {
            padding-bottom: .5em;
        }

        .rwd-table td:before {
            content: attr(data-th) ": ";
            font-weight: bold;
            width: 6.5em;
            display: inline-block;
        }

        @media (min-width: 480px) {
            .rwd-table td:before {
                display: none;
            }
        }

        .rwd-table th, .rwd-table td {
            text-align: left;
        }

        @media (min-width: 480px) {
            .rwd-table th, .rwd-table td {
                display: table-cell;
                padding: .25em .5em;
            }

            .rwd-table th:first-child, .rwd-table td:first-child {
                padding-left: 0;
            }

            .rwd-table th:last-child, .rwd-table td:last-child {
                padding-right: 0;
            }
        }


        .odkaz {
            text-decoration: none;
            color: red;

        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            ! *
            background-color: #333;
            *!
        }

        li {
            float: left;
        }

        li a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a.right {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }

    }

    /*
/*

.sekcia {
    border: 1px solid cornflowerblue;
    border-radius: 1em;
    margin-bottom: 2em;
    background-color: #f5f5f5;
}

.hore {
    padding-top: 1em;
}

.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

#myInput {
    border-box: box-sizing;
    background-image: url('searchicon.png');
    background-position: 14px 12px;
    background-repeat: no-repeat;
    font-size: 16px;
    padding: 14px 20px 12px 45px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f6f6f6;
    min-width: 230px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {
    background-color: #ddd
}

.show {
    display: block;
}*/
    /*PRIDANE ABOUT BOOKS*/
    .img-fluid {
        width: 20%;
        margin: 0;

    }

    .container {
        margin-left: auto;
        margin-right: auto;


    }


    .img-book {
        width: 55%;
        margin-left: auto;
        margin-right: auto;

    }


    .btn-reserve {
        width: 20%;
    }

    .featured {
        margin-left: auto;
        margin-right: auto;

    }

    .also-like {
        margin-left: auto;
        margin-right: auto;
        width: 80%;
    }

    .img-borrow {
        width: 100%;
    }


    .info-panel {
        margin-top: 20px;


    }

    .availability {
        margin-top: 50px;
    }

    @media screen and (max-width: 767px) {
        .card-img-top {
            width: 40%;
            margin-right: auto;
            margin-left: 100px;

        }

        .img-borrow {
            width: 40%;
            margin-left: 100px;
            margin-bottom: 20px;
        }
    }

    @media screen and (max-width: 600px) {
        .img-fluid {
            display: none;
        }
    }

    @media (min-width: 576px) {
        .navbar-expand-sm .navbar-nav .nav-link {
            padding-right: 3.5rem;
            padding-left: .5rem;
        }
    }

    @media screen and (max-width: 1200px) {
        .img-book {
            width: 70%;
            justify-content: center;

        }

    }


    /* .fm {
         border: 1px solid black;
         width: 40%;
         margin: 0 auto;
         min-width: 270px;
     }*/

    @media (max-width: 280px)
        .fm {
            border: 1px solid black;
            width: 40%;
            margin: 0 auto;
            min-width: 270px;
        }

        .navigation-menu {

            max-width: 95%;
            margin: 0 auto;
            display: inline-block;

        }

        @media (min-width: 580px)

        {
            .but {
                display: block;

            }

        }

        @media (min-width: 400px)
        {
            .padding {
                margin: 20px 0;
            }

        }

            .admin-menu {
                /* display: flex; */
                display: inline-block;
                /* -ms-flex-direction: column;
                 flex-direction: column;*/
                padding-left: 0;
                margin-bottom: 0;
                list-style: none;
                /*flex-direction: row;*/
            }

            .navigation {
                flex-direction: column;
            }

            .navigationli {
                flex-direction: column;
            }

            .mx {
                max-width: 100px;
            }
            /*.padding {
                padding: 0 20px;
            }*/
    /*



     }*/

</style>

<body class="">
<!--<body class="bg-dark">-->


<nav class="navbar navbar-expand-sm navbar-dark ">
    <a class="py-2" href="#">
        <img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-JulUCb7w_GPOzi9Vc08MfHapHX6-xi7v5mTN6A0w4tq70-sn&s"
                class=" rounded-corners img-fluid " alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ml-auto ">
            <li class="nav-item ">
                <a class="nav-link waves-effect waves-light " href="<?= $site_url ?>index.php">Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="<?= $site_url ?>search-book.php">Search</a>
            </li>


            <?php if (isset($_SESSION['id']) && $_SESSION['id'] == 1): ?>

                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="<?= $site_url ?>admin-book.php">Admin book</a>
                </li>
            <?php endif; ?>




            <?php if (isset($_SESSION['email'])): ?>

                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="<?= $site_url ?>user.php">Account</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="<?= $site_url ?>logout.php">Sign out</a>
                </li>               <!--poznamka odhlasit sa anglicky-->


            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="<?= $site_url ?>login.php">Sign in </a>
                </li>   <!--poznamka prihlasit sa anglicky-->

            <?php endif; ?>

        </ul>
        <form class="form-inline">
            <div class="md-form my-0">

            </div>
        </form>
    </div>
</nav>

