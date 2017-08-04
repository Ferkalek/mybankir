<?php
require_once "../includes/config.php";
$mysqli = new mysqli($host, $user, $password, $bd);
$mysqli->query("SET NAMES 'utf8'");

$user = $_POST["user"];
$table = $_POST["table"];
$id = $_POST["id_fp"];
$sum = $_POST["sum_fp"];
$data = $_POST["data_fp"];

if ($table == 'deposits') {
    $old_sum = $mysqli->query("SELECT `sum` FROM `deposits` WHERE `id` = '".$id."'");
    while (($row = $old_sum->fetch_assoc()) != false) {
        $new_sum = $row["sum"] + $sum;
    }

} else {
    $old_sum = $mysqli->query("SELECT `sum` FROM `credits` WHERE `id` = '".$id."'");
    while (($row = $old_sum->fetch_assoc()) != false) {
        $new_sum = $row["sum"] - $sum;
    }
}

$result_set = $mysqli->query("INSERT INTO `history` (`user`, `type_fp`, `id_fp`, `sum_fp`, `data_fp`) VALUES ('".$user."', '".$table."', '".$id."', '".$sum."', '".$data."')");
$result_set_fp = $mysqli->query("UPDATE `".$table."` SET `sum` = '".$new_sum."' WHERE `id` = '".$id."'");
$id_hi = $mysqli->insert_id;
if ($result_set) {
    $results = array(
        "class"=>"success",
        "text"=>"Платеж успешно добавлен!",
        "id"=>$id_hi,
        "sum"=>$sum,
        "data_hi"=>$data,
        "new_sum"=>$new_sum
    );
} else {
    $results = array("class"=>"dangerous", "text"=>"Не получилось добавить платеж!");
}
echo json_encode($results);
$mysqli->close();
exit();