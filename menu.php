<?php
header("Content-Type: application/json; charset=UTF-8");

$obj = json_decode($_POST['x'], true);

define('HOST', "localhost");
define('USER', "root");
define('PW', "");
define('AB', "json_gyakorlas");

$kapcs = mysqli_connect(HOST, USER, PW, AB);
if (!$kapcs) {
    die(mysqli_connect_error());
}
mysqli_query($kapcs,"SET NAMES utf8");

$table = $obj['table'];
$limit = $obj['limit'];

$query = "SELECT * FROM " . $table . " LIMIT " .$limit;
$result = mysqli_query($kapcs, $query);
$output = mysqli_fetch_all($result);
$veg = json_encode($output);

echo $veg;