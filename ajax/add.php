<?php
require_once "../includes/config.php";
$mysqli = new mysqli($host, $user, $password, $bd);
$mysqli->query("SET NAMES 'utf8'");
$login = $_POST["user"];
$typeTable = $_POST["table"];
$name_bank = $_POST["name_bank"];
$sum = $_POST["sum"];
$period = $_POST["period"];
$percent = $_POST["percent"];
$reg_date = $_POST["reg_date"];

$result_set = $mysqli->query("INSERT INTO `".$typeTable."` (`login`, `name_bank`,`sum`,`period`,`percent`,`reg_date`)
VALUES ('".$login."', '".$name_bank."', '".$sum."', '".$period."', '".$percent."', '".$reg_date."')");
$id = $mysqli->insert_id;
if ($result_set) {
    $results = array(
        "class"=>"success",
        "text"=>"Запись успешно добавлена!",
        "id"=>$id,
        "name_bank"=>$name_bank,
        "sum"=>$sum,
        "period"=>$period,
        "percent"=>$percent,
        "reg_date"=>$reg_date
    );
} else {
    $results = array("class"=>"dangerous", "text"=>"Не получилось добавить запись!");
}
echo json_encode($results);
$mysqli->close();
exit();