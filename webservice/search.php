<?php
include_once 'common.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$value = isset($_GET['value']) ? $_GET['value'] : "";

$query = "select * from tp4service where name like '%" . $value . "%'";

$database = new PDO(sprintf('mysql:host=%s;dbname=%s', $databasehostname, $databasename), $databaseusername, $databasepassword) or die;

$database->query("SET NAMES 'utf8'");
$data = $database->query($query)->fetchAll();

echo (json_encode(array("status" => true, "values" => $data)));
?>