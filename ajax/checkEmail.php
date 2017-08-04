<?php
require_once '../includes/config.php';

$mysqli = new mysqli($host, $user, $password, $bd);
$mysqli->query("SET NAMES 'utf8'");
$result_set = $mysqli->query("SELECT `email` FROM `users` WHERE `email` = '$email'");

if ($result_set->num_rows > 0) {
    $results = array("disabled"=>true, "text"=>"Пользователь с таким email существует!");
} else {
    $results = array("disabled"=>false);
}

echo json_encode($results);
$mysqli->close();