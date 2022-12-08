<?php 
 
include 'db_connect.php';

if($_POST) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	$des = $_POST['destination'];
	$pack = $_POST['Package'];
	$adult = $_POST['adult'];
	$child = $_POST['child'];
	$day = $_POST['day'];
	$depart = $_POST['depart'];
	$return = $_POST['return'];
	$addOn = " ";
	$price = 0.0;
	if(isset($_POST['add']))
	{
		if(!empty($_POST['add']))
		{
			foreach($_POST['add'] as $selected)
			{
				$addOn = $addOn.$selected." ";
				if($selected == "Tour Guide")
				{
					$price = $price + 100.00;
				}
				else if($selected == "Car Rental")
				{
					$price = $price + (120 * $day);
				}
				else if($selected == "Complete Meal Set")
				{
					$price = $price + (35 * $adult) + (15 * $child);
				}
			}
		}
	}
	else
	{
		$addOn = "-";
	}
	
	if($des == "Pulau Langkawi")
	{
		$price = $price + 298.00;
	}
	else if($des == "Pulau Tioman")
	{
		$price = $price + 400.00;
	}
	else if($des == "Penang")
	{
		$price = $price + 311.00;
	}
	else if($des == "Melaka")
	{
		$price = $price + 500.00;
	}
	else if($des == "Sabah")
	{
		$price = $price + 505.00;
	}
	else if($des == "Kuching")
	{
		$price = $price + 394.00;
	}
	else if($des == "Cameron Highland")
	{
		$price = $price + 327.00;
	}
	
	if($pack == 'A')
	{
		$price = $price * 0.85;
	}
	else if($pack == 'B')
	{
		$price = $price * 0.75;
	}
	else if($pack == 'C')
	{
		$price = $price * 0.80;
	}
	
	$totprice = number_format((float)$price, 2, '.', ' ');
	
	$sql = "INSERT INTO booking (name, email, phone, gender, destination, package, num_adult, num_child, add_on, no_day, depart, return_date, price) VALUES ('$name', '$email', '$phone', '$gender', '$des', '$pack', '$adult', '$child', '$addOn', '$day', '$depart', '$return', '$price')";
	if($connect->query($sql) === TRUE) {
        echo "<script> alert('New Record Succesfully Added!');</script>";
		header("Refresh:0; url=adminAdd.php");
    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }
 
    $connect->close();
}
 
?>