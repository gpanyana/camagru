<?php
include('../class/DB.php');
include('../class/Login.php');

if (Login::isLoggedIn()) {

	if (isset($_POST['changepassword'])) {

		$oldpassword = $_POST['oldpassword'];
		$newpassword = $_POST['newpassword'];
		$newpasswordrepeat = $_POST['newpasswordrepeat'];
		$userid = Login::isLoggedIn();

		if (password_verify($oldpassword, DB::query('SELECT password FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['password']))

			if ($newpassword == $newpasswordrepeat) {
			
				if (strlen($newpassword) >= 6 && strlen($newpassword) <= 50) {
				
					DB::query('UPDATE users SET password=:newpassword WHERE id =:userid', array(':newpassword'=password_hash($newpassword, PASSWORD_BCRYPT), ':userid'=>$userid));
					echo 'Password changed successfully!';
				}

			} else {
				echo 'Passswords don\'t match';
			}
	} else {
		echo 'Incorrect old password';
	}
} else {
	 die ('Not Logged In');
}

?>
<h1>Change your password.</h1>
<form action="change_password.php" method="post">
<input type="password" name="oldpassword" value="" placeholder="Current">
<input type="password" name="newpassword" value="" placeholder="New Password ..">
<input type="password" name="newpasswordrepeat" value="" placeholder="Repeat Password">
<input type="submit" name="changepassword" value="Change Password">
</form>