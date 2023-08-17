<?php
require_once 'team.controls.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        $mid = $_POST['update'];
        require_once '../models/dbconn.php';
        $query = "SELECT * FROM $teamtable WHERE id=".$mid;
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        $pImagename = $row['image'];
        $oldmemdata = $row;

        $mname          = htmlspecialchars($_POST['membername']);
        $mposition      = htmlspecialchars($_POST['mpos']);
        $about          = htmlspecialchars($_POST['about']);
        $mqualification = htmlspecialchars($_POST['qualification']);
        $imageUpload = false;

        // if (isset($_FILES['profpic'])) {
        //     $pImage = $_FILES['profpic'];
        //     $pImagename = "TeamProfile-$mname-".$pImage['name'];
        //     $pImagesize = $pImage['size'];
        //     $pImagetype = $pImage['type'];
        //     $pImagetmpname = $pImage['tmp_name'];
        //
        //     if ($pImagetype === 'image/jpg' || $pImagetype === 'image/jpeg' || $pImagetype === 'image/png') {
        //         $imageUpload = true;
        //     }
        // }

        $new = [
            'id' => $mid,
            'name' => $mname,
            'image' => $pImagename,
            'qualification' => $mqualification,
            'position' => $mposition,
            'about' => $about,
        ];

        $changedFields = [];
        foreach ($new as $key => $value) {
            if ($oldmemdata[$key] !== $value) {
                $changedFields[$key] = $value;
            }
        }

        $updateQuery = "UPDATE $teamtable SET ";
        foreach ($changedFields as $key => $value) {
            $updateQuery .= "$key = '$value', ";
        }
        $updateQuery = rtrim($updateQuery, ', ');
        $updateQuery .= " WHERE id = $mid";

        mysqli_query($connection, $updateQuery);
        mysqli_close($connection);
        header('Location: ../views/team.admin.view.php?msg=memberupdated');
        exit();
    }
    else if (isset($_POST['delete'])) {
        $mid = $_POST['delete'];
        require_once '../models/dbconn.php';
        $query = "DELETE FROM $teamtable WHERE id=".$mid;
        if (mysqli_query($connection, $query)) {
            mysqli_close($connection);
            header('Location: ../views/team.admin.view.php?msg=memberdeleted');
            exit();
        } else {
            $err = mysqli_error($connection);
            mysqli_close($connection);
            header('Location: ../views/team.admin.view.php?msg=' . $err);
            exit();
        }
    }
}
