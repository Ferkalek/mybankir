<?php
$message = "<h1>Приветствуем, ".$login."!</h1><p>Ваша ссылка для смены пароля: <a href=\"http://mybankir.esy.es/cp.php?name=".$login."&pass=".$pass."\">http://mybankir.esy.es/cp.php?name=".$login."&pass=".$pass."</a></p><h2 style=\"margin-top: 20px\">С Уважением команда MyBankir.</h2>";
require_once 'email-config.php';