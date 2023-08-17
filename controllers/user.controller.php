<?php

function getUserTable() {
    require_once '../models/user.model.php';
    $allUserOBJ = new User();
    $ndata = $allUserOBJ->getAllUsers();

    foreach ($ndata as $row) {
        echo "<tr>";
        echo "<td><img src='storage/images/{$row['profilePic']}' ></td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['type']}</td>";
        echo "<td onclick='confirm({$row['id']})'> <label>Confirm</label> </td>";
        echo "<td onclick='unconfirm({$row['id']})'> <label>Delete</label> </td>";
        echo "</tr>";
    }

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = $_POST['id'];
    require_once '../models/user.model.php';
    $confirmUser = new User();
    $confirmUser->confirmUserRegistration($uid);

}
