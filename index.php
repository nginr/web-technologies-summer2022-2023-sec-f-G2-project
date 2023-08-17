<?php
session_start();

if(!isset($_SESSION['username']) ){ // not logged in
    header('Location: views/signin.view.php');
    exit();
} else {
    header('Location: views/home.view.php');
    exit();
}

?>
