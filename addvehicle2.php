
<html>
  <head>
    <title> Add vehicle </title>
  </head>
  <?php session_start(); ?>
  <link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/customerlogin.css">

    <link rel="stylesheet" href="assets/w3css/w3.css">
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

  <body>

<?php
require("connection.php");
$conn = Connect();
$car_name = $_POST['car_name'];
$car_nameplate =$_POST['car_nameplate'];
$cost = $_POST['cost'];
$car_availability = "yes";
$query = "SELECT car_name, car_nameplate FROM cars WHERE car_name='$car_name' AND car_nameplate='$car_nameplate' LIMIT 1";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
	  if ($count == 0) {
      $imagename=$_FILES["uploadedimage"]["name"];
      $target_path = "assets/img/cars/".$imagename;
      $query = "INSERT into cars(car_name,car_nameplate,car_img,cost,car_availability) VALUES('" . $car_name . "','" . $car_nameplate . "','".$target_path."','".$cost."','" . $car_availability ."')";
        $success = $conn->query($query);
        
        echo "<script>alert('Successfully added');</script>";
        ?><scriprt>
location.replace("addvehicle.php");
</script>
<?php
    }
       else {?>
      
        
</div>
<script>alert('Car with the same vehicle number already exists!');
location.replace("addvehicle.php");
</script>

 <?php	


    }


?>

    </body>
</html>