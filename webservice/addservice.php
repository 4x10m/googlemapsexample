<?php
include_once 'common.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$name = isset($_GET['name']) ? $_GET['name'] : null;
$description = isset($_GET['description']) ? $_GET['description'] : null;
$adress = isset($_GET['adress']) ? $_GET['adress'] : null;
$latitude = isset($_GET['latitude']) ? $_GET['latitude'] : null;
$longitude = isset($_GET['longitude']) ? $_GET['longitude'] : null;
$tags = isset($_GET['tags']) ? $_GET['tags'] : null;

$query = "insert into tp4service values('" . $name . "', '" . $description . "', '" . $adress . "', '" . $latitude . "', '" . $longitude . "', '" . $tags . "')";

if (isset($name, $description, $adress, $latitude, $longitude, $tags)) {
	$database = new PDO(sprintf('mysql:host=%s;dbname=%s', $databasehostname, $databasename), $databaseusername, $databasepassword) or die;

	$database->query($query);

	echo json_encode(array("status" => true));
}
?>