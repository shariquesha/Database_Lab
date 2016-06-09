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
  if(isset($_GET['pid']))
  {
   $uid=$_GET['uid'];
   $int = filter_var($uid, FILTER_SANITIZE_NUMBER_INT);
   $prod_id=$_GET['pid'];

   $query2="select * from product where pid=$prod_id";
   $data2= mysqli_query($db,$query2);
   $i=0;
   $row2=mysqli_fetch_array($data2);
    //header('location: product_details.php');

 } ?>

 <div class="images">
   <img src="<?php echo $row2["image1"] ;?>" alt="" /> 
   <?php echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?>
   <img src="<?php echo $row2["image2"] ;?>" alt=""/>
   <?php echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; ?>
   <img src="<?php echo $row2["image3"] ;?>" alt=""  />

 </div>  

 <div class="pro_det">
  <?php
    
  echo '<b>PRODUCT NAME:</b> <font color=blue>'.$row2['pname'].'</font><br>';
  echo '<b>MRP:</b> INR <font color=green>'.$row2['mrp'].'</font><br>';
  echo '<b>DISCOUNT:</b> '.$row2['disc'].'<br>';
  echo '<b>COLOR:</b> '.$row2['color'].'<br>';
  echo '<b>BRAND:</b> '.$row2['brand'].'<br>';
  echo '<b>CATEGORY:</b> '.$row2['catg'].'<br>';
  echo '<b>DESCRIPTION:</b><p> '.$row2['dscrpt'].'</p><br>';
  ?>
  <button onclick="add_to_cart()">Add to Cart</button> <br><br><br>
  <button id='myBtn'>Buy Now</button>
  <script>
    var btn = document.getElementById('myBtn');
    btn.addEventListener('click', function() {
      document.location.href ='order_details.php?pid="$prod_id"&uid="$int"';
    });
  </script>

  <p id="demo"></p>
</div>


<script>

  function add_to_cart () 
  {
    alert('hello');<?php
    $pid=$_GET['pid'];

          // echo $int;
    if($login_flag==0)
    {
      $user_query="insert into user (`uid`) values('$int')";
      mysqli_query($db,$user_query);
    }
    
    $flag=0;
    //if(isset($_POST['cart_button'])){
     // $cart_query="insert into cart (`pid`,`uid`) values ('$pid','$int')";
    //}
    
    //mysqli_query($db,$cart_query)or $flag++;
    ?>
    var flag = '<?php echo $flag ?>';
        //alert (flag);
        if(flag == 0)
          document.getElementById('demo').innerHTML="Item Added to Cart";
        else
          document.getElementById('demo').innerHTML="Item is already in Cart";
      }
    </script>


  </body>
  </html>
