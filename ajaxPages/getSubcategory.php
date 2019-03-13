<select name="subcategory" id="subcategory" class="form-control">
	<option value="">Select Subcategory</option>
<?php   
include("../connection/config.php"); 

if(isset($_POST['categoryid']))
{
	$categoryid = $_POST['categoryid'];
	
	$sql = "SELECT * FROM `course1` WHERE `course_id` = '".$categoryid."'";
	$result = $conn->query($sql);
	while($row = mysqli_fetch_array($result))
		{
			echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';			
		}
}
?>
</select>