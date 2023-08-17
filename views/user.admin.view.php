<?php
session_start();
include_once 'includes/header.php';

if(!isset($_SESSION['username']) ){ // not logged in
    header('Location: signin.view.php');
    exit();
}
if ($_SESSION['type'] !== 'admin') {
    header('Location: home.view.php');
    exit();
}

?>

<link href="includes/css/userlist.css" rel="stylesheet">
<script> document.title = "Users"; </script>

<div class="userlist">
    <div class="table-wrapper membertable">
        <table>
            <thead>
                <th>Profile Picture</th>
                <th>Name</th>
                <th>Type</th>
                <th colspan="2">Operation</th>
            </thead>
            <tbody>
                <?php
                    require_once '../controllers/user.controller.php';
                    getUserTable();
                 ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once 'includes/footer.php'; ?>
