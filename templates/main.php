<?php
session_start();

$host = "localhost";
$user = "u564743956_myban";
$password = "N9w[gP7O7@";
$bd = 'u564743956_banki';
$mysqli = new mysqli($host, $user, $password, $bd);
$mysqli->query("SET NAMES 'utf8'");

function printResultDep($result_set) {
    if ($result_set->num_rows > 0) {
        while (($row = $result_set->fetch_assoc()) != false) {
            echo "<tr><td><input type='text' hidden value='".$row["id"]."'>";
            echo "<span>".$row["name_bank"]."</span></td>";
            echo "<td>".$row["sum"]."</td><td>".$row["period"]."</td>";
            echo "<td>".$row["percent"]."</td><td>".$row["reg_date"]."</td>";
            echo "<td><div class='btn-group'><button class='btn btn-default edit has-tultip' type='button' data-tultip='Изменить запись'><i class='fa fa-pencil-square-o'></i></button>";
            echo "<button class='btn btn-default  inf has-tultip' type='button' data-tultip='Посмотреть информацию'><i class='fa fa-info'></i></button>";
            echo "<button class='btn btn-default trash has-tultip' type='button' data-tultip='Удалить запись'><i class='fa fa-trash-o'></i></button></div></td></tr>";
        }
    } else {
        echo "<tr><td colspan='6' class='text-center not-data'>У вас пока нет депозитов!</td></tr>";
    }
}

function printResultCredit($result_set_cr) {
    if ($result_set_cr->num_rows > 0) {
        while (($row = $result_set_cr->fetch_assoc()) != false) {
            echo "<tr><td><input type='text' hidden value='".$row["id"]."'>";
            echo "<span>".$row["name_bank"]."</span></td>";
            echo "<td>".$row["sum"]."</td><td>".$row["period"]."</td>";
            echo "<td>".$row["percent"]."</td><td>".$row["reg_date"]."</td>";
            echo "<td><div class='btn-group'><button class='btn btn-default edit has-tultip' type='button' data-tultip='Изменить запись'><i class='fa fa-pencil-square-o'></i></button>";
            echo "<button class='btn btn-default inf has-tultip' type='button' data-tultip='Посмотреть информацию'><i class='fa fa-info'></i></button>";
            echo "<button class='btn btn-default trash has-tultip' type='button' data-tultip='Удалить запись'><i class='fa fa-trash-o'></i></button></div></td></tr>";
        }
    } else {
        echo "<tr><td colspan='6' class='text-center not-data'>У вас пока нет кредитов!</td></tr>";
    }
}

$result_set = $mysqli->query("SELECT `id`, `name_bank`, `sum`, `period`, `percent`, `reg_date` FROM `deposits` WHERE `login` = '".$_SESSION["name"]."'");
$result_set_cr = $mysqli->query("SELECT `id`, `name_bank`, `sum`, `period`, `percent`, `reg_date` FROM `credits` WHERE `login` = '".$_SESSION["name"]."'");

$mysqli->close();
?>

<header class="main-header">
    <nav class="navbar navbar-static-top" role="navigation">
        <ul class="calc">
            <li><i class="fa fa-calculator" aria-hidden="true"></i></li>
            <li><a href="deposit-calc.php">Депозитный</a></li>
            <li><a href="credit-calc.php">Кредитный</a></li>
        </ul>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="user"><?=$_SESSION["name"];?></li>
                <li><a href="logout.php">Выйти</a></li>
            </ul>
        </div>
    </nav>
</header>
<div class="container data-content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Депозиты</h3>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover deposits" data-table="deposits">
                <tr>
                    <th>Название банка</th>
                    <th>Сумма депозита</th>
                    <th>Срок (в мес.)</th>
                    <th>Годовой процент</th>
                    <th>Дата оформления</th>
                    <th></th>
                    <?php printResultDep($result_set);?>
            </table>
        </div>
        <div class="box-footer">
            <button class="btn btn-primary pull-right" id="add-dep">Добавить депозит</button>
        </div>
    </div>

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Кредиты</h3>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover credits" data-table="credits">
                <tr>
                    <th>Название банка</th>
                    <th>Сумма кредита</th>
                    <th>Срок (в мес.)</th>
                    <th>Годовой процент</th>
                    <th>Дата оформления</th>
                    <th></th>
                    <?php printResultCredit($result_set_cr);?>
            </table>
        </div>
        <div class="box-footer">
            <button class="btn btn-primary pull-right" id="add-credit">Добавить кредит</button>
        </div>
    </div>
    <div class="shar-wrap">
        <script type="text/javascript">
            (function() {
                if (window.pluso)if (typeof window.pluso.start == "function") return;
                if (window.ifpluso==undefined) { window.ifpluso = 1;
                    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                    var h=d[g]('body')[0];
                    h.appendChild(s);
                }})();
        </script>
        <div class="pluso" data-background="#ebebeb"
             data-options="medium,square,line,vertical,nocounter,theme=04"
             data-services="vkontakte,odnoklassniki,facebook,twitter,google,linkedin,moimir,email"
             data-title="My Bankir"
             data-description="Простой и удобный сервис для ведения учета финансовых продуктов, а также планирования будущих расходов и затрат"
             data-url="http://mybankir.esy.es/">
        </div>
    </div>
</div>
<?php include_once 'modal.php';?>