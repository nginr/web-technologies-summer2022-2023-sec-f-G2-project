<?php

function isUniqueEmail($email) {
    require_once '../models/dbconn.php';
    $query = "SELECT * FROM admin WHERE admin_mail='$email'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) { // email exists
        mysqli_close($connection);
        return false;
    } else {
        mysqli_close($connection);
        return true;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emailf = htmlspecialchars($_POST['email']);

    if (!isUniqueEmail($emailf)) { // exists
        $response = array("status" => "Exists");
    } else {
        $response = array("status" => "Unique");
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
