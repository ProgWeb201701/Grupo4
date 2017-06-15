<?php
$hostname = "localhost";
$database = "tcc";
$username = "root";
$password = "";
$connection = mysqli_connect($hostname, $username, $password, $database) or die ("Error " . mysqli_error($connection));
?>