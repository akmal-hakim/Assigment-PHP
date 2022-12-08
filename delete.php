<?php 
 include 'db_connect.php';		                                                   
   $delete_id=$_GET['id']; 
   $query = "DELETE FROM booking WHERE id='$delete_id'";		
	   $result = mysqli_query( $connect,$query) or die("Query failed");	
       if ($result)	{						                      
          echo "<script> alert('Record Successfully Deleted!');</script>";
		  header("Refresh:0; url=adminView.php");
	   }
		else
          echo "Problem occured !"; 

    mysqli_close($connect);   
?>
