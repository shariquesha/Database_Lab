
<?php require_once "login_back.php"; 
$u_id= $_SESSION['uid'];
//echo $u_id;
?>
<div class="top_bar">
	<ul class="menu">
		<li><a href="index.php?uid=<?php echo $u_id;?>" class='nav2' id="logo">Mobile Store</a></li>
		<li><a href="index.php?uid=<?php echo $u_id;?>"class="nav1"> Home</a></li>
		<li><a href="login.php" class="nav1">Login/SignUp</a></li>
		<li><a href="contact.php?uid=<?php echo $u_id;?>"class="nav1">Contact Us</a></li>
		<li><a href="cart.php?uid=<?php echo $u_id;?>" class="nav1">Shopping Cart</a></li>
				<li> <form type="get" action="index.php"> <input class="search_input" type="text" name="search">


			<button type="submit" name="submit_search">Search</button>
		</form></li>
		<?php
			if($login_flag==1)
			{
				echo "<li> <a href='order.php?uid=$u_id' class='nav1'>Your Orders</a></li>";
				echo "<li> <a href='logout.php' class='nav1'>Logout</a></li>";
			}
		?>



	</ul> 
</div>
