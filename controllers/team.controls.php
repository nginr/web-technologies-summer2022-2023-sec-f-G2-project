<?php

function userteam($row) {
    return '
    <div class="memberbox">
        <div> <img width="100px" src="../views/storage/images/' . $row['image'] . '"> </div>
        <div>
            <b>'. $row['name'] .'</b>
            <i>('. $row['position'] .')</i>
            <p>'. $row['about'] .'</p>
        </div>
    </div>
    ';
}

function teams($row) {
    echo '
    <div class="membercard">
        <div> <img class="membercard-image" src="../views/storage/images/' . $row['image'] . '"> </div>
        <div class="membercard-content">
            <b>'. $row['name'] .'</b>
            <i>('. $row['position'] .')</i>
            <p>'. $row['about'] .'</p>
        </div>
    </div>
    ';
}

function Teamtable($row) {
    return '
    <tr>
        <td>'. $row['id'] . '</td>
        <td><img width="100px" src="../views/storage/images/' . $row['image'] . '"> </td>
        <td>'. $row['name'] . '</td>
        <td>'. $row['qualification'] . '</td>
        <td>'. $row['position'] . '</td>
    </tr>
    ';
}

function getteam() {
    require '../models/dbconn.php';
    $query = "SELECT * FROM $teamtable";
    $result = mysqli_query($connection, $query);

    $out = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $out .= userteam($row);
        }
    }
    echo $out;
}

function getteamtable() {
    require '../models/dbconn.php';
    $query = "SELECT * FROM $teamtable";
    $result = mysqli_query($connection, $query);

    $out = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $out .= Teamtable($row);
        }
    }
    echo $out;
}


function getteams() {
    require '../models/dbconn.php';
    $query = "SELECT * FROM $teamtable";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            teams($row);
        }
    }
}
