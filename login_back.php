<?php

  if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

if(!isset($_SESSION['user_name']))
{
	$flag=0;
	$login_flag=0;
	if(isset($_POST['submit-login']))
	{
		$db=mysqli_connect("localhost","root","","dbms");

		$user_name=mysqli_escape_string($db,trim($_POST['user_name']));
		$user_password=mysqli_escape_string($db,trim($_POST['password']));

		if(!empty($user_name)&&!empty($user_password))
		{
			$query="select uid ,uname ,password from user where uname='$user_name' AND password='$user_password'";
			$data = mysqli_query($db,$query);
			if(mysqli_num_rows($data)==1)
			{
				session_start();
				$login_flag=1;
				$row=mysqli_fetch_array($data,MYSQLI_NUM);
				$uid=$row[0];
				$_SESSION['uid']=$row[0];
				$_SESSION['user_name']=$row[1];
				header("location: index.php?uid=".$row[0]."");
				

			}
			else
				echo "User Name or Password is incorrect";

		}
		else
		{
			if(empty($user_name)&&empty($user_password))
				echo "Enter user name and password";
			else if(empty($user_name))
				echo "Enter User Name";
			else
				echo "Enter Password";
		}
	}
}
else{
	$login_flag=1;
	$login=0;


}

?>