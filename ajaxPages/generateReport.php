<?php   
include('../connection/connection.php'); 

$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$customer = $_POST['customer'];
$product = $_POST['product'];
?>

<script>
$(document).ready(function(){
	// Initiate a variable to contain datatable instance
	var myTable = $('#example').DataTable({
		"pageLength": 10,
		"lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
		"columnDefs": [
			{"className": "dt-center", "targets": "_all"}
		  ]
	}); 
	
	//ajax for download clinic report
	$("#downloadReport").click(function(e){
		var start_date = "<?= $start_date; ?>";
		var end_date = "<?= $end_date; ?>";
		var product = "<?= $product; ?>";
		var customer = "<?= $customer; ?>";
		
		$.ajax({
			
			type: "POST",
			url: "ajaxPages/downloadReport.php",
			data: {start_date:start_date, end_date:end_date, product:product, customer:customer},
			success:function(data)
			{
				console.log(data);
				var temp = data.split("|");
				
				if(temp[0] > 0 )
				{
					alert("Report Generated Successfully");
					//alert(data);
					window.open("reports/"+temp[1], "_blank");
				}
				else
				{
					alert("NO DATA FOUND !");
				}
			}
		}); 
	});
	
});

</script>

<?php
$sql = "SELECT trans.*, prod.p_name ,
		IFNULL(user.fname, '') fname, IFNULL(user.lname, '') lname, IFNULL(guser.fname, '') gfname, IFNULL(guser.lname, '') glname
		FROM `transactions` trans 
		JOIN `product` prod ON prod.id = trans.product_id 
		LEFT JOIN `user_registration` user ON user.id = trans.user_id
		LEFT JOIN `guest_users` guser ON guser.guest_user_id = trans.user_id
		WHERE trans.status = '1'";

if($start_date != '')
{
	$sql .= " AND trans.created_date >= '".$start_date."'";
}
if($end_date != '')
{
	$sql .= " AND trans.created_date <= '".$end_date."'";
}
if($customer != '' && $customer != '-1')
{
	$sql .= " AND user.id = '".$customer."'";
} 
if($customer == '-1')
{
	$sql .= " AND guser.guest_user_id IN (SELECT guest_user_id FROM guest_users WHERE status = '1')";
} 
if($product != '')
{
	$sql .= " AND trans.product_id = '".$product."'";
}

$result = $conn->query($sql);
if($result->num_rows>0)
{
	?>
	
	
	<div class="table-responsive no-border">
		<table id="example" class="table table-bordered table-striped mg-t datatable editable-datatable">
			<thead>
				<tr>   
					<th>User</th>
					<th>Product</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Date</th>
				</tr>
			</thead>
			
			<tbody>
		<?php
		while($row = $result->fetch_array())
		{
			if($row['fname'] != '' || $row['lname'] != '')
			{
				$fullname = $row['fname']." ". $row['lname'];
			}
			if($row['gfname'] != '' || $row['glname'] != '')
			{
				$fullname = $row['gfname']." ". $row['glname'];
			}		
			
			?>
				<tr>
					<td><?= $fullname; ?></td>
					<td><?= $row['p_name']; ?></td>
					<td><?= $row['product_quantity']; ?></td>
					<td><?= $row['product_cost']; ?></td>
					<td><?= $row['created_date']; ?></td>
				</tr>
			<?php
		}
		?>
			</tbody>
		</table> 
		
		<button class="btn btn-info" name="downloadReport" id="downloadReport">Download Report</button>
	</div>
	<?php
}

?>