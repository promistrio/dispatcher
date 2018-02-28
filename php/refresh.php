<?php


header('Content-Type: text/html; charset=utf-8');

$regular = "";
if ($_GET['plane'] == true){
    $regular .= "0,";
}
if ($_GET['copter'] == true){
    $regular .= "2,";
}
if ($_GET['geoscan'] == true){
    $regular .= "3,";
}
if ($_GET['emulator'] == true){
    $regular .= "4,";
}
if ($_GET['operator'] == true){
    $regular .= "5,";
}
if ($regular == ""){
   $regular = "10";
}

$regular = substr($regular, 0, -1);

$airframe = array('P', 'B', 'K', 'G', '*',  'O');

include("open.php");

$mysqli = new mysqli($host, $login, $password, $db_name);

if ($mysqli->connect_errno) {
    echo "Извините, возникла проблема на сайте";
    exit;
}
// date >= DATE_SUB( NOW( ) , INTERVAL 2 HOUR) and
$sql = "SELECT DISTINCT track_id FROM Points
        WHERE date >= DATE_SUB( NOW( ) , INTERVAL 2 HOUR) and prefix IN($regular)";

if (!$result = $mysqli->query($sql)) {
    echo "Извините, возникла вторая проблема в работе сайта.";
    exit;
}

$UAVs = array();
while ($point = $result->fetch_assoc()) {
    array_push($UAVs, array(
        'track_id' => $point['track_id'],
        'coordinates' => array()
    ));
}

foreach ($UAVs as &$track) {
    $id = $track['track_id'];

    // and date >= DATE_SUB( NOW( ) , INTERVAL 2 HOUR )

    $sql = "SELECT track_id, lat, lng, CEILING(alt) as alt, TIME(`date`) as date, prefix, speed, course, cloud  FROM Points WHERE track_id = $id  and date >= DATE_SUB( NOW( ) , INTERVAL 2 HOUR )";

    /* and date >= DATE_SUB( NOW( ) , INTERVAL 2 HOUR ) */
    if (!$result = $mysqli->query($sql)) {
        echo "Извините, возникла вторая проблема в работе сайта.";
        exit;
    }


    while ($point = $result->fetch_assoc()) {

        $c = $point['cloud'];
        $cloud = $point['cloud'];
        if ($c == 0.5) {
            $cloud = 1;
        } elseif ($c == 1) {
            $cloud = 2;
        }

        array_push($track['coordinates'], array(
            'lat' => $point['lat'],
            'lng' => $point['lng'],
            'alt' => $point['alt'],
            'date' => $point['date'],
            'prefix' => $airframe[$point['prefix']],
            'speed' => $point['speed'],
            'course' => $point['course'],
            'cloud' => $cloud
        ));
    }
}


/*
//SELECT * FROM Points WHERE date > '2018-01-15 00:00:00';
$sql = "SELECT track_id, lat, lng, alt, date, speed, course, cloud  FROM Points ORDER BY track_id;";


$UAVs = array();

$last_id = -1;

$post_data = array();

$coordinates = array();

while ($point = $result->fetch_assoc()) {

    if ($last_id != $point['track_id']) {

        $last_id = $point['track_id'];

        if (last_id == -1){
            continue;
        }

        echo "count: " . count($coordinates) . "<br>";

        $coordinates = array();
        array_push($coordinates, array(
            'lat' => $point['lat'],
            'lng' => $point['lng'],
            'alt' => $point['alt'],
            'date' => $point['date'],
            'speed' => $point['speed'],
            'course' => $point['course'],
            'cloud' => $point['cloud']
        ));

        $post_data = array(
            'track_id' => $point['track_id']
            );
        array_push($UAVs, $post_data);
    }

    else {
        //echo $point['track_id'] . "<br>";
        $coord = array(
            'lat' => $point['lat'],
            'lng' => $point['lng'],
            'alt' => $point['alt'],
            'date' => $point['date'],
            'speed' => $point['speed'],
            'course' => $point['course'],
            'cloud' => $point['cloud']
        );

        //echo $coord . "<br>";

        array_push($coordinates, $coord);
    }
}
*/
$UAVs = json_encode($UAVs);

echo $UAVs;
