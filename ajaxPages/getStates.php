<select name="state" id="state" class="form-control">
	<option value="">Select State</option>
<?php   
include('../config.php'); 

if(isset($_POST['countryID']))
{
	$countryID = $_POST['countryID'];
	
	$sql = "SELECT * FROM `state` WHERE `countryid` = '".$countryID."'";
	$result = $conn->query($sql);
	while($row = mysqli_fetch_array($result))
	{
		echo '<option value="'.$row["id"].'">'.$row["state_name"].'</option>';			
	}
}
?>
</select>