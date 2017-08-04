<?php
require_once "../includes/config.php";
$mysqli = new mysqli($host, $user, $password, $bd);
$mysqli->query("SET NAMES 'utf8'");

$id = $_POST["id"];
$typeTable = $_POST["table"];
$name_bank = $_POST["bank"];
$sum = $_POST["sum"];
$period = $_POST["period"];
$percent = $_POST["percent"];
$reg_date = $_POST["reg_date"];

$result_set = $mysqli->query("UPDATE `".$typeTable."` SET `name_bank` = '".$name_bank."', `sum` = '".$sum."', `period` = '".$period."',`percent` = '".$percent."', `reg_date` = '".$reg_date."' WHERE `id` = '".$id."'");
if ($result_set) {
    $results = array("class"=>"success", "text"=>"Данные успешно изменены!");
} else {
    $results = array("class"=>"dangerous", "text"=>"Даныые не изменены!");
}
echo json_encode($results);
$mysqli->close();
exit();