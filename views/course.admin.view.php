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

<link rel="stylesheet" href="includes/css/tabpanel.css">
<script> document.title = "Courses"; </script>

<div class="tabcontainer">
    <div class="buttonscontainer">
        <button onclick="showpanel(0)">Add Course</button>
        <button onclick="showpanel(1)">Course List</button>
    </div>

    <div class="tabpanel">
        <div class="add-course-form">
            <?php include_once 'components/add_course_form.php';?>
        </div>
    </div>
    <div class="tabpanel">
        <div class="course-wrapper">
        </div>
    </div>
</div>

<script src="includes/js/panel_tabber.js"> </script>
<?php include_once 'includes/footer.php'; ?>
