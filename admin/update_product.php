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
    <h2 class="active"> Update Selected Product </h2>
    

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div>
    <!-- Login Form -->
    <form name="form1" action="" method="post" enctype="multipart/form-data" >
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
               $bname=$row['bname'];
               $filname=$row['filname'];
               $filtype=$row['filtype'];              
               $filsize=$row['filsize'];
            }
           }
          
        
          echo"<label class='fadeIn third' >Product Id : $pid</label></br>";
          echo"<label class='fadeIn third'>Product Name : $pname</label></br>";
          echo'  <input type="text"  class="fadeIn third" name="pname" placeholder="Chnage Product Name"></br>';
          echo"<label  class='fadeIn third'>Product Type : $ptype</label></br>";
          echo'  <input type="text"  class="fadeIn third" name="ptype" placeholder="Change Product Type"></br>';
          echo"<label class='fadeIn third'>brand Name : $bname</label></br>";
          echo'  <input type="text"  class="fadeIn third" name="bname" placeholder="Change Brand Name"></br>';
          echo"<label class='fadeIn third'>Price : $price</label></br>";
          echo'<input type="text" class="fadeIn third" name="price" placeholder="Change the Price of Product"></br>';
          echo"<label  class='fadeIn third'>Update new product image </label></br>";
          echo'<input type="file" id="image"  name="file" ></br>';
        
      
      ?>
     
      <input type="submit" name="submit" class="fadeIn fourth" onclick="myFunction()" value="SUBMIT">
    </form>

    <!-- Remind Passowrd -->
    

  </div>
</div>


<?php


if(isset($_POST['submit']))
{    
    $ad_name=$_SESSION['name'];
    $pname_u=$_POST['pname'];
    $ptype_u=$_POST['ptype'];
    $price_u=$_POST['price'];
    $bname_u=$_POST['bname'];
    $file=$_FILES['file']['name'];
   
      
       if($pname_u != null){
         $sql="UPDATE product SET  pname='$pname_u'  WHERE pid='$pid' AND ad_name='$ad_name' ";
         $r=mysqli_query($cn,$sql);
       }
       
       if($ptype_u != null){
         $sql="UPDATE product SET  ptype='$ptype_u' WHERE pid='$pid' AND ad_name='$ad_name' ";
          $r=mysqli_query($cn,$sql);
       }
       
       if($price_u != null){
         $sql="UPDATE product SET  price='$price_u' WHERE pid='$pid' AND ad_name='$ad_name' ";
         $r=mysqli_query($cn,$sql);
       }
       
       if($bname_u != null){
         $sql="UPDATE product SET  bname='$bname_u' WHERE pid='$pid' AND ad_name='$ad_name' ";
         $r=mysqli_query($cn,$sql);
       }

      if($file !=null){
        $file=rand(1000,100000)."-".$_FILES['file']['name'];
        $file_loc=$_FILES['file']['tmp_name'];
        $filtype=$_FILES['file']['type'];
        $filsize=$_FILES['file']['size'];
        $folder="../upload/";
        
        $new_size=$filsize/1024;
        
        $new_file_name=strtolower($file);
        
        $final_file=str_replace(' ','-',$new_file_name);
        
        if(move_uploaded_file($file_loc,$folder.$final_file)){
                $sql="UPDATE product SET filname='$final_file',filtype='$filtype',filsize='$filsize'  WHERE pid='$pid' AND ad_name='$ad_name' ";
      
                $r=mysqli_query($cn,$sql);
                
              }
            }
            header("Location:index.php"); 
	
}


 
 

 ?>

</body>
</html>