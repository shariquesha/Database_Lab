<!DOCTYPE html>
<html>
<head>
	<title>SignUp</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php require_once "header.php"; ?>
	<?php require_once "signup_back.php"; ?>

	<div class="signup">
		<form name="myform" method="post" action="<?php  echo $_SERVER['PHP_SELF'];?>">
			Name <input type="text" name="name" value="<?php if(!empty($_POST['name'])&&$flag==0)echo $_POST['name'];?>"><br><br>
			Email <input type="text" name="email"value="<?php if(!empty($_POST['email'])&&$flag==0)echo $_POST['email'];?>"><br><br>
			Password <input type="password" name="password"><br><br>
			Repeat Password <input type="password" name="repeat_password"><br><br>
			Date of Birth <input type="date" name="dob"><br><br>
			Gender <input type="text" name="gender"><br><br>
			Security Question:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;What is your Nick Name?<input type="text" name="sec_que"><br><br>
			Address <input type="text" name="address"><br><br>
			<button type="submit" name="submit">SignUp</button>
		</form>
	</div>
</body>

</html>