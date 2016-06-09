
<?php  

$db=mysqli_connect("localhost","root","","dbms");
$query='select pid,pname,image1,brand from product where category="smartphone" ';
$data=mysqli_query($db,$query);
?>
