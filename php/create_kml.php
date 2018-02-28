<?php
/**
 * Created by PhpStorm.
 * User: Владислав Буздин
 * Date: 20.01.2018
 * Time: 18:22
 */


$json = file_get_contents('php://input');
$json_decode = json_decode($json, true);
$json_encode = json_encode($json_decode);


/*foreach ($json_decode as &$item) {
    echo $item['id'];
    foreach ( $item['coordinates'] as  &$val)
        echo " " . $val['lat'] . " " . $val['lon'];

}

echo "--------------";
echo $json_encode;*/


$kml_start = '<?xml version="1.0" encoding="UTF-8"?>
<kml xmlns="http://earth.google.com/kml/2.2">
    <Document>';

$kml_end = '
    </Document>
</kml>';

$polygon_start = '
        <Placemark>
            <Polygon>
                <outerBoundaryIs>
                    <LinearRing>
                        <coordinates>
                        ';

$polygon_end = '
                        </coordinates>
                    </LinearRing>
                </outerBoundaryIs>
            </Polygon>
        </Placemark>';

$tab = "    ";

$kml = $kml_start;

foreach ($json_decode as &$item) {
    //echo $item['id']; в данном запросе хранится номер полигона
    $kml .= $polygon_start;
    foreach ($item['coordinates'] as &$val) {
        $kml .= $val['lon'] . "," . $val['lat'] . "," . "0
        ";
    }
    $kml .= $polygon_end;
}

$kml .= $kml_end;



$fp = fopen("file.kml", "w");

// записываем в файл текст
fwrite($fp, $kml);

// закрываем
fclose($fp);

echo "KML - Файл готов!";