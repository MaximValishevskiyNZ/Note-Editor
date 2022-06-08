<?php 

if ('' == $_POST['title'] || '' == $_POST['description']) {
   session_start();
   $_SESSION['empty'] = true;
   header('location:../index.php');
   exit();
}


$connection = require_once '../classes/connection.php';
$connection->addNote($_POST);

header('location:../index.php');