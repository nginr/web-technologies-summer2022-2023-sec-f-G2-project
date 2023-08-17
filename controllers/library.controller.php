<?php

function getcategories() {
    require '../models/dbconn.php';
    $query = "SELECT * FROM categories";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $val = $row['id'];
            $opt = $row['category'];
            echo '
                <option value="' . $val . '">' . $opt . '</option>
            ';
        }
    }
    mysqli_close($connection);
}

function userlib($row) {
    echo  '
    <tr onclick="viewBook('. $row['id'] .')">
        <td><img width="100px" src="storage/images/' . $row['image'] .'"></td>
        <td>' . $row['name'] . '</td>
        <td>' . $row['description'] . '</td>
    </tr>
    ';
}

function adminlib($row) {
    echo  '
    <tr onclick="viewBook('. $row['id'] .')">
        <td>' . $row['id'] . '</td>
        <td><img width="100px" src="storage/images/' . $row['image'] .'"></td>
        <td>' . $row['name'] . '</td>
        <td>' . $row['description'] . '</td>
    </tr>
    ';
}

function getlibraryu() {
    require '../models/dbconn.php';
    $query = "SELECT * FROM $librarytable";

    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            userlib($row);
        }
    }
}

function getlibrary() {
    require '../models/dbconn.php';
    $query = "SELECT * FROM $librarytable";

    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            adminlib($row);
        }
    }
}

function libs($row) {
    echo  '
    <div class="libcard" onclick="viewpdf('.$row['id'].')">
        <img class="libcard-image" src="storage/images/'.$row['image'].'" alt="'.$row['name'].'">
        <div class="libcard-content">
            <p class="libcard-title">'.$row['name'].'</p>
            <p class="libcard-description">'.$row['description'].'</p>
        </div>
    </div>
    ';
}

function getlibrarys() {
    require '../models/dbconn.php';
    $query = "SELECT * FROM $librarytable";

    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            libs($row);
        }
    }
}
