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
    ';

}
