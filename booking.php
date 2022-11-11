
<?php
session_start();
require 'connection.php';
$conn = Connect();
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
        
<?php  

$sql1 = "SELECT * FROM rentedcars";
$result1 = $conn->query($sql1);

if (mysqli_num_rows($result1) > 0) {
?>
<div class="container">
<br><br><br>
  <div class="jumbotron">
    <h1 class="text-center">Total Bookings</h1>
  </div>
</div>

<div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
<table class="table table-striped">
<thead class="thead-dark">
<tr>
<th width="15%">Car</th>
<th width="15%">Start Date</th>
<th width="15%">End Date</th>
<th width="15%">Number of Days</th>
<th width="15%">Total Amount</th>
</tr>
</thead>
<?php
    while($row = mysqli_fetch_assoc($result1)) {
?>
<tr>
<td><?php echo $row["vehicle_name"]; ?></td>
<td><?php echo $row["rent_start_date"] ?></td>
<td><?php echo $row["rent_end_date"]; ?></td>
<td><?php echo $row["no_of_days"]; ?> </td>
<td>Rs.  <?php echo $row["cost"] * $row["no_of_days"]; ?></td>
</tr>
<?php        } ?>
            </table>
            </div> 
    <?php } else {
        ?>
    <div class="container">
  <div class="jumbotron">
    <h1 class="text-center">You have not rented any cars till now!</h1>
    <p class="text-center"> Please rent cars in order to view your data here. </p>
  </div>
</div>

        <?php
    } ?>   
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