<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php  session_start();require_once "header.php"; ?>
	<?php  require_once"login_back.php";?>
	
	
	<div class="login">
		<form name="Login" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<label>User Name</label><br>
			<input type="text" name="user_name" value="<?php if(!empty($_POST['user_name'])&&$flag=1)echo $_POST['user_name'];?>"><br><br>
			<label>Password</label><br>
			<input type="password" name="password"><br><br>
			<button type="submit" name="submit-login">Login</button>
		</form>
		<p ><a id="link1" href="forgot.php">Forgot password</a> <br>or, New user ?
			<a id="link2" href="signup.php">Register </a>Here
		</div>
	</body>
	</html>