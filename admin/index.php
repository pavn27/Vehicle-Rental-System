
<?php
$conn = mysqli_connect('localhost', 'root', '', 'carrentalp') or die("Connection Failed");
session_start();
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
		<link rel="stylesheet" href="assets/css/all.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" href="assets/css/main.css">
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
		  		<h1 style="font-size:30px;"><a href="index.html" class="logo">Vehicle Rentals</a></h1>
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
		  
	  <div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Dash</span>Board</h3>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
						</div>
						<h3>Total No of Vehicles</h3>
						<a href="" class="cart-btn"><?php 
						 $query = "SELECT * FROM cars";
						 $result = mysqli_query($conn, $query);
						 $count = mysqli_num_rows($result);
						 echo "$count";?>
						  </a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
						</div>
						<h3>Rented Vehicles</h3>
						<a href="" class="cart-btn">
						<?php 
						 $query = "SELECT * FROM cars WHERE car_availability = 'no'";
						 $result = mysqli_query($conn, $query);
						 $count = mysqli_num_rows($result);
						 echo "$count";?>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
						</div>
						<h3>Total No of Customers</h3>
						<a href="" class="cart-btn"><?php 
						 $query = "SELECT * FROM customers";
						 $result = mysqli_query($conn, $query);
						 $count = mysqli_num_rows($result);
						 echo "$count";?></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
						</div>
						<h3>Vehicle Available</h3>
						<a href="" class="cart-btn"><?php
						$query = "SELECT * FROM cars WHERE car_availability = 'yes'";
						 $result = mysqli_query($conn, $query);
						 $count = mysqli_num_rows($result);
						 echo "$count";?>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
						</div>
						<h3>Total No of Drivers</h3>
						<a href="" class="cart-btn"><?php 
						 $query = "SELECT * FROM driver";
						 $result = mysqli_query($conn, $query);
						 $count = mysqli_num_rows($result);
						 echo "$count";?></a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
						</div>
						<h3>Available Drivers</h3>
						<a href="" class="cart-btn">
						
						<?php 
						 $query = "SELECT * FROM driver Where driver_availability='yes'";
						 $result = mysqli_query($conn, $query);
						 $count = mysqli_num_rows($result);
						 echo "$count";?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/main.js"></script>
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
	header("Location:../admin login.php");
}
?>