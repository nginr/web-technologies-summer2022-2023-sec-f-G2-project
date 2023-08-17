<?php
require_once '../models/dbconn.php';

function userlib($row) {
    return '
    <tr>
        <td class="image"><img width="100px" src="storage/images/'.$row['image'].'"></td>
        <td>' . $row['name'] . '</td>
        <td>' . $row['description'] . '</td>
    </tr>
    ';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id =  htmlspecialchars($_POST['id']);
    $str = htmlspecialchars($_POST['search']);

    $query = "SELECT * FROM $librarytable";

    if ($id != 0) {
        $query .= " WHERE categoryId = $id";
        if (!empty($str)) {
            $query .= " AND (name LIKE '%$str%' OR description LIKE '%$str%' OR book LIKE '%$str%');";
        }
    } else {
        if (!empty($str)) {
            $query .= " WHERE (name LIKE '%$str%' OR description LIKE '%$str%' OR book LIKE '%$str%' );";
        }
    }

    $result = mysqli_query($connection, $query);

    $out = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $out .= userlib($row);
        }
    }
    echo $out;
}
