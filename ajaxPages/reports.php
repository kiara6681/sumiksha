<?php 
include('header.php');
include('leftbar.php');

$msg='';

?>
<script language="javascript"> 
	//pop up script
	$(document).ready(function(e){
		
		// binds form submission and fields to the validation engine
		$("#report_form").validationEngine({promptPosition : "topLeft"});
		
		// generate report_form
		$("#generateReport").click(function(){
			var data = $("#report_form").serialize();
			
			$.ajax({
				url : "ajaxPages/generateReport.php",
				type : "POST",
				data : data,
				success : function(data)
				{
					//alert(data);
					$("#showReport").html(data);
				}
			});			
		});
	});
</script>

<section class="main-content"> 
	<div class="content-wrap"> 
		<div class="wrapper"> 
			<section class="panel panel-default">

				<header class="panel-heading">
					<h2><b>Sell Reports</b></h2> 
				</header>
				<div class="panel-body">
				
				<?php
				if($msg != '')
				{
					?>
						<div class="alert alert-success"><?= $msg?></div>
					<?php
				}
				?>
					<form role="form" method="post" action="" enctype="multipart/form-data" class="parsley-form" id="report_form">
						<div class="row">

							<div class="col-sm-6">
								<div class="form-group">
									<label>Start Date</label>
									<div>
										<input data-uk-datepicker="{format:'YYYY-MM-DD'}" type="text" name="start_date" id="start_date" class="form-control datepicker" placeholder="Start Date">
									</div>
								</div>
							</div>
							  
							<div class="col-sm-6">
								<div class="form-group">
									<label>End Date</label>
									<div>
										<input data-uk-datepicker="{format:'YYYY-MM-DD'}" type="text" name="end_date" id="end_date" class="form-control datepicker" placeholder="End Date">
									</div>
								</div>
							</div>
											
							<?php
								$sql = "SELECT * FROM `user_registration` WHERE id != '1'";
								$result = $conn->query($sql);
								if($result->num_rows>0)
								{
									?>
									<div class="form-group col-md-6">
										<label>Customer</label>
										<div>
											<select name="customer" id="customer" class="form-control">
												<option value="">Select Customer</option>
												<?php
												while($row = $result->fetch_array())
												{
													?>
														<option value="<?= $row['id']; ?>"><?= $row['fname']." ".$row['fname']; ?></option>
													<?php
												}
												?>
											</select>
										</div>
									</div>
									<?php
								}
							?>
							
							<?php
								$sql_prod = "SELECT * FROM `product` WHERE status = '1'";
								$result_prod = $conn->query($sql_prod);
								if($result_prod->num_rows>0)
								{
									?>
									<div class="form-group col-md-6">
										<label>Product</label>
										<div>
											<select name="product" id="product" class="form-control">
												<option value="">Select Product</option>
												<?php
												while($row = $result_prod->fetch_array())
												{
													?>
														<option value="<?= $row['id']; ?>"><?= $row['p_name']; ?></option>
													<?php
												}
												?>
											</select>
										</div>
									</div>
									<?php
								}
							?>
																					
							<div class="col-md-12">
							
								<div class="form-group text-center">
									<label></label>
									<div>
										<input type="button" name="generateReport" id="generateReport" Value="Generate Report" class="btn btn-primary btn-block btn-lg btn-parsley">
									</div>
								</div>

							</div>
							
						</div>
					</form>
					
					<div id="showReport">
					</div>
					
				</div>
			</section> 
		</div>
	</div>

<?php include('footer.php'); ?>