<?php

session_start();

session_unset();

session_destroy();




$_SESSION['message'] = "You have been logged out ";

header("Location: $site_url" . "index.php");


