<?php
session_start();
$title = "Смена пароля";
require_once 'templates/header.php';
?>
<div class="register-box">
    <div class="register-logo">My <b>Bankir</b></div>
    <div class="register-box-body">
        <p class="login-box-msg">Смена пароля</p>
        <div class="form-wrapper">
            <form action="" autocomplete="off">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="name" id="name" value="<?=$_SESSION["name"];?>" disabled>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control required" name="pass" id="pass" placeholder="Новый пароль">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <p class="text-help text-danger"></p>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control required" name="pass1" id="pass1" placeholder="Подтвердить пароль">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <p class="text-help text-danger"></p>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="button" class="btn btn-primary btn-flat pull-right" id="change-pass">Сменить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once 'templates/footer.php';?>