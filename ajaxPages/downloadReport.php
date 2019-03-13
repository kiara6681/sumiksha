<?php include('../connection/connection.php');  

if(isset($_POST['start_date']))
{
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$product = $_POST['product'];
	$customer = $_POST['customer'];
	
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
			
			$structure = "../reports/";
			if(!file_exists($structure))
			{
				mkdir($structure, 0777, true);
			}

			$rep_name = time().".csv";

			$report_name = $structure . $rep_name;

			$file = fopen($report_name, "w");

			$header = "User, Product, Quantity, Price, Date";

			fputcsv($file , explode(',',$header));
			if($count = $result->num_rows>0)
				{
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
							
							$data = $fullname.",".$row['p_name'].",".$row['product_quantity'].",".$row['product_cost'].",".$row['created_date'];
							fputcsv($file , explode(',',$data));
						}
				}
		fclose($file);

		echo $count ."|". $rep_name; 
}
?>
