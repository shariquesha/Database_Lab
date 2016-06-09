<?php 

$db = mysqli_connect("localhost","root","","dbms") or die("Error in connection to database");

if(isset($_POST['forgot_submit']))
{


	$sec_ans=mysqli_escape_string($db,trim($_POST['sec_ans']));
	$email=mysqli_escape_string($db,trim($_POST['email']));
	if(!empty($sec_ans)&&!empty($email))
	{
		$query_sec_ans = "select email,password,security_answer from user where email='$email' and security_answer='$sec_ans'";
		$data_sec_ans = mysqli_query($db,$query_sec_ans);
		if(mysqli_num_rows($data_sec_ans)==1)
		{
			$row=mysqli_fetch_array($data_sec_ans);
			echo "Your password is :".$row['password'];
		}
		else
			echo "User not found";
	}
	else
		echo "Field cannot be empty";
}

?>