<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
</head>
<body>
	<?php  require_once 'forgot_back.php'; ?>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

		Enter your E-mail ID<input type="text" name="email">
		Enter your Security Answer<input type="text" name="sec_ans">
		<button type="submit" name='forgot_submit'>Submit</button>
	</form>
</body>
</html>