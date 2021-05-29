<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="logcss.css">
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Sign In </h2>
    <h2 class="inactive underlineHover">Sign Up </h2>
	

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div>
    <!-- Login Form -->
 <form name="form1" method="post" action="">
      <input type="text" id="Email address" class="fadeIn second" name="Email" placeholder="Email address">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" name="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
<?php
include("function.php");
if(isset($_POST['submit'])){
$user=$_POST['Email'];
$pass=$_POST['password'];

if($user=="" || $pass==""){
	echo "Either UserName or Password fields is empty.";
	}
	else {
	 $sql="SELECT * from reg where Email='$user' AND Password='$pass'";
		$result=mysqli_query($cn,$sql) or die("Could not Execute the select query");
		
	$row = mysqli_fetch_assoc($result);
	if(is_array($row) && !empty($row)){
	header('Location:index.php');
		echo "correct";
	}
	else{
		echo "Invalid username or password.";
	}
	}
	
}
?>
</body>
</html>