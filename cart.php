<!DOCTYPE html>
<html>
<head>
	<title>User Cart</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php

	require_once 'header.php';
	require_once  'products.php';
	$uid=$_GET['uid'];
	$int = filter_var($uid, FILTER_SANITIZE_NUMBER_INT);
	$u_id=$int;
	$cart_fetch_query="select pname,mrp,disc,color,brand,catg,qty,dscrpt,image1 from product  where pid in(select distinct pid from cart where uid='$u_id')";
	$cart_data1=mysqli_query($db, $cart_fetch_query);
	while($cart_data=mysqli_fetch_array($cart_data1))
	{
		echo '<img src="'.$cart_data['image1'].' " alt="'.$cart_data['pname'].'" width="100" height="150" />'.'<br>';
		echo '<b>PRODUCT NAME:</b> <font color=blue>'.$cart_data['pname'].'</font><br>';
		echo '<b>MRP:</b> INR <font color=green>'.$cart_data['mrp'].'</font><br>';
		echo '<b>DISCOUNT:</b> '.$cart_data['disc'].'<br>';
		echo '<b>COLOR:</b> '.$cart_data['color'].'<br>';
		echo '<b>BRAND:</b> '.$cart_data['brand'].'<br>';
		echo '<b>CATEGORY:</b> '.$cart_data['catg'].'<br>';
		echo '<b>DESCRIPTION:</b><p> '.$cart_data['dscrpt'].'</p><br>';
	}
	?>
</body>
</html>