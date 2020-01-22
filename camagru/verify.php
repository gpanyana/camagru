<?php
require_once 'class/DB.php';

if (isset($_GET['u'])) {
	$v = $_GET['u'];
	DB::query('UPDATE users SET verified=\'T\' WHERE username=:username', array('username'=>$v));
		header('location: login.php');
} else {
    echo "please click on the link sent to your email to verify your account";
}
?>
