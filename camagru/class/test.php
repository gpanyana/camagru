<?php
include ('DB.php');

$username="LeboM";
$data= DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))[0]['username'];
print_r($data);
?>