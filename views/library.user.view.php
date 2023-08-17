<?php
session_start();
include_once 'includes/header.php';
include_once '../controllers/library.controller.php';
?>
<script>
document.title = "Library";
</script>

<div class="mainlybrary">
    <div class="center-content">
        <div class="head-cat">
            <div class="select-cat">
                <label for="category">Select Category </label>
                <select id="category" >
                    <option value="0">All</option>
                    <?php getcategories(); ?>
                </select>
            </div>
            <div class="search-cat">
                <label for="search">Search :</label>
                <input type="text" placeholder="Search Book" id="stext" name="stext">
            </div>
        </div>
        <div class="neo-distable">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Cover</th>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody id="output">
                        <?php getlibraryu(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>

function viewBook(id) {
    window.location.href = "embed_book.view.php?id="+id;
}

document.addEventListener('DOMContentLoaded', function() {
    let category = document.getElementById('category');
    let stext = document.getElementById('stext');
    let output = document.getElementById('output');

    function fetchLibraryData() {
        let cat = category.value;
        let search = stext.value;

        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../controllers/fetch-library-data.php', true);
        xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhttp.onreadystatechange = function() {
            if (xhttp.readyState === 4 && xhttp.status === 200) {
                output.innerHTML = xhttp.responseText;
            }
        };

        let data = 'id=' + cat + '&search=' + search;
        xhttp.send(data);
    }

    category.addEventListener('change', fetchLibraryData);
    stext.addEventListener('keyup', fetchLibraryData);
});

</script>

<?php include_once 'includes/footer.php'; ?>
