<?php
$to = $email;
$from = "ferkalek.anton@gmail.com";
$subject = "Мой банкир - ваши данные для входа в учетную запись!";
$subject = "=?utf-8?B?".base64_encode($subject)."?=";
$headers = "From: $from\r\nReply-to: $from\r\nContent-type: text/html; charset=utf-8\r\n";
mail ($to, $subject, $message, $headers);