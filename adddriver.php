<?php
session_start();
require 'connection.php';
$conn = Connect();
if(isset($_POST['submit'])) {
  $driver_name = $conn->real_escape_string($_POST['driver_name']);
  $dl_number = $conn->real_escape_string($_POST['dl_number']);
  $driver_phone = $conn->real_escape_string($_POST['driver_phone']);
  $driver_address = $conn->real_escape_string($_POST['driver_address']);
  $driver_gender = $conn->real_escape_string($_POST['driver_gender']);
  $driver_availability = "yes";
$query = "SELECT driver_name, dl_number FROM driver WHERE driver_name='$driver_name' AND dl_number='$dl_number' LIMIT 1";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
$client_username =$_SESSION['client_username'];
if ($count == 0) {
  try{
$query = "INSERT into driver(driver_name,dl_number,driver_phone,driver_address,driver_gender,client_username,driver_availability) VALUES('" . $driver_name . "','" . $dl_number . "','" . $driver_phone . "','" . $driver_address . "','" . $driver_gender ."','" . $client_username ."','" . $driver_availability ."')";
$success = $conn->query($query);
$x=0;
$y=0;
$q1="INSERT into rented(driver,latitude,longitude) VALUES('".$driver_name."','".$x."','".$y."')";
$conn->query($q1);
echo "<script>alert('successfully added');</script>;";
}
catch(Exception $e)
{
  echo "<script> alert('Please enter your valid License number')</script>";

}
?>
<?php
}
else{ ?>
     <script> alert("Vehicle with the same vehicle number already exists");
        location.replace("enterdriver.php");</script>
</div>
<?php	
}

$conn->close();
}
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
  <br><br>

    <div class="container" style="margin-top: 65px;" >
    <div class="col-md-7" style="float: none; margin: 0 auto;">
      <div class="form-area">
        <form role="form" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Enter Driver Details </h3>

          <div class="form-group" style="color:black;">
          <label>Driver Name</label>
            <input type="text" class="form-control" id="driver_name" name="driver_name" placeholder="Driver Name " required autofocus="">
          </div>

          <div class="form-group">
            <label>Driving License Number</label>
            <input type="text" class="form-control" id="dl_number" name="dl_number" placeholder="Driving License Number" required>
          </div>     

          <div class="form-group">
            <label>Contact</label>
            <input type="text" class="form-control" id="driver_phone" name="driver_phone" placeholder="Contact" required>
          </div>

          <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" id="driver_address" name="driver_address" placeholder="Address" required>
          </div>

          <div class="form-group">
            <label>Gender</label>
            <input type="text" class="form-control" id="driver_gender" name="driver_gender" placeholder="Gender" required>
          </div>

           <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"> Add Driver</button>    
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
else
{
  header('Location:../admin login.php');
}
?>