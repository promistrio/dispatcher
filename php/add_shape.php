<?php
/**
 * Created by PhpStorm.
 * User: VLAD
 * Date: 10.02.2018
 * Time: 18:57
 */

include("open.php");

$mysqli = new mysqli($host, $login, $password, $db_name);

if ($mysqli->connect_errno) {
    echo "Извините, возникла проблема на сайте";
    exit;
}

header('Content-type: application/json');
$json = file_get_contents('php://input');
$json_decode = json_decode($json, true);
$json_encode = json_encode($json_decode);

//var_dump($json_decode);

echo $json_decode["name"];
echo $json_decode["height"];

$sql = "INSERT INTO `AviaLogs`.`Polygons` (`executor_id`, `height`) 
        VALUES (2, {$json_decode["height"]} );";
if (!$result = $mysqli->query($sql)) {
    echo "Извините, возникла вторая проблема в работе сайта. ". $mysqli->error;
    exit;
}

$last_id = $mysqli->insert_id;

foreach ($json_decode["coordinates"] as &$value) {
    echo "
    lat:" . $value["lat"] . "  lon:" . $value["lng"];

    $sql = "INSERT INTO `PolygonCoordinates` (`polygon_id`, `lat`, `lng`) VALUES (". $last_id .", "
                                                                                              . $value["lat"] .", "
                                                                                              . $value["lng"] .");";
    if (!$result = $mysqli->query($sql)) {
        echo "Извините, не удалось добавить координаты ". $mysqli->error;
        exit;
    }
}





//echo $json_encode;