<?php
    if(!isset($_SESSION['username'])){ // not logged in
        header('Location: signin.view.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="includes/css/style.css" rel="stylesheet">
        <link href="includes/css/profile_menu.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="storage/icons/favicon.png"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script defer src="includes/js/active_page.js"></script>
        <script defer src="includes/js/helper.js"></script>
    </head>
    <body>

<?php

    if (isset($_SESSION['username'])) {
        if ($_SESSION['type'] == 'admin') {
            echo '
                <header>
                    <div onclick="gohome()" class="homelogo">Course Market</div>
                    <nav class="navbar">
                        <ul>
                            <li>
                                <a href="library.admin.view.php">Library</a>
                            </li>
                            <li>
                                <a href="team.admin.view.php">Team</a>
                            </li>
                        </ul>
                    </nav>
                </header>
            ';
        } else {
            echo '
                <header>
                    <div onclick="gohome()" class="homelogo">Course Market</div>
                    <nav class="navbar">
                        <ul>
                            <li>
                                <a href="library.user.view.php">Library</a>
                            </li>
                            <li>
                                <a href="team.user.view.php">Team</a>
                            </li>
                        </ul>
                    </nav>
                </header>
            ';
        }
    }
    include_once 'components/profile_menu.php';
?>
