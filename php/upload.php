<?

include("open.php");

$mysqli = new mysqli($host, $login, $password, $db_name);

if ($mysqli->connect_errno) {
    $content .= "Извините, возникла проблема на сайте";
    exit;
}

    $content = "";

    $content .= "preview_path: " . (isset($_POST['preview_path']) ? $_POST['preview_path'] : "not set") . "\r\n";
    $content .=  "preview_file exists: " . (isset($_POST['preview_file']) ?  "true" : "false" ). "\r\n";
    //$content .= "preview_file content: " . $_POST['preview_file'];

    $content .= "������ " . $_POST['lat'] . "\r\n";
    $content .= "������� " .$_POST['lon'] . "\r\n";


$sql = "INSERT INTO `Photos` (`lat`, `lon`) VALUES ({$_POST['lat']}, {$_POST['lon']});";


if (!$result = $mysqli->query($sql)) {
    $content .= "Извините, возникла вторая проблема в работе сайта. ". $mysqli->error;
    exit;
}

$last_id = $mysqli->insert_id;


file_put_contents("../photo/$last_id.jpg", $_POST['preview_file'], FILE_APPEND | LOCK_EX);


echo $content;
$file = "output.txt";
file_put_contents($file, $content, FILE_APPEND | LOCK_EX);