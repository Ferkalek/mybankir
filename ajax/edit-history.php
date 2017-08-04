<?php
require_once "../includes/config.php";
$mysqli = new mysqli($host, $user, $password, $bd);
$mysqli->query("SET NAMES 'utf8'");

$user = $_POST["user"];
$table = $_POST["table"];
$id = $_POST["id_fp"];
$id_hi = $_POST["id_hi"];
$sum = $_POST["sum_fp"];
$data = $_POST["data_fp"];
$old_sum_hi = $_POST["old_sum_hi"];

if ($table == 'deposits') {
    $old_sum = $mysqli->query("SELECT `sum` FROM `deposits` WHERE `id` = '".$id."'");
    while (($row = $old_sum->fetch_assoc()) != false) {
        $new_sum = $row["sum"] - $old_sum_hi + $sum;
    }
} else {
    $old_sum = $mysqli->query("SELECT `sum` FROM `credits` WHERE `id` = '".$id."'");
    while (($row = $old_sum->fetch_assoc()) != false) {
        $new_sum = $row["sum"] + $old_sum_hi - $sum;
    }
}

$result_set = $mysqli->query("UPDATE `history` SET `user` = '".$user."', `type_fp` = '".$table."', `id_fp` = '".$id."',`sum_fp` = '".$sum."', `data_fp` = '".$data."' WHERE `id` = '".$id_hi."'");
$result_set_fp = $mysqli->query("UPDATE `".$table."` SET `sum` = '".$new_sum."' WHERE `id` = '".$id."'");
if ($result_set && $result_set_fp) {
    $results = array("class"=>"success","new_sum"=>$new_sum);
} else {
    $results = array("class"=>"dangerous", "text"=>"Ошибка. Запись платежа не была изменена!");
}
echo json_encode($results);
$mysqli->close();
exit();