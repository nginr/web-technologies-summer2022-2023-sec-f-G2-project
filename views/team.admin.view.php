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

<link href="includes/css/tabpanel.css" rel="stylesheet">
<script> document.title = "Team"; </script>


<div class="tabcontainer">
    <div class="buttonscontainer">
        <button onclick="showpanel(0)">Add Member</button>
        <button onclick="showpanel(1)">Member List</button>
    </div>

    <div class="tabpanel">
        <div class="add-book-form">
            <?php include_once 'components/add_team_form.php';?>
        </div>
    </div>
    <div class="tabpanel">
        <div class="table-wrapper membertable">
            <table>
                <thead>
                    <th>ID</th>
                    <th>Profile Picture</th>
                    <th>Name</th>
                    <th>Qualification</th>
                    <th>Position</th>
                </thead>
                <tbody>
                    <?php require_once '../controllers/team.controls.php'; getteamtable(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="includes/js/panel_tabber.js"> </script>

<?php include_once 'includes/footer.php'; ?>
