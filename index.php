<?php
session_start();
if (isset($_SESSION["name"])) {
    $title = "Контентная страница";
    require_once 'templates/header.php';
    require_once 'templates/main.php';
} else {
    $title = "Главная | My Bankir";
    require_once 'templates/header.php';
    ?>
    <div class="main-screen">
        <h1>My Bankir</h1>
        <p class="lead">Это простой и удобный сервис для ведения учета финансовых продуктов, а также для планирования будущих расходов и затрат с помощью финансовых калькуляторов.</p>
        <button type="button" class="btn btn-primary btn-start">Попробовать</button>
    </div>
<?php }
require_once 'templates/footer.php';?>