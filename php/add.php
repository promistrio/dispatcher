<?php

// Warning! SQL injection! Need fix

header('Content-Type: text/html; charset=utf-8');

include("open.php");

$mysqli = new mysqli($host, $login, $password, $db_name);


$id = $_GET['id'];
$lat = $_GET['lat'];
$lng = $_GET['lon'];
$alt = $_GET['alt'];
$speed = $_GET['speed'];
$course = $_GET['course'];
$cloud = $_GET['cloud'];
$prefix = $_GET['prefix'];

if (!isset($_GET['prefix']))
    $prefix = 0;

if (!isset($_GET['id']) ||
    !isset($_GET['lat']) ||
    !isset($_GET['lon']) ||
    !isset($_GET['alt']) ||
    !isset($_GET['speed']) ||
    !isset($_GET['course']) ||
    !isset($_GET['cloud'])) {
    echo "You should send all parameters. For example: ?id=5&lat=53&lon=36&alt=260&speed=40&course=18&cloud=0 <br /> optional: &prefix=G";
    exit;
}

if ($mysqli->connect_errno) {
    echo "Извините, возникла проблема на сайте";
    exit;
}

$sql = "INSERT INTO `Points` (`track_id`, `lat`, `lng`, `alt`, `speed`, `course`, `cloud`, `prefix`)".
       "VALUES ($id, $lat, $lng, $alt, $speed, $course, $cloud, $prefix);";

if (!$result = $mysqli->query($sql)) {
    echo "Извините, возникла вторая проблема в работе сайта. ". $mysqli->error;
    exit;
}

echo "OK <br /> <br />";
echo $sql . " <br / > <br />";
echo "id:" . $_GET['id'] , "<br />";
echo "lat:" . $_GET['lat'] . "<br />";
echo "lon:" . $_GET['lon'] . "<br />";
echo "alt:" . $_GET['alt'] . "<br />";
echo "speed:" . $_GET['speed'] . "<br />";
echo "course:" . $_GET['course'] . "<br />";
echo "cloud:" . $_GET['cloud'];
