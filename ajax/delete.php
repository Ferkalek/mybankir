<?php
require_once "../includes/config.php";
$mysqli = new mysqli($host, $user, $password, $bd);
$mysqli->query("SET NAMES 'utf8'");
if(isset($_POST["recordToDelete"]) && strlen($_POST["recordToDelete"]) > 0 && is_numeric($_POST["recordToDelete"])) {
    $idToDelete = $_POST["recordToDelete"];
    $typeTable = $_POST["typeTable"];
	if(!$mysqli->query("DELETE FROM `".$typeTable."` WHERE `id` =".$idToDelete)) {
        $results = array("class"=>"dangerous", "text"=>"При удалении данных произошла ошибка!");
	}
    $results_hi = $mysqli->query("DELETE FROM `history` WHERE `id_fp` ='".$idToDelete."'");
    $results = array("class"=>"success", "text"=>"Запись успешно удалена!");
} else {
    $results = array("class"=>"dangerous", "text"=>"Произошла ошибка!");
}
echo json_encode($results);
$mysqli->close();
exit();