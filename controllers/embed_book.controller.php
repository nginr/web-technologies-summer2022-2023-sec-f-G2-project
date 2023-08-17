<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['id'])) {
        require_once '../models/dbconn.php';
        $id = $_GET['id'];
        $query = "SELECT * FROM $librarytable WHERE id=$id";
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $book = $row['book'];
            }
        }
    }

}
