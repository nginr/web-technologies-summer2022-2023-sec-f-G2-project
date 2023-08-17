<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mname          = htmlspecialchars($_POST['membername']);
    $mposition      = htmlspecialchars($_POST['mpos']);
    $about          = htmlspecialchars($_POST['about']);
    $mqualification = htmlspecialchars($_POST['qualification']);
    $pImagename = '';
    $imageUpload = false;

    if (empty($mname) || empty($mposition) || empty($mqualification)) {
        header('Location: ../views/team.admin.view.php?err=noemptyallowed');
        exit();
    }

    if (isset($_FILES['profpic'])) {
        $pImage = $_FILES['profpic'];
        $pImagename = "TeamProfile-$mname-".$pImage['name'];
        $pImagesize = $pImage['size'];
        $pImagetype = $pImage['type'];
        $pImagetmpname = $pImage['tmp_name'];

        if ($pImagetype === 'image/jpg' || $pImagetype === 'image/jpeg' || $pImagetype === 'image/png') {
            $imageUpload = true;
        } else {
            header('Location: ../views/team.admin.view.php?err=jpgpngonly');
            exit();
        }
    }

    require_once '../models/dbconn.php';
    $tcol = '';
    $query = "";
    if (!empty($about) && !empty($pImagename)) {
        $tcol = '(name, image, qualification, position, about)';
        $query = "INSERT INTO $teamtable $tcol VALUES ('$mname','$pImagename', '$mqualification', '$mposition', '$about')";
    }
    else if (empty($about) && !empty($pImagename)) {
        $tcol = '(name, image, qualification, position)';
        $query = "INSERT INTO $teamtable $tcol VALUES ('$mname','$pImagename', '$mqualification', '$mposition')";
    }
    else if (!empty($about) && empty($pImagename)) {
        $tcol = '(name, qualification, position, about)';
        $query = "INSERT INTO $teamtable $tcol VALUES ('$mname', '$mqualification', '$mposition', '$about')";
    }
    else {
        $tcol = '(name, qualification, position)';
        $query = "INSERT INTO $teamtable $tcol VALUES ('$mname', '$mqualification', '$mposition')";
    }

    if (mysqli_query($connection, $query)) {
        mysqli_close($connection);
        if ($imageUpload == true) {
            $targetProfileImagePath = '../views/storage/images/' . $pImagename;
            move_uploaded_file($pImagetmpname, $targetProfileImagePath);
        }
        header('Location: ../views/team.admin.view.php?msg=teaminserted');
        exit();
    } else {
        $err = mysqli_error($connection);
        mysqli_close($connection);
        header('Location: ../views/team.admin.view.php?msg=' . $err);
        exit();
    }
} else {
    header('location: ../views/team.admin.view.php');
    exit();
}
