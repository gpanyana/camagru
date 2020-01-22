<?php
$to = "gcina@mailinator.com";
$sub = "testing";
$msg = "hello gel";
$headers = 'From: camagru.com' ."\r\n";
$headers .= 'MIME-version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
mail($to, $sub, $msg, $headers);
echo "sent";
?>
