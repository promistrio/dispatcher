<?php
/**
 * Created by PhpStorm.
 * User: VLAD
 * Date: 08.02.2018
 * Time: 9:23
 */

header('Content-Type: text/html; charset=utf-8');

$airframe = array('P', 'B', 'K', 'G', '*',  'F');

include("open.php");

$mysqli = new mysqli($host, $login, $password, $db_name);

if ($mysqli->connect_errno) {
    echo "Извините, возникла проблема на сайте";
    exit;
}

$sql = "SELECT
Polygons.id,
Polygons.height,
Executors.name

FROM Polygons
LEFT JOIN Executors ON ( Polygons.executor_id = Executors.id )";
if (!$result = $mysqli->query($sql)) {
    echo "Извините, возникла вторая проблема в работе сайта.";
    exit;
}

$Polygons = array();
while ($point = $result->fetch_assoc()) {
   // echo $point['id'] . " " . $point['height'] . " " . $point['name'];
    array_push($Polygons, array(
        'id' => $point['id'],
        'height' => $point['height'],
        'name' => $point['name'],
        'coordinates' => array()
    ));
}

foreach ($Polygons as &$track) {
    $id = $track['id'];


    $sql = "SELECT polygon_id,
        lat,
        lng 
        FROM PolygonCoordinates 
        WHERE polygon_id = $id
        ORDER BY polygon_id";

    /* and date >= DATE_SUB( NOW( ) , INTERVAL 2 HOUR ) */
    if (!$result = $mysqli->query($sql)) {
        echo "Извините, возникла вторая проблема в работе сайта.";
        exit;
    }


    while ($point = $result->fetch_assoc()) {
        array_push($track['coordinates'], array(
            'lat' => $point['lat'],
            'lng' => $point['lng'],
        ));
    }
}

$Polygons = json_encode($Polygons);

echo $Polygons;