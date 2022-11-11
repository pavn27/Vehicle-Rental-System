<?php
session_start();
require 'connection.php';
$conn = Connect();
?>
<?php
if(isset($_SESSION['client_username'])) {?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
    <style>
    input[type="text"] {
      color:black;
    border: 2px solid #ccc;
    }
    .form-control {
	height: 40px!important;
	background: $white;
	color: $black;
	font-size: 13px;
	border-radius: 4px;
	box-shadow: none !important;
	border: transparent;
	&:focus, &:active {
		border-color: $black;
	}
	&::-webkit-input-placeholder { /* Chrome/Opera/Safari */
	  color: black;
	}
	&::-moz-placeholder { /* Firefox 19+ */
		color: black;
	
	}
	&:-ms-input-placeholder { /* IE 10+ */
		color: black;
	  
	}
	&:-moz-placeholder { /* Firefox 18- */
		color: black;
	  
	}
}

      </style>
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4">
		  		<h1><a href="index.html" class="logo">Vehicle Rentals</a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="index.php"><span class="fa fa-home mr-3"></span> Home</a>
	          </li>
	          <li>
	              <a href="addvehicle.php"><span class="fa fa-car mr-3"></span> Add Vehicle</a>
	          </li>
	          <li>
              <a href="adddriver.php"><span class="fa fa-user mr-3"></span>Add driver</a>
	          </li>
	          <li>
              <a href="booking.php"><span class="fa fa-sticky-note mr-3"></span> Bookings</a>
	          </li>
	          <li>
              <a href="../logout.php"><span class="fa fa-paper-plane mr-3"></span> Logout</a>
	          </li>
	        </ul>


	      </div>
    	</nav>

      <div id="content" class="p-4 p-md-5 pt-5">
      <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
        <div class="container">
            
    <div class="container" style="margin-top: 65px;" >
    <div class="col-md-7" style="float: none; margin: 0 auto;">
      <div class="form-area">
        <form role="form"   action="addvehicle2.php"enctype="multipart/form-data" method="POST">
        <br style="clear: both">
        <br><br><br>
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Please Provide Your Vehicle Details. </h3>

          <div class="form-group">
            Vehicle Name
            <input type="text" class="form-control" id="car_name" name="car_name" placeholder="Vehicle Name ">
          </div>

          <div class="form-group">
          Vehicle Number Plate
            <input type="text" class="form-control" id="car_nameplate" name="car_nameplate" placeholder="Vehicle Number Plate" required>
          </div>     
          <div class="form-group">
          Cost per day (Rs)
            <input type="text" class="form-control" id="cost" name="cost" placeholder="Cost per day (Rs)" required>
          </div>


          <div class="form-group">
            <input name="uploadedimage" type="file">
          </div>
           <button type="submit" id="submit" name="submit" class="btn btn-success pull-right"> Submit for Rental</button>    
        </form>
      </div>
    </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
<?php
}
else{
  header('Location:../admin login.php');
}
?>