<?php
// Параметры для подключения
$host = "localhost";
$user = "u564743956_myban";
$password = "N9w[gP7O7@";
$bd = 'u564743956_banki';

//создание переменных
$login = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$pass = htmlspecialchars($_POST["pass"]);