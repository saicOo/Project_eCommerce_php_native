<?php
$host = "localhost";
$user = "root";
$password= "";
$dbName = "ecommerce";

$connectSQL = mysqli_connect($host , $user , $password , $dbName);

session_start(); 