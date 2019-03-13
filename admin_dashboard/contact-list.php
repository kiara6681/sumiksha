<?php include('../includes/header.php');?>
<style>
	.modal-footer .btn+.btn
	{
	    margin-bottom: 5px!important;
	}
</style>
<?php 

    if(isset($_REQUEST['delete']))
    {
        $id=$_REQUEST['delete'];

        $delete = "delete from text where id='$id'";

        if($conn->query($delete))
        {
            //echo "Delete Succesfully";
        }
    }

?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Tables</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url();?>includes/admin_home.php">Home</a>
            </li>
            <li>
                <a>Tables</a>
            </li>
            <li class="active">
                <strong>Data Tables</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <!-- <div class="ibox-title">
                    <a href="content.php" class="btn btn-success"><i class="fa fa-plus"></i> add</a>
                </div> -->
                <div class="ibox-content">
					<div class="table-responsive">
	                    <table class="table table-striped table-bordered table-hover dataTables-example" >
		                    <thead>
		                    <tr>
		                        <th>S.No.</th>
		                        <th>Email Id</th>
                                <th>Phone</th>
		                        <th>Fax</th>
		                        <th>Address</th>
		                        <th>Action</th>
		                    </tr>
		                    </thead>
		                    <tbody>
								<?php 
									$sql_cmp=$conn->query("select * from text order by id ASC");
									$count=1;
									while($data_cmp=mysqli_fetch_array($sql_cmp))
									{
								?>
			                    <tr class="gradeX">
									<td><?php echo $count; ?></td>
			                        <td><?php echo $data_cmp['email']; ?></td>
                                    <td><?php echo $data_cmp['phone']; ?></td>
			                        <td><?php echo $data_cmp['fax']; ?></td>
			                        <td><?php echo $data_cmp['address']; ?></td>
			                        <td class="center">
			                        	<a href="contact_edit.php?id=<?php echo $data_cmp['id']; ?>" class="btn btn-primary btn-circle">
			                        		<i class="fa fa-pencil-square-o"></i>
			                        	</a>
			                       </td>
			                    </tr>
								<div id="<?= $data_cmp['id'];?>" class="modal fade animated shake" role="dialog">
									<div class="modal-dialog">

										<!-- Modal content-->
										<div class="modal-content">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Delete Category</h4>
										  </div>
										  <div class="modal-body">
											<p>Are you sure you want to Delete ?</p>
											<input type="hidden" id="delt" value="<?= $data_cmp['id'];?>"> 
										  </div>
										  <div class="modal-footer">
											<form method="post">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button class="btn btn-danger" type="submit" name="delete" value="<?php echo $data_cmp['id']; ?>">Delete</button>
											</form>
										  </div>
										</div>

									</div>
								</div>								

								<div id="<?= $data_cmp['id'];?>" class="modal fade animated shake" role="dialog">
									<div class="modal-dialog">

										<!-- Modal content-->
										<div class="modal-content">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Delete Category</h4>
										  </div>
										  <div class="modal-body">
											<p>Are you sure you want to Delete ?</p>
											<input type="hidden" id="delt" value="<?= $data_cmp['id'];?>"> 
										  </div>
										  <div class="modal-footer">
											<form method="post">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<button class="btn btn-danger" type="submit" name="delete" value="<?php echo $data_cmp['id']; ?>">Delete</button>
											</form>
										  </div>
										</div>

									</div>
								</div>
                            <?php $count++; }?>
		       				</tbody>
	                   </table>
                    </div>
				</div>
            </div>
    	</div>
    </div>
</div>
<?php include('../includes/footer.php');?>