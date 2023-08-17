<?php
session_start();
include_once 'includes/header.php';

if(!isset($_SESSION['username'])){ // not logged in
    header('Location: signin.view.php');
    exit();
}
?>
<script> document.title = "Courses"; </script>

<div> </div>


<?php include_once 'includes/footer.php'; ?>
