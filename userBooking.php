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
		<a href="userBooking.php" class="active">Booking Form</a>
		<a href="userView.php">Booking Detail</a>
		<a href="HomePage.html">Logout</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="fa fa-bars"></i></a>
	</div>



	<div class="contact-form">
		
			<h1><b>BOOKING FORM</b></h1>
			<form name = "bookingForm" action = "userAdd.php" method = "post">
				<div class="txtb">
					<label>Full Name:</label>
					<input type="text" id="name" name="name" placeholder="Enter Your Name" required>
				</div>

				<div class="txtb">
					<label>E-mail</label>
					<input type="email" id="email" name="email" placeholder="ex: myEmail@example.com" required>
				</div>

				<div class="txtb">
					<label>Phone Number</label>
					<input type="number" id="phone" name="phone" placeholder="ex: 019-XXXXXXX" onkeypress='return restrictAlphabets(event)' required>
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
					<select id="Package" name="Package" required>
					<option value="A">A: Family package</option>
					<option value="B">B: Holiday package</option>
					<option value="C">C: School Trip package</option>
					</select>
				</div>

				<div class="txtb">
					<label>Number of Adult(s)</label>
					<input type="number"  id="adult" name="adult" min = "0" placeholder="ex: XX"required>
				</div>

				<div class="txtb">
					<label>Number of Children(s)</label>
					<input type="number" id="child" name="child" min = "0" placeholder="ex: XX"required>
				</div>

				<div class="txtb1">
					<label>add-On</label>
					<input type = "checkbox" name = "add[]" value = "Tour Guide">Tour Guide<br>
					<input type = "checkbox" name = "add[]" value = "Car Rental">Car Rental<br>
					<input type = "checkbox" name = "add[]" value = "Complete Meal Set">Complete meal set
				</div>

				<div class="txtb">
					<label>Number of Day(s)</label>
					<input type="number" name= "day" id = "day" min = "0" placeholder="ex: XX"required>
				</div>

				<div class="txtb">
					<label>Depart date</label>
					<input type="date"  id="depart" name="depart" required>
				</div>

				<div class="txtb">
					<label>Return date</label>
					<input type="date"  id="return" name="return" required>
				</div>
				
				<input type="hidden" name="id" value="<?php $_GET['id']?>" />

				<button class="btn" onClick="return confirm('Confirmation to save booking?')"><b>Submit</b></a>
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
		
		function restrictAlphabets(e) {
			var x = e.which || e.keycode;
			if ((x >= 48 && x <= 57) || x == 8 ||
				(x >= 35 && x <= 40) || x == 46)
				return true;
			else
				return false;
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