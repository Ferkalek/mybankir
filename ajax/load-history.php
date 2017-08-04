<?php
require_once "../includes/config.php";
$mysqli = new mysqli($host, $user, $password, $bd);
$mysqli->query("SET NAMES 'utf8'");

$user = $_POST["user"];
$typeTable = $_POST["table"];
$id = $_POST["id_fp"];


$result_set = $mysqli->query("SELECT `id`,`sum_fp`,`data_fp` FROM `history` WHERE `user` = '".$user."' AND `type_fp` = '".$typeTable."' AND `id_fp` = '".$id."'");

if ($result_set->num_rows > 0) {
    $i = 1;
    while (($row = $result_set->fetch_assoc()) != false) {
        echo "<tr><td><input type='text' hidden value='".$row["id"]."'>";
        echo "<span>".$i."</span></td>";
        echo "<td>".$row["data_fp"]."</td><td>".$row["sum_fp"]."</td>";
        echo "<td><div class='btn-group'><button class='btn btn-default edit-hi has-tultip' type='button' data-tultip='Изменить запись'><i class='fa fa-pencil-square-o'></i></button>";
        echo "<button class='btn btn-default trash-hi has-tultip' type='button' data-tultip='Удалить запись'><i class='fa fa-trash-o'></i></button></div></td></tr>";
        $i++;
    }
} else {
    echo "<tr><td colspan='4' class='text-center not-data'>У вас пока нет платежей!</td></tr>";
}
echo json_encode($results);
$mysqli->close();
exit();