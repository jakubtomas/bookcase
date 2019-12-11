<?php

session_start();

session_unset();

session_destroy();




$_SESSION['message'] = "uspesne odhlasen ";

header("Location: $site_url" . "index.php");


