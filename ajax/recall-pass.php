<?php
require_once '../includes/config.php';

function printResult($result_set) {
    while(($row = $result_set->fetch_assoc()) != false) {
        $GLOBALS["userName"] = $row["login"];
        $GLOBALS["userPass"] = $row["pass"];
    }
}

$mysqli = new mysqli($host, $user, $password, $bd);
$mysqli->query("SET NAMES 'utf8'");
$result_set = $mysqli->query("SELECT `login`, `pass` FROM `users` WHERE `email` = '$email'");

if ($result_set->num_rows > 0) {
    printResult($result_set);
    $login = $userName;
    $pass = $userPass;
    $results = array("class"=>"success", "text"=>"Запрос успешно выполнен!", "message"=>"Ваши данные для входа в учетную запись отправлены вам на почту.");
    require_once '../includes/email-recall.php';
} else {
    $results = array("class"=>"dangerous", "text"=>"Пользователь с таким email не зарегистрирован!");
}
echo json_encode($results);
$mysqli->close();