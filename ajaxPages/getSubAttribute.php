<select name="subattribute" id="subattribute" class="form-control">
	<option value="">Select SubAttribute</option>
<?php   
include('../connection/connection.php'); 

if(isset($_POST['attributeid']))
{
	$attributeid = $_POST['attributeid'];
	
	$sql = "SELECT * FROM `subattribute` WHERE `attributeid` = '".$attributeid."'";
	$result = $conn->query($sql);
	if($result->num_rows>0)
	{
		while($row = $result->fetch_array())
		{
			echo '<option value="'.$row["id"].'">'.$row["sub_attribute"].'</option>';			
		}
	}
}
?>
</select>