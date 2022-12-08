<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

		td {
			height: 40px;
			padding: 2px;
			border-bottom: 1px solid #ddd;
		}
	
		th {
			color: #FFFFFF;
			height: 40px;
			padding: 2px;
			border-bottom: 1px solid #000;
		}
	
		tr:last-child td{
			border-bottom: 1px solid #000;
		}
		
		form.example input[type=text] {
			padding: 10px;
			font-size: 17px;
			border: 1px solid #979C9C;
			float: left;
			width: 80%;
			background: white;
		}

		form.example button {
			float: left;
			width: 20%;
			padding: 10px;
			background: #07B7C6;
			color: white;
			font-size: 17px;
			border: 1px solid #979C9C;
			border-left: none;
			cursor: pointer;
		}
		
		form.example::after {
			content: "";
			clear: both;
			display: table;
		}
		
		* {
			box-sizing: border-box;
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


	<br><br><br>
	<form class="example" action="adminSearching.php" style="margin:auto;max-width:300px">
	<input type="text" placeholder="Search.." name="search">
	<button type="submit"><i class="fa fa-search"></i></button>
	</form>
	
	<br>

	<div>
		<table style = "margin:auto;text-align:center;font-family:Arial, Helvetica, sans-serif;color:#000;font-size:16px;border-collapse: collapse;">
			<tr bgcolor = "#115050">
			<th width = "270px">Name</th>
			<th width = "230px">Email</th>
			<th width = "130px">Phone Number</th>
			<th width = "160px">Destination</th>
			<th width = "80px">Package</th>
			<th width = "105px">Depart Date</th>
			<th width = "105px">Return Date</th>
			<th width = "140px" colspan = "3" >Option</th>
			</tr>
			<?php
				$sql = "SELECT * FROM booking order by id Desc";
				$result = $connect->query($sql);
				if($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {?>
				  <tr bgcolor = "#FFFFFF">
				  <td><?php echo $row['name']; ?></td>
				  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['phone']; ?></td>
				  <td><?php echo $row['destination']; ?></td>
				  <td><?php echo $row['package']; ?></td>
				  <td><?php echo$row['depart']; ?></td>
				  <td><?php echo$row['return_date']; ?></td>
				  <td><a href="adminView_detail.php?id=<?php echo $row['id']; ?>" style = "text-decoration:none;color:#00494F;" title ="View more detail">Detail</a></td>
				  <td><a href="adminEdit.php?id=<?php echo $row['id']; ?>" style = "text-decoration:none;color:#00494F;" title ="Edit user detail" onclick = "return confirm('Are youre you want to edit this record?')">Edit</a></td>
				  <td><a href="delete.php?id=<?php echo $row['id']; ?>" style = "text-decoration:none;color:#00494F;" title ="Delete user detail" onclick = "return confirm('Are youre you want to delete this record?')">Delete</a></td>
                  </tr>
				<?php } ?>
				
				<?php } else { ?>
				<?php echo "<tr><td colspan='10' bgcolor = '#FFFFFF'><center>No Data Available</center></td></tr>"; ?>
			<?php } ?>
		</table>
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