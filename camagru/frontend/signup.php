<?php
	include 'signup_inc.php';
?>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title> Sign up </title>
</head>
?php if(isset($result)) echo $result; ?>
<form action="signup.inc.php" method="POST">
	<h1 align="center"> ..Sign Up.. </h1>
	<hr>
	<h3 font="arial"> Please fill in details below: </h3>
	Username: <br>
	<input type="text" name="username" placeholder="Enter Username" required><br>
	Email: <br>
	<input type="text" name="email" placeholder="Enter Email" required><br>
	Password: <br>
	<input type="password" name="password" placeholder="type in password" required><br>
	Verify Password: <br>
	<input type="password" name="verify" placeholder="Re-enter password"><br>
	<br>
	<button type="submit" class="btn" name="signup"> Register </button>
</form>
</html>
