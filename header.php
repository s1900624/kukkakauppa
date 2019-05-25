<?php
require_once 'db.php';

    $mysqli = new mysqli($host, $username, $password, $database);
?>
<html>
<head>
    <title>Kukkakauppa Ruusunen</title>
    <meta name="viewport" width="device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/script.js" lang="js"></script>
    <style></style>
</head>
<body>
    <nav id="menu">
        <li>
            <a href="index.php">
                <img src="images/logo.png" alt="Kukka" class="pics"/>
            </a>
        </li>
        <li><a href="tuotteet.php">Tuotteet</a></li>
        <li><a href="palaute.php">Palaute</a></li>
        <li><a href="ostoskori.php">Ostoskori</a></li>
    </nav>