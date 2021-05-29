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

          <legend><span class="number">2</span>Payment details</legend>
          <label >Contact Number:</label>
          <input type="text"  name="contact_number">

          <label >B-kash A/C Number:</label>
          <input type="text"  name="bkash_number">

          <label >Nogod A/C Number:</label>
          <input type="text"  name="nogod_number">
         
          <legend><span class="number">3</span>Bank A/C details</legend>
          <label >Name of the Bank:</label>
          <input type="text"  name="bank_acc_details">
          <label >Bank A/C Number:</label>
          <input type="text"  name="bank_acc_number">
          
         
		      </fieldset>
        <fieldset>
          <legend><span class="number">4</span>Your profile</legend>
          <label for="bio">Biodata:</label>
          <textarea id="bio" name="bio"></textarea>
        </fieldset>
        <button type="submit"name="submit">Sign Up</button>
      </form>
<?php
include("function.php");
$crat="CREATE TABLE log1(
Name varchar(25),
Email varchar(25),
Contact_number varchar(25),
Bkash_Number varchar(25) NULL,
Nogod_Number varchar(25) NULL,
Bank_Acc_details varchar(25) NULL,
Bank_Acc_number varchar(25) NULL,
Password varchar(25),
Biography varchar(30) NULL
)";
if(mysqli_query($cn,$crat)){
echo"New table created successfully";
}
if(isset($_POST['submit'])){
$name=$_POST['name'];
$email=$_POST['email'];
$c_number=$_POST['contact_number'];
$b_number=$_POST['bkash_number'];
$n_number=$_POST['nogod_number'];
$b_acc_details=$_POST['bank_acc_details'];
$b_acc_number=$_POST['bank_acc_number'];

$pass=$_POST['password'];
$cpass=$_POST['cpassword'];
$biog=$_POST['bio'];
if($name=="" || $email=="" ||$pass==""|| $cpass==""|| $biog=="" ){
  echo "All fields should be filled.Either one or many fields are empty.";
  }
$inst="INSERT INTO log1(Name,Email,Contact_number,Bkash_Number,Nogod_Number,Bank_Acc_details,Bank_Acc_number,Password,Biography) VALUES
     ('$name','$email','$c_number','$b_number','$n_number','$b_acc_details','$b_acc_number','$pass','$biog')"; 
if($pass==$cpass){
if(mysqli_query($cn,$inst)){
echo"New record created successfully";
}
else{echo mysqli_error($cn);}
}
}

?>
</body>
</html>

