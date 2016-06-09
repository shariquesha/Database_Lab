<!DOCTYPE html>
<html>
<head>
  <title>Details</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php
  require_once 'products.php';
  require_once 'header.php';
  require_once 'login_back.php';
  //require_once 'details.php';

  
  ?>
  <?php
  $pid=$_GET['pid'];
  $uid=$_GET['uid'];
  //echo $uid;
  $int = filter_var($uid, FILTER_SANITIZE_NUMBER_INT);
       // echo $int;
  if($login_flag==0)
  {
    echo 'You must Login First';die();
  }
  $query2="select * from product where pid='$pid'";
  $data2= mysqli_query($db,$query2);
  $i=0;
  $row2=mysqli_fetch_array($data2);
  $price=$row2['mrp'];
  echo '<img src="'.$row2['image1'].'"width="100" height="150"/>'.'<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';  
  echo "<br>";
  echo '<b>PRODUCT NAME:</b> <font color=blue>'.$row2['pname'].'</font><br>';
  echo '<b>MRP:</b> INR <font color=green>'.$row2['mrp'].'</font><br>';
  echo '<b>DISCOUNT:</b> '.$row2['disc'].'<br>';
  echo '<b>COLOR:</b> '.$row2['color'].'<br>';
  echo '<b>BRAND:</b> '.$row2['brand'].'<br>';
  echo '<b>CATEGORY:</b> '.$row2['catg'].'<br>';
  echo '<b>DESCRIPTION:</b><p> '.$row2['dscrpt'].'</p><br>';  
  ?>

  
  
  <div>
    <p id="demo"></p>

  </div>

  <form method="post"  >

    <br>Shipping Address
    <br><input type="text" name="address" id='textarea'>
    <button onclick="buy_now()">Place Order</button>
  </form>

  <script>

    function buy_now()

     {
      <?php

      $address=$_POST['address'];
      if(!empty($address))
      {
        $flag=0;
        $order_query="insert into order_details (`pid`,`uid`,`stat`,`order_date_time`,`order_price`,
          `shipping_add`) values ('$pid','$uid','Processing','now()','$price','$address')";

        mysqli_query($db,$order_query)or die('Error');


      }
?>

      }

  </script>
</body>
</html>