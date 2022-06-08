<?php 
print_r($_POST);
$connection = require_once "../classes/connection.php";
$connection->deleteNote($_POST);
header('location:../index.php');