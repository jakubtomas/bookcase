<?php


ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

$site_url = 'http://localhost/acko/';

if (!session_id() ) session_start();



define( 'BASE_URL', 'http://localhost:80/acko/');
define( 'APP_PATH', realpath(__DIR__ . '/htdocs/'));

$server = 'localhost';
$username = 'root';
$password = 'root';
$database = 'bookcase';

try{
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
    die( "Connection failed: " . $e->getMessage());
}

global $conn;
$records = $conn->prepare('SELECT * FROM books');
//$records->bindParam(':email', $_POST['email']);
$records->execute();
$results = $records->fetchAll(PDO::FETCH_ASSOC);


?>

