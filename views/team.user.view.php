<?php
session_start();
include_once 'includes/header.php';

if(!isset($_SESSION['username'])){ // not logged in
    header('Location: signin.view.php');
    exit();
}
?>

<script> document.title = "Team"; </script>

<div class="mainteam">
    <div class="container">
    <?php include_once '../controllers/team.controls.php'; getteam(); ?>
    </div>
</div>


<?php include_once 'includes/footer.php'; ?>
