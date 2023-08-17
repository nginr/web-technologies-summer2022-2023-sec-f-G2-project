<?php
session_start();
include_once 'includes/header.php';
include_once '../controllers/library.controller.php';

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
<script> document.title = "Library"; </script>

<div class="tabcontainer">
    <div class="buttonscontainer">
        <button onclick="showpanel(0)">Add Books</button>
        <button onclick="showpanel(1)">Book List</button>
    </div>

    <div class="tabpanel">
        <div class="add-book-form">
            <?php include_once 'components/add_book_form.php'; ?>
        </div>
    </div>
    <div class="tabpanel">
        <div class="table-wrapper">
            <table>
                <thead>
                    <th>ID</th>
                    <th>Cover</th>
                    <th>Name</th>
                    <th>Description</th>
                </thead>
                <tbody>
                    <?php getlibrary(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="includes/js/panel_tabber.js"> </script>
<script>

function viewBook(id) {
    window.location.href = "embed_book.view.php?id="+id;
}

</script>

<?php include_once 'includes/footer.php'; ?>
