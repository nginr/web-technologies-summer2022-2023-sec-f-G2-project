<?php
session_start();
include_once 'includes/header.php';

if(!isset($_SESSION['username'])){ // not logged in
    header('Location: signin.view.php');
    exit();
}
require_once '../controllers/library.controller.php';
require_once '../controllers/team.controls.php';
?>

<link href="includes/css/homepage.css" rel="stylesheet">
<script> document.title = "Home"; </script>

<div id="home-content">
    <h2> Welcome <?php echo $_SESSION['username']; ?> </h2>

    <div onwheel="scrollhorz('.libwrapper')" class="libwrapper">
        <?php getlibrarys(); ?>
    </div>

    <div onwheel="scrollhorz('.teamwrapper')" class="teamwrapper">
        <?php getteams(); ?>
    </div>
</div>

<script>
function viewpdf(id) { window.location.href = 'embed_book.view.php?id='+id; }
</script>

<?php include_once 'includes/footer.php'; ?>
