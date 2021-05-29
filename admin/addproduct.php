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
    <h2 class="active"> Add Product Details </h2>
    

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div>
    <!-- Login Form -->
 <form name="form1" action="" method="post" enctype="multipart/form-data" >
      
      <input type="text" id="password" class="fadeIn third" name="pname" placeholder="Product Name">
      <input type="text" id="password" class="fadeIn third" name="ptype" placeholder="Product Type">
      <input type="text" id="password" class="fadeIn third" name="bname" placeholder="Brand Name">
      <input type="text" id="password" class="fadeIn third" name="price" placeholder="Price">
      <input type="file" id="image"  name="file" >
      <input type="submit" name="submit" class="fadeIn fourth" value="submit">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
<?php
include("../function.php");
$crat="CREATE TABLE product(
  ad_name varchar(80),
pid varchar(25),
pname varchar(25),
ptype varchar(25),
bname varchar(30),
price varchar(30),
filname varchar(100),
filtype varchar(100),
filsize varchar(100)
)";
if(mysqli_query($cn,$crat)){
echo"New table created successfully";
}
if(isset($_POST['submit'])){
  $ad_name=$_SESSION['name'];
$pid=substr("$ad_name", 0, 2).rand(10,100);
$pname=$_POST['pname'];
$ptype=$_POST['ptype'];
$bname=$_POST['bname'];
$price=$_POST['price'];
$file=rand(1000,100000)."-".$_FILES['file']['name'];
$file_loc=$_FILES['file']['tmp_name'];
$filtype=$_FILES['file']['type'];
$filsize=$_FILES['file']['size'];
$folder="../upload/";

$new_size=$filsize/1024;

$new_file_name=strtolower($file);

$final_file=str_replace(' ','-',$new_file_name);

if(move_uploaded_file($file_loc,$folder.$final_file)){

$sql="INSERT INTO product(ad_name,pid,pname,ptype,bname,price,filname,filsize,filtype) VALUES 
('$ad_name','$pid','$pname','$ptype','$bname','$price','$final_file','$filsize','$filtype')";

if(mysqli_query($cn,$sql)){
echo"insert successfully";
header("Location:index.php");
}

else{echo"Failed.mysqli_error($cn)";}
}
}
?>


</body>
</html>