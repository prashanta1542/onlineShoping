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

    <style>
        .voucher{
    background-color:#ddd;
    border:2px solid;
    /*width: 300px;
    height: 400px;*/
}    
    img{
        height: 150px;
        width: 150px;
        margin-left: 439px;
        margin-top: 10px;
        margin-bottom: 10px;

    }

    
    </style>

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
                             <li><i class="fa fa-user"></i> <?php echo $name=$_SESSION['name']; ?></li>
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
    
   
   
    
   

<?php
 include("../function.php");
 


 $ad=$_SESSION['aname'];
 $pid=$_SESSION['pid'];
 $pay_status=$_SESSION['pay_status'];    
 $sql="SELECT * FROM admin_order_details WHERE Admin_name='$ad' AND Select_pid='$pid'";
 $result=mysqli_query($cn,$sql);
 if(mysqli_num_rows($result)>0){
     while($row=mysqli_fetch_assoc($result)){
         $cust_name=$row['Customer_name'];
         $cust_nid=$row['Customer_NID'];
         $prod_name=$row['Select_pname'];
         $prod_type=$row['Select_ptype'];
         $prod_brand=$row['Select_bname'];
         $prod_quantity=$row['Quantity_of_product'];
         $prod_price=$row['Product_price'];
         $total_amount=$row['Total_amount'];
         $pay_option=$row['Payment_option'];
         $order_date=$row['Order_time'];
         $cust_status=$row['Customer_rate'];
         $image=$row['filname'];






     }
 }


 require('fpdf.php');
 $pdf=new FPDF(); 
 $pdf->AddPage();
 $pdf->SetFont('Arial','B',16);
 $pdf->Cell(80,10,"Hell0 world");

$pdf->Output('my_file.pdf','I'); 


echo"<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-8'>


    <div class='voucher'>
        
        <div class='row mb-3'>
                <div class='col-sm-2'></div>
                <div class='col-sm-2'></div>
                <div class='col-sm-6'>
                  <img src='../upload/".$image."'  >
                </div>
        </div>
        <div class='row mb-3'>
                <div class='col-sm-2'></div>
                <label class='col-sm-2'>Customer Name :</label>
                <div class='col-sm-6'>
                    <div   class='form-control' >$cust_name</div>
                </div>
        </div>

        <div class='row mb-3'>
        <div class='col-sm-2'></div>
                <label class='col-sm-2'>Customer Nid No :</label>
                <div class='col-sm-6'>
                    <div   class='form-control' >$cust_nid</div>
                </div>
        </div>

        <div class='row mb-3'>
                <div class='col-sm-2'></div>
                <label class='col-sm-2'>Product Name :</label>
                <div class='col-sm-6'>
                    <div   class='form-control' >$prod_name</div>
                </div>
        </div>

        <div class='row mb-3'>
        <div class='col-sm-2'></div>
                <label class='col-sm-2'>Product Type :</label>
                <div class='col-sm-6'>
                    <div   class='form-control' >$prod_type</div>
                </div>
        </div>

        <div class='row mb-3'>
        <div class='col-sm-2'></div>
                <label class='col-sm-2'>Brand Name :</label>
                <div class='col-sm-6'>
                    <div   class='form-control' >$prod_brand</div>
                </div>
        </div>

        <div class='row mb-3'>
                <div class='col-sm-2'></div>
                <label class='col-sm-2'>Quantity_of_product :</label>
                <div class='col-sm-6'>
                    <div   class='form-control' >$prod_quantity</div>
                </div>
        </div>

        <div class='row mb-3'>
                <div class='col-sm-2'></div>
                <label class='col-sm-2'>Product Price :</label>
                <div class='col-sm-6'>
                     <div   class='form-control' >$prod_price</div>
                </div>
        </div>

        <div class='row mb-3'>
                <div class='col-sm-2'></div>
                <label class='col-sm-2'>Amount to be paymented :</label>
                <div class='col-sm-6'>
                    <div   class='form-control' >$total_amount</div>
                </div>
        </div>

        <div class='row mb-3'>
                <div class='col-sm-2'></div>
                <label class='col-sm-2'>Customer Status :</label>
                <div class='col-sm-6'>
                    <div   class='form-control' >$cust_status</div>
                </div>
        </div>

        <div class='row mb-3'>
                <div class='col-sm-2'></div>
                <label class='col-sm-2'>Payment Status :</label>
                <div class='col-sm-6'>
                    <div   class='form-control' >$pay_status</div>
                </div>
        </div>

        
      </div>

    

      
  
    </div>
</div>

<div class='col-md-2'></div>
</div>


";
?>














 
   
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