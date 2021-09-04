<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "mypham";
$conn = mysqli_connect($hostname, $username, $password, $database);
mysqli_set_charset($conn, 'UTF8');
?>