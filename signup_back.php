<?php
$db = mysqli_connect("localhost","root","","dbms") or die("Error in connection to database");

if (isset($_POST['submit'])) 
{
	$flag=0;
	if(isset($_POST['name'])&&isset($_POST['password'])&&isset($_POST['repeat_password'])&&isset($_POST['email'])&&isset($_POST['dob'])&&isset($_POST['gender'])&&isset($_POST['address'])&&isset($_POST['sec_que']))
	{

		$e_name=$_POST['name'];
		$e_email=$_POST['email'];
		$e_password=$_POST['password'];
		$e_repeat_password=$_POST['repeat_password'];
		$e_dob=$_POST['dob'];
		$e_gender=$_POST['gender'];
		$e_address=$_POST['address'];
		$e_sec_que=$_POST['sec_que'];
		$regex="/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
		
		if(empty($e_sec_que)||empty($e_name)||empty($e_email)||empty($e_password)||empty($e_repeat_password)||empty($e_gender)||empty($e_dob)||empty($e_address))
		{

			echo "Entries are mandetory";

		}
		else if(!preg_match($regex,$e_email))
		{
			echo "Invalid email Please Type valid email<br>";
			
		}
		//echo strlen($e_password);
		else if(strlen($e_password)<5|| strlen($e_password)>12)
		{
			echo "Password length is either too large or too short<br>";
		}
		else if(strcmp($e_repeat_password,$e_password)!=0)
		{
			echo "password donot match<br>";
		}


		else
		{
			echo $e_name;
			//$date=date_format($e_dob,'%y-%m-%d');
			$query="insert into user (`uname`,`email`,`password`,`dob`,`gender`,`address`,`security_answer`) values('$e_name','$e_email','$e_password','$e_dob','$e_gender','$e_address','$e_sec_que')";
			mysqli_query($db,$query) or die("Error in insertion");
			$flag=1;
			echo "Form submitted successfully";

		}
	}
	else
		echo "Values not inserted";


}


?>