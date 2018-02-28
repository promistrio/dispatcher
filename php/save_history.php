<?php
/**
 * Created by PhpStorm.
 * User: Владислав Буздин
 * Date: 26.02.2018
 * Time: 13:38
 */

header('Content-Type: text/html; charset=utf-8');

include("open.php");

$mysqli = new mysqli($host, $login, $password, $db_name);

if ($mysqli->connect_errno) {
    echo "Извините, возникла проблема на сайте";
    exit;
}

$sql = "SELECT track_id, lat, lng, alt, date, prefix, speed, course, cloud  FROM Points ORDER BY track_id, date";

/* and date >= DATE_SUB( NOW( ) , INTERVAL 2 HOUR ) */
if (!$result = $mysqli->query($sql)) {
    echo "Извините, возникла вторая проблема в работе сайта.";
    exit;
}


$last_date  = false;
$last_id = 0;

$id_for_save = [];

while ($point = $result->fetch_assoc()) {


    $current_date = strtotime($point['date']);

   // echo "$last_id.== false || last_id !=" . $point['track_id'] ."<br>";

    if( ($last_date == false) || ($last_id != $point['track_id']) ){
        $last_id = $point['track_id'];
        $last_date = $current_date;
    }
    else{

        //echo $last_id ." == " . $point['track_id'];

        $interval = ($current_date - $last_date) / 60;


        if ($interval > 10){
            //echo $interval . "минут " .$point['track_id']  . " " . $point['lat']. "   " . $point['lng'] . "    " . $point['alt']. " " . c . "<br>";
            array_push($id_for_save, array(
                'track_id' => $point['track_id'],
                'diff' => date('Y/m/d H:i:s', $current_date)
            ));
        }

        $last_date = $current_date;
    }
}

$dates = json_encode($id_for_save);

echo $dates;

