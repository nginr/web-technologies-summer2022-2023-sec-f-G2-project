<?php

session_start();

function is_valid_login(string $email, string $pswrd) : bool {
    require_once '../models/dbconn.php';
    $query = "SELECT * FROM admin WHERE admin_mail='$email' AND password='$pswrd'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['name'];
        $_SESSION['type'] = $row['type'];
        return true;
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $psrd = htmlspecialchars($_POST['password']);

    if (is_valid_login($email, $psrd)) {
        $response = array("status" => "success");
    } else {
        $response = array("status" => "error", "message" => "Invalid Email/Password");
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
else {
    header('Location: ../views/signin.view.php');
    exit();
}
