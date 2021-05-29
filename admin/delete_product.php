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
      <?php 
           include("../function.php");
           $name=$_SESSION['name'];
           $pid=$_SESSION['p_id'];
           $sql="SELECT * FROM `product` WHERE ad_name='$name' AND pid='$pid'";
           $result=mysqli_query($cn,$sql);
           if(mysqli_num_rows($result)>0){
           while($row=mysqli_fetch_assoc($result)){
              
               $pname=$row['pname'];
               $price=$row['price'];
               $ptype=$row['ptype'];
               $bname=$row['bname'];}
           }
          
        
          echo"<label id='password' class='fadeIn third' >Product Id : $pid</label></br>";
          echo"<label id='password' class='fadeIn third'>Product Name : $pname</label></br>";
          echo"<label id='password' class='fadeIn third'>Product Type : $ptype</label></br>";
          echo"<label id='password' class='fadeIn third'>brand Name : $bname</label></br>";
          echo"<label id='password' class='fadeIn third'>Price : $price</label></br>";
        
      
      ?>
     
      <input type="submit" name="submit" class="fadeIn fourth" onclick="myFunction()" value="SUBMIT">
    </form>

    <!-- Remind Passowrd -->
    

  </div>
</div>


<?php


if(isset($_POST['submit']))
{
	

	$sql="DELETE FROM product WHERE pid='$pid' ";
  
            $r=mysqli_query($cn,$sql);
            
            if($r)
            {
                $_SESSION['msg']='1 product delete successfully';
                header("Location:index.php");
            }
            
         
          
	
}


 
 

 ?>

</body>
</html>