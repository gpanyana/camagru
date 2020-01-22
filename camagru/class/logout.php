<?php
include('../class/DB.php');
include('../class/Login.php');

if (!Login::isLoggedIn()) {
	die("Not Logged in.");
}
if (isset($_POST['confirm'])) {

	if (isset($_POST['alldevices'])) {

	DB::query('DELETE FROM login_tokens WHERE userid=:userid', array(':userid'=>Login::isLoggedIn));
	
	} else {
		if (isset($_COOKIE['CID'])) {
			DB::query('DELETE FROM login_tokens WHERE token=token', array(':token'=>sha1($_COOKIE['CID'])));
		}
		setcookie('CID', '1', time()-3600);
	setcookie('CID_', '1', time()-3600);	
	}
}
?>
<html>
<h1>Log out of your Account?</h1>
<p>Are you sure you'd like to logout?</p>
<form action="logout.php" method="post">
	<input type="checkbox" name="alldevices" value="alldevices"> Logout of all devices? <br>
	<input type="submit" name="confirm" value="Confirm">
</form>
</html>