<?php include('../includes/header.php');?>
<?php

$id=$_REQUEST['id'];
$sql1=$conn->query("select * from text where id=$id");
$data1=mysqli_fetch_array($sql1);

if(isset($_REQUEST['submit']))
{
	$address = $_POST['address'];
    $phone = $_POST['phone'];
	$fax = $_POST['fax'];
	$email = $_POST['email'];
	//$content = $_POST['content'];
	//$updated_date = date("Y-m-d");
	
    
   if(mysqli_query($conn, "UPDATE `text` SET `address` = '".$address."', `phone` = '".$phone."', `fax` = '".$fax."', `email` = '".$email."' WHERE `id` = '$id'")){
   echo "<script language='javascript'>alert('Successfully Updated !');window.location = 'contact-list.php';</script>";
      echo mysql_error();
   }
}

?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Edit Form</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url();?>includes/admin_home.php">Home</a>
                </li>
                <li>
                    <a>Forms</a>
                </li>
                <li class="active">
                    <strong>Edit Form</strong>
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
                  	<div class="ibox-content">
                        <form method="post" class="form-horizontal"  enctype="multipart/form-data">
                            
							<div class="form-group">
                                <label class="col-sm-2 control-label">Email Id</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" value="<?php echo $data1['email']; ?>" class="form-control" required>
                                </div>
                            </div>		
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Phone No.</label>
                                <div class="col-sm-10">
                                    <input type="text" name="phone" value="<?php echo $data1['phone']; ?>" class="form-control" required>
                                </div>
                            </div>							
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Fax</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fax" value="<?php echo $data1['fax']; ?>" class="form-control" required>
                                </div>
                            </div>	
                            <div class="form-group"><label class="col-sm-2 control-label">Address</label>
								<div class="col-sm-10">
									<textarea placeholder="address" class="form-control summernote" name="address">
                                    <?php echo $data1['address']; ?>                              
                                    </textarea>
								</div>
                            </div>
    
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-white" type="submit">Cancel</button>
                                    <input type="submit" value="Save changes" name="submit" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div>
            <strong>Copyright</strong> &copy; 2017 Designed by <a href="http://dexusmedia.com/" target="_blank">Dexus Media</a>
        </div>
    </div>
<?php include('../includes/footer_scripts.php');?>