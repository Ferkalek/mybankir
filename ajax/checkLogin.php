<?php
require_once '../includes/config.php';

$mysqli = new mysqli($host, $user, $password, $bd);
$mysqli->query("SET NAMES 'utf8'");
$result_set = $mysqli->query("SELECT `login` FROM `users` WHERE `login` = '$login'");

if ($result_set->num_rows > 0) {
    $results = array("disabled"=>true, "text"=>"Пользователь с таким логином существует!");
} else {
    $results = array("disabled"=>false);
}

echo json_encode($results);
$mysqli->close();