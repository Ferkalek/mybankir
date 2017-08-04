<?php
session_start();
$host = "localhost";
$user = "u564743956_myban";
$password = "N9w[gP7O7@";
$bd = 'u564743956_banki';

$login = htmlspecialchars($_GET["name"]);
$pass = htmlspecialchars($_GET["pass"]);

function printResult($result_set) {
    while(($row = $result_set->fetch_assoc()) != false) {
        $GLOBALS["userName"] = $row["login"];
    }
}

$mysqli = new mysqli($host, $user, $password, $bd);
$mysqli->query("SET NAMES 'utf8'");
$result_set = $mysqli->query("SELECT `login` FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");

if ($result_set->num_rows > 0) {
    printResult($result_set);
    $_SESSION["name"] = $userName;
    $mysqli->close();
    header("Location: change-pass.php");
    exit();
} else {
    header("Location: /");
    exit();
}
