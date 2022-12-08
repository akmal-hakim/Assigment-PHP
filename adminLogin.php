<?php

include 'db_connect.php';

if(isset($_POST['login']))
{
	$id = '1';
	$username = $_POST['uname'];
    $password = $_POST['psw'];
    $query = "SELECT * FROM admin where id='$id' AND username = '$username' AND password='$password'";
	
	$result = mysqli_query($connect, $query) or die("Query failed");
	
	if (mysqli_num_rows($result) <= 0) 
   {
      echo "<script type='text/javascript'>alert('Wrong password!')</script>";
      header("Refresh:0; url=adminLogin.php");
   }
   else 
   {
      $info = mysqli_fetch_array($result);
	  echo "<script type='text/javascript'>alert('Successfully Login!')</script>";
      //header("Refresh: 0; url=adminoption.php");
   }

   mysqli_close($connect);
?>

<!DOCTYPE html>
<html>
<head>
	<style scoped>
		h1 {
			font-family: Georgia;
			font-size: 30px;
			color: #710F60;
			text-align: center;
		}
		/* Full-width input fields */
		input[type=text], input[type=password] {
		  width: 100%;
		  padding: 12px 20px;
		  margin: 8px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  box-sizing: border-box;
		}
		/* Center the image and position the close button */
		.imgcontainer {
		  text-align: center;
		  margin: 24px 0 12px 0;
		  position: relative;
		}

		img.avatar {
		  width: 20%;
		  border-radius: 50%;
		}

		.container {
		  padding: 16px;
		  margin: 30px;
		}

		span.psw {
		  float: right;
		  padding-top: 16px;
		}
		/* Extra styles for the cancel button */
		.cancelbtn {
		  width: auto;
		  padding: 10px 18px;
		  background-color: #f44336;
		}
		/* Set a style for all buttons */
		button {
		  background-color: #678EE2;
		  color: white;
		  padding: 14px 20px;
		  margin: 8px 0;
		  border: none;
		  cursor: pointer;
		  width: 100%;
		}

		button:hover {
		  opacity: 0.8;
		}
	</style>
</head>
<body>

	<div id="id01" class="login">
		<form class="modal-content animate" action="/action_page.php" method="post">
	    <div class="imgcontainer">
	      <img src="img_avatar2.png" alt="Avatar" class="avatar">
	    </div>
	    <h1>Login</h1>
	    <div class="container">
	      <label for="uname"><b>Username</b></label>
	      <input type="text" placeholder="Enter Username" name="uname" required>
	      <br>
	      <label for="psw"><b>Password</b></label>
	      <input type="password" placeholder="Enter Password" name="psw" required>
	        
	      <button type="submit" name = "login">Login</button>
	      
	    </div>
  </form>
	</div>
</body>
</html>