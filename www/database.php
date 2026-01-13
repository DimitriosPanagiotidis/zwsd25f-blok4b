<?php
$dbhost = 'mariadb';
$dbuser = 'root';
$dbpassword = 'password';
$dbname = 'blok4b';

$conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}

?>