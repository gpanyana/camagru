<?php
include('../class/DB.php');

if (isset($_POST['resetpassword'])) {

	$cstrong = True;
	$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong ));

}

?>
<h1>Forgot Password</h1>
<form action="forgot_password.php" method="post">
	<input type="text" name="email" value="" placeholder="Email ..">
	<input type="submit" name="resetpassword" value="Reset Password">
</form>
