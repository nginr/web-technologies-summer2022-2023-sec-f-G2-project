<?php

function getpos($f, $pos) {
    if ($pos===$f) {
        return "selected";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    require_once '../models/dbconn.php';
    $query = "SELECT * FROM $teamtable WHERE id=".$_GET['id'];
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $mid = $row['id'];
    $mname = $row['name'];
    $mimage = $row['image'];
    $mpos = $row['position'];
    $mqual = $row['qualification'];
    $mabout = $row['about'];

session_start();
include_once 'includes/header.php';

    echo '
    <script> document.title = "Delete Member"; </script>

<div class="center-content">
    <form method="POST" action="../controllers/team.controller.php">
    <table>
        <tr>
            <td>Name</td>
            <td>  '.$mname.' </td>
        </tr>
        <tr>
            <td>Profile Picture</td>
            <td>  <img width="100px" src="../views/storage/images/'.$mimage.'"> </td>
        </tr>
        <tr>
            <td> Position </td>
            <td>  '.$mpos.' </td>
        </tr>
        <tr>
            <td>Qualification</td>
            <td> '.$mqual.' </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">About</td>
            <td>  '.$mabout.' </td>
        </tr>
    </table>
        <input type="hidden" name="delete" value="'.$mid.'">
        <input type="submit" value="Delete">
    </form>
        <a href="../views/team.admin.view.php">Cancel</button>
</div>
    ';

}
