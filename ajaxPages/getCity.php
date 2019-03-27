<select name="city_id" id="city" class="form-control">
	<option value="">Select City</option>
<?php   
include("../connection/config.php"); 

if(isset($_POST['stateid']))
{
	$stateid = $_POST['stateid'];
	
	$sql = "SELECT * FROM `cities` WHERE `state_id` = '".$stateid."'";
	$result = $conn->query($sql);
	while($row = mysqli_fetch_array($result))
		{
			echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';			
		}
}
?>
</select>