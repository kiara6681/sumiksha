<?php
include('../connection/config.php'); 
	
if(isset($_POST['username']))
{
	$username = $_POST['username'];

	$sql = "SELECT * FROM login WHERE username = '".$username."'";
	
	$result = $conn->query($sql);
	
	if($result->num_rows> 0)
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
	
	exit();
}
?>