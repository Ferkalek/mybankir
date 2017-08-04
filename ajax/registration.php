<?php
session_start();
require_once '../includes/config.php';

$hash_pass = md5($pass);

$mysqli = new mysqli($host, $user, $password, $bd);
$mysqli->query("SET NAMES 'utf8'");
$result_set = $mysqli->query("INSERT INTO `users` (`login`,`pass`,`email`) VALUES ('$login', '$hash_pass', '$email')");

if ($result_set) {
    $results = array("class"=>"success", "text"=>"Регистрация прошла успешно!", "message"=>"Вам на почту отправлены ваши данные для входа в учетную запись.");
    $_SESSION["name"] = $login;
    require_once '../includes/email.php';
} else {
    $results = array("class"=>"dangerous", "text"=>"При регистрации произошла ошибка!");
}
echo json_encode($results);
$mysqli->close();