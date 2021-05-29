<html>
 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="css/reg.css">
        <link href='reg.css' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/reg.css">
    </head>
    <body>

<form name="form1" method="post" action="">
      
        <h1>Sign Up</h1>
        
        <fieldset>
          <legend><span class="number">1</span>Your basic info</legend>
          <label for="name">Name:</label>
          <input type="text" id="name" name="name">
          
          <label for="mail">Email:</label>
          <input type="email" id="email" name="email">
          
          <label for="password">Password:</label>
          <input type="password" id="password" name="password">
           <label for="password"> confirm Password:</label>
          <input type="password" id="password" name="cpassword">
		      </fieldset>
        <fieldset>
          <legend><span class="number">2</span>Your profile</legend>
          <label for="bio">Biodata:</label>
          <textarea id="bio" name="bio"></textarea>
        </fieldset>
        <button type="submit"name="submit">Sign Up</button>
      </form>
<?php
include("function.php");
$crat="CREATE TABLE user_reg(
Name varchar(25),
Email varchar(25),
Password varchar(25),
Biography varchar(30)
)";
if(mysqli_query($cn,$crat)){
echo"New table created successfully";
}

if(isset($_POST['submit'])){
$name=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['password'];
$cpass=$_POST['cpassword'];
$biog=$_POST['bio'];
$u_rate="NULL";
if($name=="" || $email=="" ||$pass==""|| $cpass==""|| $biog=="" ){
	echo "All fields should be filled.Either one or many fields are empty.";
	}
$inst="INSERT INTO user_reg(Name,Email,Password,Biography) VALUES('$name','$email','$pass','$biog')"; 
if($pass==$cpass){
if(mysqli_query($cn,$inst)){
echo"New record created successfully";
}
else{echo mysqli_error($mysqli);}
}
}

?>
</body>
</html>