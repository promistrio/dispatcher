<?php
/* Не забыть про sql инъекцию*/
header('Content-Type: text/html; charset=utf-8');

include("open.php");

$mysqli = new mysqli($host, $login, $password, $db_name);


$id = $_GET['id'];


if (!is_numeric($_GET['id'])){
    echo "You should send correct parameter. For example: ?id=5";
    exit;
}

if ($mysqli->connect_errno) {
    echo "Извините, возникла проблема на сайте";
    exit;
}

$sql = "DELETE FROM `Points` WHERE  `track_id`=$id;";


if (!$result = $mysqli->query($sql)) {
    echo "Извините, возникла вторая проблема в работе сайта.";
    exit;
}

echo "Трек очищен!";
