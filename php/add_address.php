<?php
/**
 * Created by PhpStorm.
 * User: Владислав Буздин
 * Date: 19.02.2018
 * Time: 7:01
 */


include("open.php");

$id = $_GET['id'];
$lat = $_GET['lat'];
$lng = $_GET['lon'];
$number = $_GET['number'];

if (!isset($_GET['prefix']))
    $prefix = 0;

if (!isset($_GET['id']) ||
    !isset($_GET['lat']) ||
    !isset($_GET['lon']) ||
    !isset($_GET['number']) ) {
    echo "You should send all parameters. For example: ?id=5&lat=53&lon=36&number=40 <br /> optional: &prefix=G";
    exit;
}


$mysqli = new mysqli($host, $login, $password, $db_name);

if ($mysqli->connect_errno) {
    echo "Извините, возникла проблема на сайте";
    exit;
}

$sql = "INSERT INTO `Addresses` (`user_id`, `lat`, `lng`, `address`) VALUES ($id, $lat, $lng, '$number');";


if (!$result = $mysqli->query($sql)) {
    echo "Извините, возникла вторая проблема в работе сайта. ". $mysqli->error;
    exit;
}

echo "OK";