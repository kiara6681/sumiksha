<?php
@ini_set("display_errors", 0);
error_reporting( E_ALL );
session_start();
include("connection/connection.php");

$username = $_POST['username'];
$password = $_POST['password'];

$password = sha1($password);

$sql = "SELECT * FROM `user_registration` WHERE `email` = '".$username."' AND `password` = '".$password."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{	
	$row = $result->fetch_array();
	
	/* $sql = "UPDATE `users` SET `logged_in` = '1' WHERE `id` = '".$row['id']."'";
	$conn->query($sql); */
	
	$_SESSION['user'] = $row['id'];
	$_SESSION['username'] = $row['fname']." ".$row['fname'];
	$_SESSION['user_email'] = $row['email'];
	
	// Now redirect to index page
	include("../classes/functions.php");
	$f = new functions();
	$f->redirect("home.php");
	 
}
else
{
	$msg = "Invalid Access";
	include("../classes/functions.php");
	$f = new functions();
	$f->redirect('index.php?msg='.$msg);
}
?>