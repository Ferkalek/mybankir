<?php
require_once "../includes/config.php";
$mysqli = new mysqli($host, $user, $password, $bd);
$mysqli->query("SET NAMES 'utf8'");

$table = $_POST["table"];
$id = $_POST["id_fp"];
$id_hi = $_POST["id_hi"];
$sum = $_POST["sum_hi"];

if(isset($id_hi) && strlen($id_hi) > 0 && is_numeric($id_hi)) {
	if(!$mysqli->query("DELETE FROM `history` WHERE `id` = '".$id_hi."'")) {
        $results = array("class"=>"dangerous", "text"=>"При удалении данных произошла ошибка!");
	} else {

        if ($table == 'deposits') {
            $old_sum = $mysqli->query("SELECT `sum` FROM `deposits` WHERE `id` = '".$id."'");
            while (($row = $old_sum->fetch_assoc()) != false) {
                $new_sum = $row["sum"] - $sum;
            }
        } else {
            $old_sum = $mysqli->query("SELECT `sum` FROM `credits` WHERE `id` = '".$id."'");
            while (($row = $old_sum->fetch_assoc()) != false) {
                $new_sum = $row["sum"] + $sum;
            }
        }

        $result_set_fp = $mysqli->query("UPDATE `".$table."` SET `sum` = '".$new_sum."' WHERE `id` = '".$id."'");
        $results = array("class"=>"success", "text"=>"Запись успешно удалена!", "new_sum"=>$new_sum);
    }
} else {
    $results = array("class"=>"dangerous", "text"=>"Произошла ошибка!");
}
echo json_encode($results);
$mysqli->close();
exit();