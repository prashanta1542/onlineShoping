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
<?php
include("../function.php");
$ad_name= $_SESSION['a_name'];
$pid=$_SESSION['pid'];
$pname=$_SESSION['pname'];
$ptype=$_SESSION['ptype'];
$bname= $_SESSION['bname'] ;
$image=$_SESSION['filename'];
$price= $_SESSION['price'] ;
$crat="CREATE TABLE User_order(
U_Name varchar(25),
A_Name varchar(25),
NID varchar(25),
Email varchar(25),
Pid varchar(25),
Pname varchar(25),
Ptype varchar(25),
Bname varchar(30),
Price varchar(30),
Quantity varchar(30),
Total_amount varchar(30),
Amount_after_offer varchar(30) null,
Payment_option varchar(30),
Order_time varchar(30),
filname varchar(100),
filtype varchar(100),
filsize varchar(100),
Payment_status varchar(100)

)";
if(mysqli_query($cn,$crat)){
    echo"New table created successfully";
    }
$create_table="CREATE TABLE Admin_order_details(
    Admin_name varchar(25),
Customer_name varchar(25),
Customer_NID varchar(25),
Customer_email varchar(25),
Select_pid varchar(25),
Select_pname varchar(25),
Select_ptype varchar(25),
Select_bname varchar(30),
Product_price varchar(30),
Quantity_of_product varchar(30),
Total_amount varchar(30),
Payment_option varchar(30),
Order_time varchar(30),
filname varchar(100),
filtype varchar(100),
filsize varchar(100),
Customer_rate varchar(30),
confirm_status varchar(30)

)";
if(mysqli_query($cn,$create_table)){
    echo"New table-2 created successfully";
    }

$user_name=$_SESSION['name'];
 $sql="SELECT * from user_reg where Name='$user_name'";
 $result=mysqli_query($cn,$sql);
 if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
      $u_email=$row['Email'];
    } 
      }

if(isset($_POST['submit'])){
$u_name=$_SESSION['name'];
$a_name=$ad_name;
$email=$u_email;
$nid=$_POST['nid'];

$p_id=$pid;
$p_name=$pname;
$p_type= $ptype;
$b_name=$bname;
$p_price=$price;
$quantity=$_POST['quantity_product'];
$pay_status='No';
$con_status='No';
$total_amount=$p_price*$quantity;
if($total_amount>=200000){
    $cust_rate='Gold';
    $offer_rate=$total_amount-($total_amount*0.15);
    
}
else if($total_amount>=175000){
    $cust_rate='Dimond';
    $offer_rate=$total_amount-($total_amount*0.10);
}
else if($total_amount>=150000){
    $cust_rate='Silver';
    $offer_rate=$total_amount-($total_amount*0.5);
}
else{
    $cust_rate='Null';
    $offer_rate=$total_amount;
}
$pay_option=$_POST['pay_option'];
$order_date=$_POST['order_date'];
$file=rand(1000,100000)."-".$_FILES['file']['name'];
$file_loc=$_FILES['file']['tmp_name'];
$filtype=$_FILES['file']['type'];
$filsize=$_FILES['file']['size'];
$folder="../upload/";

$new_size=$filsize/1024;

$new_file_name=strtolower($file);

$final_file=str_replace(' ','-',$new_file_name);

if(move_uploaded_file($file_loc,$folder.$final_file)){
    $sql_table="INSERT INTO Admin_order_details(Admin_name,Customer_name,Customer_NID,Customer_email,Select_pid,Select_pname,Select_ptype,Select_bname,Product_price,Quantity_of_product,Total_amount,Payment_option,Order_time,filname,filsize,filtype,Customer_rate,confirm_status)
    VALUES('$a_name','$u_name','$nid','$email','$p_id','$p_name','$p_type','$b_name','$p_price','$quantity','$offer_rate','$pay_option','$order_date','$final_file','$filsize','$filtype','$cust_rate','$con_status')";


$sql="INSERT INTO User_order(U_Name,A_Name,NID,Email,Pid,Pname,Ptype,Bname,Price,Quantity,Total_amount,Amount_after_offer,Payment_option,Order_time,filname,filsize,filtype,Payment_status) 
VALUES('$u_name','$a_name','$nid','$email','$p_id','$p_name','$p_type','$b_name','$p_price','$quantity','$total_amount','$offer_rate','$pay_option','$order_date','$final_file','$filsize','$filtype','$pay_status')"; 


if(mysqli_query($cn,$sql_table) && mysqli_query($cn,$sql)){
    
echo"New record created successfully";
$_SESSION['product_img']=$image;
$_SESSION['adm_name']=$ad_name;
$_SESSION['product_id']=$p_id;

header("Location:orderred_list.php");    


}
else {echo "mysqli_error($cn)";}

}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Electronics Bazar</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a href="cart.php"><i class="fa fa-user"></i> My Cart</a></li>
                            <li><a href="checkout.php"><i class="fa fa-user"></i> Checkout</a></li>
                             <li><i class="fa fa-user"></i> <?php 
                                                              $name=$_SESSION['name'];
                                                               echo "$name"; 
                                                               
                                                              ?>
                                                               
                                                              </li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                  <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="index.php">e<span>Electronics</span></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.php">Cart - <span class="cart-amunt">$800</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop page</a></li>
                        <li><a href="seeproduct.php">See product</a></li>
                        <li><a href="cart.php">Cart</a></li>
                        <li><a href="checkout.php">Checkout</a></li>
                        <li><a href="#">Category</a></li>
                        <li class=""> <a href="?sign=out">Logout</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> 
            
    <!-- End mainmenu area -->

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Product select for buy </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
                         <div class="col-md-2">

                         </div>
                            <div class="col-md-4">
                                <div class="product-images">
                                    <div class="product-main-img"> 
                                       <?php
                                       //include("../function.php");
                                       
                                        echo"<label id='password' class='fadeIn third' > Admin Name : $ad_name</label></br>";
                                        echo"<label id='password' class='fadeIn third' >Product Id : $pid</label></br>";
                                        echo"<label id='password' class='fadeIn third'>Product Name : $pname</label></br>";
                                        echo"<label id='password' class='fadeIn third'>Product Type : $ptype</label></br>";
                                        echo"<h2 id='password' class='fadeIn third'>brand Name : $bname</h2></br>";
                                        
                                        echo " <img src='../upload/".$image."' >";
                                        echo"</br>";
                                        echo"<h2>Prouct Price : $price</h2></br>";
                                        
                                        ?>  
                                    </div>
                                 
                                </div> 
                            </div>  
                            
                        <div class="col-md-4">
                            
                            <form  action="" method="post" enctype="multipart/form-data" >
                           
                                <label class="form-label">Enter Your NID No:</label>
                                <input type="text" class="form-control" name="nid" placeholder="National Identification Number"></br>

                                
                                <label class="custom-file-upload">Enter Your Own Passport size image:</label></br>
                                <input type="file"  name="file" >

                                <label class="form-label">Quantity of Product:</label>
                                <input type="text" class="form-control"  name="quantity_product" placeholder=""></br>

                                <label class="form-label">Payment Option</label>
                                <select name="pay_option" class="form-select" aria-label="Default select example">
                                   <option value="bkash">B-Kash</option>
                                   <option value="nogod">Nogod</option>
                                   <option value="bkash">Banking Transaction</option>
                                </select></br>
                               
                                <label class="form-label">Set ordered date:</label>
                                <input type="date" class="form-control"  name="order_date" placeholder=""></br>

                                <input type="submit" name="submit" class="fadeIn fourth" onclick="myFunction()" value="SUBMIT">
                            </form>
                          
                        </div>
                        <div class="col-md-2"></div>
                           
                         
    </div>



                         <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>e<span>Electronics</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="">My account</a></li>
                            <li><a href="">Order history</a></li>
                            <li><a href="">Wishlist</a></li>
                            <li><a href="">Vendor contact</a></li>
                            <li><a href="">Front page</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="">Mobile Phone</a></li>
                            <li><a href="">Home accesseries</a></li>
                            <li><a href="">LED TV</a></li>
                            <li><a href="">Computer</a></li>
                            <li><a href="">Gadets</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <input type="email" placeholder="Type your email">
                            <input type="submit" value="Subscribe">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 eElectronics. All Rights Reserved. Coded with <i class="fa fa-heart"></i> by <a href="http://wpexpand.com" target="_blank">WP Expand</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="../js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="../js/main.js"></script>





  </body>
</html>