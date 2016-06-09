<?php

require('login_back.php');
$login_flag=0;
session_destroy();
header('location: index.php');
echo "you are successfully logged out";

  ?>