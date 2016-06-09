<!DOCTYPE html>
<html>
<head>
	<title>User order</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php

	require_once 'header.php';
	require_once  'products.php';
	$uid=$_GET['uid'];
	$int = filter_var($uid, FILTER_SANITIZE_NUMBER_INT);
	$u_id=$int;
	$order_fetch_query="select pname,mrp,disc,color,brand,catg,qty,dscrpt,image1 from order_details natural join product where uid='$u_id'";
	$order_data1=mysqli_query($db, $order_fetch_query);
	while($order_data=mysqli_fetch_array($order_data1))
	{
		echo '<img src="'.$order_data['image1'].' " alt="'.$order_data['pname'].'" width="100" height="150" />'.'<br>';
		echo '<b>PRODUCT NAME:</b> <font color=blue>'.$order_data['pname'].'</font><br>';
		echo '<b>MRP:</b> INR <font color=green>'.$order_data['mrp'].'</font><br>';
		echo '<b>DISCOUNT:</b> '.$order_data['disc'].'<br>';
		echo '<b>COLOR:</b> '.$order_data['color'].'<br>';
		echo '<b>BRAND:</b> '.$order_data['brand'].'<br>';
		echo '<b>CATEGORY:</b> '.$order_data['catg'].'<br>';
		echo '<b>DESCRIPTION:</b><p> '.$order_data['dscrpt'].'</p><br>';
	}
	?>
</body>
</html>