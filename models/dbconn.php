<?php

$librarytable = 'library';
$teamtable = 'team';
$hostname = 'localhost';
$username = 'pawn';
$password = '';
$database = 'marketplace';

$librarytablecols = '(id, name, categoryId, description, book, image)';
$teamtablecols = '(id, name, image, qualification, position, about)';

$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
