<?php
include 'db_connect.php';
$id = $_GET['id'];
$query = "Select * from booking WHERE id = '$id'";
$result = mysqli_query($connect, $query)or die("Query failed");

while ($row3 = mysqli_fetch_array($result)) {
    $name = $row3['name'];
    $email = $row3['email'];
    $phone = $row3['phone'];
    $gender = $row3['gender'];
    $destination = $row3['destination'];
    $package = $row3['package'];
    $adult = $row3['num_adult'];
	$child = $row3['num_child'];
    $addOn = $row3['add_on'];
	$day = $row3['no_day'];
	$depart = $row3['depart'];
	$return = $row3['return_date'];
	$price = $row3['price'];
  }

?>

<!DOCTYPE html>
<html>

<head>

	<title>Booking Form</title>

	<style type="text/css">

		.topnav {
		  overflow: hidden;
		  background-color: #BF1E76;
		}
		.topnav a {
		  float: left;
		  display: block;
		  color: #f2f2f2;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		  font-size: 20px;
		}
		.topnav a:hover {
		  background-color: #ddd;
		  color: black;
		}
		.topnav a.active {
		  background-color: #2D6BD1;
		  color: white;
		}
		.topnav .icon {
		  display: none;
		}

		footer{
     	 	padding: 10px 20px;
     		background: #666;
     		color: white;
      	}


		body{
			margin: 0;
			padding: 0;
			background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(background.jpg)
		}

		.contact-form{
			width: 80%;
			max-width: 1200px;
			background: #f1f1f1;
			position: absolute;
			top: 110%;
			left: 50%;
			transform: translate(-50%,-50%);
			padding: 30px 40px;
			box-sizing: border-box;
			border-radius: 8px;
			text-align: center;
			box-shadow: 0 0 20px #000000b3;
			font-family: "Montserrat", sans-serif
		}

		.contact-form h1{
			margin-top: 0;
			font-weight: 300;

		}

		.txtb option,select{
			font-size: 	20px;
		}


		.txtb, .txtb1{
			border: 1px solid gray;
			margin: 8px 0;
			padding: 12px 18px;
			border-radius: 8px;
		}

		.txtb,.txtb1 label{
			display: block;
			text-align: left;
			color: #333;
			text-transform: uppercase;
			font-size: 20px;			
		}

		.txtb input, .txtb textarea{
			width: 100%;
			border: none;
			background: none;
			outline: none;
			font-size: 18px;
			margin-top: 6px;
		}

		.btn{
			display: inline-block;
			background: #9b59b6;
			padding: 14px 0;
			color: white;
			text-transform: uppercase;
			cursor: pointer;
			margin-top: 8px;
			width: 50%;
		}

		.radio{
			font-size:20px;
		}

		footer {
			font-family: georgia;
			font-size:20px;
			text-align: center;
		}


	</style>
		


</head>



<body>

		<div class="topnav" id="myTopnav">
		<a href="adminBooking.php" >Add Booking</a>
		<a href="adminView.php" class="active">View Booking</a>
		<a href="HomePage.html">Logout</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fa fa-bars"></i></a>
	</div>


	<div class="contact-form">
		
			<h1><b>USER BOOKING DETAIL</b></h1>
			<form name = "bookingDetail">
				<div class="txtb">
					<label>Full Name:</label>
					<input type="text" id="name" name="name" value="<?php echo $name; ?>" readonly>
				</div>

				<div class="txtb">
					<label>E-mail</label>
					<input type="email" id="email" name="email" value="<?php echo $email; ?>" readonly>
				</div>

				<div class="txtb">
					<label>Phone Number</label>
					<input type="number" id="phone" name="phone" value="<?php echo $phone; ?>" readonly>
				</div>


				<div class="txtb">
					<label>Gender</label>
					<input type="text" name = "gender" value="<?php echo $gender; ?>" readonly>
				</div>

				<div class="txtb">
					<label>Destination :</label>
					<input type = "text" id="destination" name="destination" value="<?php echo $destination; ?>" readonly>
				</div>


				<div class="txtb">
					<label>Package:</label>
					<input type = "text" id="package" name="package" value="<?php echo $package; ?>" readonly>
				</div>

				<div class="txtb">
					<label>Number of Adult(s)</label>
					<input type="number"  id="adult" name="adult" value="<?php echo $adult; ?>" readonly>
				</div>

				<div class="txtb">
					<label>Number of Children(s)</label>
					<input type="number" id="child" name="child" value="<?php echo $child; ?>" readonly>
				</div>

				<div class="txtb">
					<label>add-On</label>
					<input type = "text" id="addOn" name="addOn" value="<?php echo $addOn; ?>" readonly>
				</div>

				<div class="txtb">
					<label>Number of Day(s)</label>
					<input type="number" name= "day" id = "day" value="<?php echo $day; ?>" readonly>
				</div>

				<div class="txtb">
					<label>Depart date</label>
					<input type="text" id="depart" name="depart"  value="<?php echo $depart; ?>" readonly>
				</div>

				<div class="txtb">
					<label>Return date</label>
					<input type="text" id="return" name="return" value="<?php echo $return; ?>" readonly>
				</div>
				
				<div class="txtb">
					<label>Total Price</label>
					<input type="text" id="price" name="price" value="<?php echo "RM ".$price; ?>" readonly>
				</div>

			</form>
	</div>


		<script>
		function myFunction() {
			var x = document.getElementById("myTopNav");
			if (x.className === "topnav") {
				x.className += " responsive";
			} else {
				x.className = "topnav";
			}
		}
		</script>


</body>


	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br>
	<footer>
      <p>Company Tour De' Malaysia Travel Agency. All rights reserved. JCS1105N</p>
    </footer>

</html>