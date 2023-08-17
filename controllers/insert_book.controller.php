<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bname       = htmlspecialchars($_POST['bookname']);
    $bcategory   = htmlspecialchars($_POST['bookcategory']);
    $description = htmlspecialchars($_POST['desc']);
    $pdfname = '';
    $cImagename = '';
    if (empty($bname) || empty($bcategory)) {
        header('Location: ../views/library.admin.view.php?err=noemptyallowed');
        exit();
    }

    if (isset($_FILES['book'])) {
        $pdf        = $_FILES['book'];
        $pdfname    = "Library ".$pdf['name'];
        $pdfsize    = $pdf['size'];
        $pdftype    = $pdf['type'];
        $pdftmpname = $pdf['tmp_name'];

        if ($pdftype === 'application/pdf') {
            $targetPath = '../views/storage/books/' . $pdfname;
            move_uploaded_file($pdftmpname, $targetPath);
        } else {
            header('Location: ../views/library.admin.view.php?err=pdfonly');
            exit();
        }
    } else {
        header('Location: ../views/library.admin.view.php?err=pdfneeded');
        exit();
    }

    if (isset($_FILES['coverImage'])) {
        $cImage = $_FILES['coverImage'];
        $cImagename = "PDFCover ".$cImage['name'];
        $cImagesize = $cImage['size'];
        $cImagetype = $cImage['type'];
        $cImagetmpname = $cImage['tmp_name'];

        if ($cImagetype === 'image/jpg' || $cImagetype === 'image/jpeg' || $cImagetype === 'image/png') {
            $targetCoverImagePath = '../views/storage/images/' . $cImagename;
            move_uploaded_file($cImagetmpname, $targetCoverImagePath);
        } else {
            header('Location: ../views/library.admin.view.php?err=jpgpngonly');
            exit();
        }
    } else {
        header('Location: ../views/library.admin.view.php?err=imageneeded');
        exit();
    }

    require '../models/dbconn.php';
    $tcol = '';
    $query = "";
    if (!empty($description)) {
        $tcol = '(name, categoryId, description, book, image)';
        $query = "INSERT INTO $librarytable $tcol VALUES ('$bname', $bcategory, '$description', '$pdfname', '$cImagename')";
    } else {
        $tcol = '(name, categoryId, book, image)';
        $query = "INSERT INTO $librarytable $tcol VALUES ('$bname', $bcategory, '$pdfname', '$cImagename')";
    }

    if (mysqli_query($connection, $query)) {
        mysqli_close($connection);
        header('Location: ../views/library.admin.view.php?msg=bookinserted');
        exit();
    } else {
        $err = mysqli_error($connection);
        mysqli_close($connection);
        header('Location: ../views/library.admin.view.php?msg=' . $err);
        exit();
    }
} else {
    header('location: ../views/library.admin.view.php');
    exit();
}
