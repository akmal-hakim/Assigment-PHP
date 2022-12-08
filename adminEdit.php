<?php
include 'db_connect.php';
$id = $_GET['id'];
$query = "Select * from booking WHERE id = '$id'";
$result = mysqli_query($connect, $query)or die("Query failed");

while ($row4 = mysqli_fetch_array($result)) {
    $name = $row4['name'];
    $email = $row4['email'];
    $phone = $row4['phone'];
    $gender = $row4['gender'];
    $destination = $row4['destination'];
    $package = $row4['package'];
    $adult = $row4['num_adult'];
	$child = $row4['num_child'];
    $addOn = $row4['add_on'];
	$day = $row4['no_day'];
	$depart = $row4['depart'];
	$return = $row4['return_date'];
	$price = $row4['price'];
  }


?>

<?php
if (isset($_POST['save'])){
    $id = $_GET['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	$des = $_POST['destination'];
	$pack = $_POST['package'];
	$adult = $_POST['adult'];
	$child = $_POST['child'];
	$day = $_POST['day'];
	$depart = $_POST['depart'];
	$return = $_POST['return'];
	$price = $_POST['price'];
	$addOn = " ";
	if(isset($_POST['add']))
	{
		if(!empty($_POST['add']))
		{
			foreach($_POST['add'] as $selected)
			{
				$addOn = $addOn.$selected." ";
			}
		}
	}
	else
	{
		$addOn = "-";
	}
	
	$id = $_GET['id'];
	
	$sql = "UPDATE booking SET name = '$name', email = '$email', phone = '$phone', gender = '$gender', destination = '$des', package = '$pack', num_adult = '$adult', num_child = '$child', add_on = '$addOn', no_day = '$day', depart = '$depart', return_date = '$return', price = '$price' WHERE id = '$id'";
	if($connect->query($sql) === TRUE) {
        echo "<script> alert('Record Successfully Updated!');</script>";
		header("Refresh: 0; url=adminView2.php?id=$id");
		
    } else {
        echo "Erorr while updating record : ". $connect->error;
		header("Refresh: 0; url=adminEdit.php?id=$id");
    }
 
    $connect->close();
 
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
			width: 100%;
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
		<a href="adminBooking.php">Add Booking</a>
		<a href="adminView.php" class="active">View Booking</a>
		<a href="HomePage.html">Logout</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fa fa-bars"></i></a>
	</div>


	<div class="contact-form">
		
			<h1><b>EDIT BOOKING DETAIL</b></h1>
			<form name = "editBooking" action = " " method = "post">
				<div class="txtb">
					<label>Full Name:</label>
					<input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
				</div>

				<div class="txtb">
					<label>E-mail</label>
					<input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
				</div>

				<div class="txtb">
					<label>Phone Number</label>
					<input type="number" id="phone" name="phone" value="<?php echo $phone; ?>" onkeypress='return restrictAlphabets(event)' required>
				</div>


				<div class="txtb1">
					<label>Gender</label>
					<input type="radio" name="gender" value="Male" required>Male
					<input type="radio" name="gender" value="Female"> Female
				</div>

				<div class="txtb">
					<label>Destination :</label>
					<select id="destination" name="destination" required>
					<option value="Pulau Langkawi">Pulau Langkawi</option>
					<option value="Pulau Tioman">Pulau Tioman</option>
					<option value="Penang">Penang</option>
					<option value="Melaka">Melaka</option>
					<option value="Sabah">Sabah</option>
					<option value="Kuching">Kuching</option>
					<option value="Cameron Highland">Cameron Highland</option>
					</select>
				</div>


				<div class="txtb">
					<label>Package:</label>
					<select id="package" name="package" required>
					<option value="A">A: Family package</option>
					<option value="B">B: Holiday package</option>
					<option value="C">C: School Trip package</option>
					<option value="melaka">Melaka</option>
					</select>
				</div>

				<div class="txtb">
					<label>Number of Adult(s)</label>
					<input type="number"  id="adult" name="adult" value="<?php echo $adult; ?>" required>
				</div>

				<div class="txtb">
					<label>Number of Children(s)</label>
					<input type="number" id="child" name="child" value="<?php echo $child; ?>" required>
				</div>

				<div class="txtb1">
					<label>add-On</label>
					<input type = "checkbox" name = "add[]" value = "Tour Guide">Tour Guide<br>
					<input type = "checkbox" name = "add[]" value = "Car Rental">Car Rental<br>
					<input type = "checkbox" name = "add[]" value = "Complete Meal Set">Complete meal set
				</div>

				<div class="txtb">
					<label>Number of Day(s)</label>
					<input type="number" name= "day" id = "day" value="<?php echo $day; ?>" required>
				</div>

				<div class="txtb">
					<label>Depart date</label>
					<input type="text" id="depart" name="depart"  value="<?php echo $depart; ?>" required>
				</div>

				<div class="txtb">
					<label>Return date</label>
					<input type="text" id="return" name="return" value="<?php echo $return; ?>" required>
				</div>
				
				<div class="txtb">
					<label>Total Price (RM)</label>
					<input type="text" id="price" name="price" value="<?php echo $price; ?>" readonly>
				</div>

				<input type="hidden" name="id" value="<?php echo $row4['id']?>" />
				
				<button class="btn" onClick="return confirm('Confirmation to save record?')" name = "save"><b>Save</b>
			</form>
				<button class="btn" onClick="calcPrice()"><b>Calculate Price</b>
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
		
		function restrictAlphabets(e) {
			var x = e.which || e.keycode;
			if ((x >= 48 && x <= 57) || x == 8 ||
				(x >= 35 && x <= 40) || x == 46)
				return true;
			else
				return false;
		}
		
		function calcPrice() {
			var priceAdd = 0.0;
			var priceDes;
			var totalPrice;
			var price;
			var addOn = document.getElementsByName('add[]');
			var day = document.editBooking.day.value;
			var adult = document.editBooking.adult.value;
			var child = document.editBooking.child.value;
			var des = document.editBooking.destination.value;
			var pack = document.editBooking.package.value;
			
			if(addOn[0].checked)
			{
				priceAdd = priceAdd + 100.00;
			}
			if(addOn[1].checked)
			{
				priceAdd = priceAdd + (120.00 * day);
			}
			if(addOn[2].checked)
			{
				priceAdd = priceAdd + (35 * adult) + (15 * child);
			}
			
			if(des == "Pulau Langkawi")
			{
				priceDes = 298.00;
			}
			else if(des == "Pulau Tioman")
			{
				priceDes = 400.00;
			}
			else if(des == "Penang")
			{
				priceDes = 311.00;
			}
			else if(des == "Melaka")
			{
				priceDes = 500.00;
			}
			else if(des == "Sabah")
			{
				priceDes = 505.00;
			}
			else if(des == "Kuching")
			{
				priceDes = 394.00;
			}
			else if(des == "Cameron Highland")
			{
				priceDes = 327.00;
			}
			
			totalPrice = priceAdd + priceDes;
			
			if(pack == "A")
			{
				price = totalPrice * 0.85;
			}
			else if(pack == "B")
			{
				price = totalPrice * 0.75;
			}
			else  if(pack == "C")
			{
				price = totalPrice * 0.80;
			}
			
			document.editBooking.price.value = price.toFixed(2);
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