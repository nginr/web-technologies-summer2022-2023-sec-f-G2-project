<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $psrd = htmlspecialchars($_POST['password']);

    require_once '../models/user.model.php';
    $userOBJ = new User();

    if ($userOBJ->requestUserRegistration($name, $email, $psrd)) {
        $response = array("status" => "success");
    } else {
        $response = array("status" => "error", "msg" => "Failed");
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
