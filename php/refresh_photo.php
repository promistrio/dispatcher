<?php
/**
 * Created by PhpStorm.
 * User: Владислав Буздин
 * Date: 25.02.2018
 * Time: 10:40
 */

header('Content-Type: text/html; charset=utf-8');

include("open.php");

$mysqli = new mysqli($host, $login, $password, $db_name);

if ($mysqli->connect_errno) {
    echo "Извините, возникла проблема на сайте";
    exit;
}

$sql = "SELECT id, lat, lon FROM Photos";
if (!$result = $mysqli->query($sql)) {
    echo "Извините, возникла вторая проблема в работе сайта.";
    exit;
}

$UAVs = array();
while ($point = $result->fetch_assoc()) {
    array_push($UAVs,
        array('id' => $point['id'],
            'lat' => $point['lat'],
            'lng' => $point['lon']
        ));
}

$UAVs = json_encode($UAVs);

echo $UAVs;