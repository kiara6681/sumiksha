<?php include('../includes/header.php');?>
<?php
$id=$_REQUEST['id'];
$sql1=$conn->query("select * from aboutus where id=$id");
$data1=mysqli_fetch_array($sql1);

if(isset($_REQUEST['submit']))
{
    $name1=$_REQUEST['name'];
    $name=str_replace("'","\'",$name1);
    $metatitle=$_REQUEST['metatitle'];
    $photo=$_FILES['photo'];
    $photo_image_name=$photo['name'];
    $photo_tmp_name=$photo['tmp_name'];
    $target="uploads/products/$photo_image_name";
    $string=$_REQUEST['Aneg'];
    $aneg = str_replace("'", "\'", $string);
   
    
    if($photo_image_name)
    {
        mysqli_query($conn, "UPDATE `aboutus` SET `name` = '$name', `image` = '$photo_image_name', `about_content` = '$aneg' WHERE `id` = $id;");
        echo "<script language='javascript'>alert('Successfully Updated !');window.location = 'content-list.php';</script>";
        move_uploaded_file($photo_tmp_name, $target);
       echo mysql_error();
    }
    
    else
    {
    mysqli_query($conn, "UPDATE `aboutus` SET `name` = '$name', `about_content` = '$aneg' WHERE `id` = $id;");
        echo "<script language='javascript'>alert('Successfully Updated !');window.location = 'content-list.php';</script>";
        move_uploaded_file($photo_tmp_name, $target);
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
                                <label class="col-sm-2 control-label">Name</label>
								<div class="col-sm-10">
                                    <input type="text" name="name" value="<?php echo $data1['name']; ?>" class="form-control">
                                </div>
                            </div>
                        
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Upload Image</label>
								<div class="col-sm-10">
                                    <input type="file" class="form-control" name="photo">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Description</label>
								<div class="col-sm-10">
									<textarea placeholder="description" class="form-control summernote" name="Aneg">
                                    <?php echo $data1['about_content']; ?>                              
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