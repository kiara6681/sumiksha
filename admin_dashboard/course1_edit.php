<?php include('../includes/header.php');?>
<?php 
error_reporting(0);
$id=$_REQUEST['id'];
$sql1=$conn->query("select course1.*, courses.name as course_name from course1 left join courses on courses.id = course1.course_id where course1.id=$id");
$data1=mysqli_fetch_array($sql1);

if(isset($_POST['addcourse1']))
{
    $structure = "uploads/courses/";
    
    if(!file_exists($structure))
    {
        mkdir($structure, 0777, true);
    }
    
    $p_image1 = '';
    
    if ($_FILES['p_image1']['type'] != "image/gif" && $_FILES['p_image1']['type'] != "image/jpeg" 
    && $_FILES['p_image1']['type'] != "image/jpg" && $_FILES['p_image1']['type'] != "image/png") 
    { 
        $err = "This file type is not allowed";
    }
    else 
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $filename = substr( str_shuffle( $chars ), 0, 10 );
          
        $ext = pathinfo($_FILES['p_image1']['name'], PATHINFO_EXTENSION);
        
        $path=$structure."/".$filename.'.'.$ext;
        
        move_uploaded_file($_FILES['p_image1']['tmp_name'], $path );            
        $p_image1 = $filename.'.'.$ext;
    }    

    $structure = "uploads/icon/";
    
    if(!file_exists($structure))
    {
        mkdir($structure, 0777, true);
    }
    
    $p_image2 = '';
    
    if ($_FILES['p_image2']['type'] != "image/gif" && $_FILES['p_image2']['type'] != "image/jpeg" 
    && $_FILES['p_image2']['type'] != "image/jpg" && $_FILES['p_image2']['type'] != "image/png") 
    { 
        $err = "This file type is not allowed";
    }
    else 
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $filename = substr( str_shuffle( $chars ), 0, 10 );
          
        $ext = pathinfo($_FILES['p_image2']['name'], PATHINFO_EXTENSION);
        
        $path=$structure."/".$filename.'.'.$ext;
        
        move_uploaded_file($_FILES['p_image2']['tmp_name'], $path );            
        $p_image2 = $filename.'.'.$ext;
    }
    
    
    $name = $_REQUEST['name'];
    if($metatitle1){
        $metatitle1=$amit = preg_replace('/[^A-Za-z0-9\-]/', '-', $metatitle1);
        $metatitle=strtolower($metatitle1);
    }
    else{
        $metatitle1=$amit = preg_replace('/[^A-Za-z0-9\-]/', '-', $name);
        $metatitle=strtolower($metatitle1);
    }

    $course_id = $_REQUEST['course_id'];
    $sort_by = $_REQUEST['sort_by'];

    $description1 = $_REQUEST['description'];
    $description = str_replace("'","\'",$description1);
    
    $banner_description = $_REQUEST['banner_description'];
    $banner_description = str_replace("'","\'",$banner_description);
    
    
    if($p_image1)
    {
        mysqli_query($conn, "UPDATE `course1` SET `name` = '$name', `image` = '$p_image1', `metatitle` = '$metatitle', `description` = '$description', `banner_description` = '$banner_description', `course_id` = '$course_id', `sort_by` = '$sort_by' WHERE `id` = $id;");
        echo "<script language='javascript'>alert('Successfully Updated !');window.location = 'course1-list.php';</script>";
    }    
    elseif($p_image2)
    {
        mysqli_query($conn, "UPDATE `course1` SET `name` = '$name', `icon` = '$p_image2', `metatitle` = '$metatitle', `description` = '$description', `banner_description` = '$banner_description', `course_id` = '$course_id', `sort_by` = '$sort_by' WHERE `id` = $id;");
        echo "<script language='javascript'>alert('Successfully Updated !');window.location = 'course1-list.php';</script>";
    }
    
    else
    {
        mysqli_query($conn, "UPDATE `course1` SET `name` = '$name', `metatitle` = '$metatitle', `description` = '$description', `banner_description` = '$banner_description', `course_id` = '$course_id', `sort_by` = '$sort_by' WHERE `id` = $id;");
        echo "<script language='javascript'>alert('Successfully Updated !');window.location = 'course1-list.php';</script>";
    }
}

?>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<style>
.form-group .control-label:after {
    content: "*";
    color: red;
}
</style>
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
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" class="parsley-form" id="agent_form">

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Sorting No.</label>
                                <div class="col-sm-10">
                                    <input type="text" name="sort_by" class="form-control" value="<?= $data1['sort_by'];?>">
                                </div>
                            </div> 
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Product Name</label>
                                <div class="col-sm-10">
                                    <select name="course_id" class="form-control" required>
                                        <option value="<?= $data1['course_id'];?>"><?= $data1['course_name'];?></option>
                                    <?php 
                                        $sql_cmp = $conn->query("SELECT * from courses order by id asc");
                                        while($data_cmp=mysqli_fetch_array($sql_cmp))
                                        {
                                    ?>
                                        <option value="<?= $data_cmp['id'];?>"><?= $data_cmp['name'];?></option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>  

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" value="<?= $data1['name'];?>">
                                </div>
                            </div>  
<!-- 
                            <div class="form-group">
                                <label class="col-sm-2 control-label">metatitle</label>
                                <div class="col-sm-10">
                                    <input type="text" name="metatitle" class="form-control" value="<?= $data1['metatitle'];?>">
                                </div>
                            </div>    -->  
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Icon</label>
                                <div class="col-sm-10">
                                    <input type="file" name="p_image2" class="form-control">
                                </div>
                            </div>      

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="p_image1" class="form-control">
                                </div>
                            </div>      
                            
<!--                            <div class="form-group"><label class="col-sm-2 control-label">Banner Description</label>
                                <div class="col-sm-10">
                                    <textarea placeholder="banner_description" class="form-control summernote" name="banner_description"><?= $data1['banner_description'];?></textarea>
                                </div>
                            </div>  -->    

                            <div class="form-group"><label class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea placeholder="description" class="form-control summernote" name="description"><?= $data1['description'];?></textarea>
                                </div>
                            </div> 

                            <div class="hr-line-dashed"></div>
     
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-white" type="submit">Cancel</button>
                                    <input type="submit" value="Save" name="addcourse1" class="btn btn-primary">
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