<?php
require_once '../includes/config.php';

$hash_pass = md5($pass);

$mysqli = new mysqli($host, $user, $password, $bd);
$mysqli->query("SET NAMES 'utf8'");
$result_set = $mysqli->query("UPDATE `users` SET `pass` = '".$hash_pass."'  WHERE `login` = '".$login."'");

if ($result_set) {
    $results = array("class"=>"success", "text"=>"Пароль успешно изменен!");
} else {
    $results = array("class"=>"dangerous", "text"=>"Произошла ошибка при изменении пароля!");
}
if (isset($_SESSION["name"])) {
    session_destroy();
}
echo json_encode($results);
$mysqli->close();
exit();