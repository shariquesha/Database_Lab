<!DOCTYPE html
  <head>
    <title>Mobile Store</title> 
    <link rel="stylesheet" type="text/css" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jquery-1.11.3.min.js"></script>
  </head>
  <body>
    <?php 
    $db=mysqli_connect("localhost","root","","dbms");
   require 'header.php'; 
    require 'login_back.php';
    ?>

    <h3 id="cat">Brands</h3>

    <table  class="left_menu" id="men" >
      <?php
      if($login_flag==1)
      {
        $uid=$_GET['uid'];
      }
      else
      {
        $uid=$_SERVER['REMOTE_ADDR'];
        $_SESSION['uid']=$uid;
      }
      $query1="select distinct brand from product group by brand";
      $data1=mysqli_query($db,$query1);
      while($row1=mysqli_fetch_array($data1))
        echo '<tr><td><a class=odd href="index.php?brand='.$row1['brand'].'&uid='.$uid.'">'.ucfirst($row1['brand']).'</td></tr>';
      ?>
    </table>

    <div class="outline">
      <table  class="center_content" >
        <?php

        if(isset($_GET['brand']))
        {
          $bra=$_GET['brand'];
          $query='select pid,pname,image1,mrp from product where brand = "' . $bra . '"';
        }
        else if(isset($_GET['submit_search']))
        {
          if(!empty($_GET['search']))
          {
            $search_item=$_GET['search'];
            $query='select pid,pname,image1,mrp from product where brand like "%'.$search_item.'%" or pname like "%'.$search_item.'%"';
          }
        }
        else
        {
          $query='select pid,pname,image1,mrp from product where catg="smartphone" ';
        }

        $data=mysqli_query($db,$query);
        while(mysqli_fetch_array($data))
        {

          $row=mysqli_fetch_array($data);
          echo'<tr><td><a href="details.php?pid='.$row['pid'].'&uid='.$uid.'"><img class="prod_box" src="'.$row['image1'].' " alt="'.ucfirst($row['pname']).'" width="100" height="150" /> <br>'.ucfirst($row['pname']).'<br><font size=2>Rs <font size=3>'.($row['mrp']).'</a></td>';
          $row=mysqli_fetch_array($data);
          echo'<td><a href="details.php?pid='.$row['pid'].'&uid='.$uid.'"><img class="prod_box" src="'.$row['image1'].' " alt="'.$row['pname'].'" width="100" height="150" /><br>'.ucfirst($row['pname']).'<br><font size=2>Rs <font size=3>'.($row['mrp']).'</a></td>';
          $row=mysqli_fetch_array($data);
          echo'<td><a  href="details.php?pid='.$row['pid'].'&uid='.$uid.'"><img class="prod_box" src="'.$row['image1'].' " alt="'.$row['pname'].'" width="100" height="150" /><br>'.ucfirst($row['pname']).'<br><font size=2>Rs <font size=3>'.($row['mrp']).'</a></td>';
          $row=mysqli_fetch_array($data);
          echo'<td><a  href="details.php?pid='.$row['pid'].'&uid='.$uid.'"><img class="prod_box" src="'.$row['image1'].' " alt="'.$row['pname'].'" width="100" height="150" /><br>'.ucfirst($row['pname']).'<br><font size=2>Rs <font size=3>'.($row['mrp']).'</a></td>';
          $row=mysqli_fetch_array($data);
          echo'<td><a  href="details.php?pid='.$row['pid'].'&uid='.$uid.'"><img class="prod_box" src="'.$row['image1'].' " alt="'.$row['pname'].'" width="100" height="150" /><br>'.ucfirst($row['pname']).'<br><font size=2>Rs <font size=3>'.($row['mrp']).'</a></td></tr>';
        }


        ?>
      </table>
    </div>

  </body>
  <script  src="script.js"></script>
  </html>
