<?php include('../includes/header.php');?>
<?php 
error_reporting(0);
if($_REQUEST['submit'])
{
    $name=$_REQUEST['name'];
    $metatitle=$_REQUEST['metatitle'];
    $photo=$_FILES['photo'];
    $photo_image_name=$photo['name'];
    $photo_tmp_name=$photo['tmp_name'];
    $target="slider/$photo_image_name";
    $aneg=$_REQUEST['Aneg'];
    
    if(mysqli_query($conn, "INSERT INTO `banner` (`name`,`metatitle`,`image`) VALUES ('$name','$metatitle','$photo_image_name')"))
    {
        echo "<script language='javascript'>alert('Successfully Submited !');window.location = 'banner-list.php';</script>";
        move_uploaded_file($photo_tmp_name,$target);
    }
}

?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Add Form</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url();?>includes/admin_home.php">Home</a>
                </li>
                <li>
                    <a>Forms</a>
                </li>
                <li class="active">
                    <strong>Add Form</strong>
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
                                <label class="col-sm-2 control-label">Banner Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Banner Title1</label>
                                <div class="col-sm-10">
                                    <input type="text" name="metatitle" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Upload Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="photo" required>
                                </div>
                            </div>
              <!--               <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea placeholder="description" class="form-control summernote" name="Aneg"> </textarea>
                                </div>
                            </div> -->
    
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-white" type="submit">Cancel</button>
                                    <input type="submit" value="Save" name="submit" class="btn btn-primary">
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