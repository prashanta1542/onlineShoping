<?php
session_start();
if($_SESSION['admin_login_status']!="loged in" and ! isset($_SESSION['user_id']) )
header("Location:../index.php");

if(isset($_GET['sign']) and $_GET['sign']=="out") {
$_SESSION['admin_login_status']="loged out";
unset($_SESSION['user_id']);
header("Location:../index.php");    

}

?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../logcss.css">
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Delete Selected Product </h2>
    

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div>
    <!-- Login Form -->
 <form name="form1" action="" method="post">
      <input type="text" id="Email address" class="fadeIn second" name="pid" placeholder="write product id">
      <input type="submit" name="submit" class="fadeIn fourth" onclick="myFunction()" value="SUBMIT">
    </form>

    <!-- Remind Passowrd -->
    

  </div>
</div>


<?php

include("../function.php");
if(isset($_POST['submit']))
{
    $admin_name=$_SESSION['ad_name'];
    $pid=$_POST['pid'];
	$sql="SELECT * FROM product WHERE pid='$pid' AND ad_name='$admin_name' ";
  
            
            
            $result=mysqli_query($cn,$sql);
            if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
               
                $_SESSION['a_name'] =$admin_name;
                $_SESSION['pid'] =$row['pid'];
                $_SESSION['pname'] =$row['pname'];
                $_SESSION['ptype'] =$row['ptype'];
                $_SESSION['bname'] =$row['bname'];
                $_SESSION['price'] =$row['price'];
                $_SESSION['filename'] =$row['filname'];
            
                header("Location:single-product.php");
            
            
            }
            }
         
          
	
}


 
 

 ?>

</body>
</html>