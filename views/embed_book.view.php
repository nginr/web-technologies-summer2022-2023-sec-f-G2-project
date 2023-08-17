
<?php
session_start();
require_once '../controllers/embed_book.controller.php';
include_once 'includes/header.php';
?>
<link rel="stylesheet" href="includes/css/embeddedpdf.css">
<script> document.title = "View PDF"; </script>

<style>
.back-span {
    padding: 2px;
    height: 20px;
    width: 50px;
    border: 1px solid #11101b;
    box-shadow: 0px 1px 1px 1px #11101b;
}
</style>

<div class="center-content">
    <div class="pdfcontrols">
        <span class="back-span" style="" onclick="history.back();">
            <i class='bx bx-chevrons-left'></i>
        </span>
        <h2>PDF Viewer</h2>
        <span>
            <input class="pdfop" type="submit" value="Update">
            <input id="pdfdel" type="submit" value="Delete">
        </span>
    </div>
    <div class="pdfviewer">
        <iframe id="embeddedbook"
            <?php echo 'src="storage/books/' . $book .'"'; ?> >
        </iframe>
    </div>
</div>

<?php include_once 'includes/footer.php'; ?>
