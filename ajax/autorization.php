<?php
session_start();
require_once '../includes/config.php';

$hash_pass = md5($pass);

function printResult($result_set) {
    while(($row = $result_set->fetch_assoc()) != false) {
        $GLOBALS["userName"] = $row["login"];
    }
}

$mysqli = new mysqli($host, $user, $password, $bd);
$mysqli->query("SET NAMES 'utf8'");
$result_set = $mysqli->query("SELECT `login` FROM `users` WHERE `login` = '$login' AND `pass` = '$hash_pass'");

if ($result_set->num_rows > 0) {
    printResult($result_set);
    $_SESSION["name"] = $userName;
    $results = array("class"=>"success", "text"=>"Авторизация прошла успешно!");
} else {
    $results = array("class"=>"dangerous", "text"=>"Неправильно указан логин или пароль!");
}

echo json_encode($results);
$mysqli->close();