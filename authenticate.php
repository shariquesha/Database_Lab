<?php

if(isset($_SERVER['PHP_AUTH_USER'])&&isset($_SERVER['PHP_AUTH_PW']))
{
	if($_SERVER['PHP_AUTH_USER']=='sharique1'&&$_SERVER['PHP_AUTH_PW']=='mohammad1')
	{
		echo "You are logged in";
	}
	else
		die('Invalid username Or password');
}
else
{
	header('WWW-Authenticate: Basic realm="Restricted Section"');
	header('HTTP/1.0 401 Unauthorized');
	die ("Please enter your username and password");

?>