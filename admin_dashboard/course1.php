<?php include('../includes/header.php');?>
<?php 
error_reporting(0);
if(isset($_POST['addfilmlocation1']))
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

    if(empty($sort_by))
    {
        $sort_by = NULL;
    }

    $information = $_REQUEST['information'];
    $information = str_replace("'","\'",$information); 

    $current_roi = $_REQUEST['current_roi'];
    $current_roi = str_replace("'","\'",$current_roi);
    
    $features = $_REQUEST['features'];
    $features = str_replace("'","\'",$features);


    if(mysqli_query($conn, "INSERT INTO `course1` (`name`, `metatitle`, `image`, `icon`, `information`, `current_roi`, `features`, `course_id`, `sort_by`) VALUES ('".$name."', '".$metatitle."', '".$p_image1."', '".$p_image2."', '".$information."',  '".$current_roi."',  '".$features."', '".$course_id."', '".$sort_by."')"))
    {
        echo "<script language='javascript'>alert('Successfully Submited !');window.location = 'course1-list.php';</script>";
    }
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script language="javascript"> 
    //pop up script
    $(document).ready(function(e){
        // Get Subcategory By Category ID
        $("#category").change(function(){
            
            var categoryid = $("#category").val();
            //alert(categoryid);
            $.ajax({
                url : "ajaxPages/getSubcategory.php",
                type : "POST",
                data : {categoryid:categoryid},
                success : function(data)
                {
                    //alert(data);
                    $("#subcategory").html(data);
                }
            });
        });
        
        // Get Subattribute By attribute ID
        $("#attribute").change(function(){
            
            var attributeid = $("#attribute").val();
            
            $.ajax({
                url : "ajaxPages/getSubAttribute.php",
                type : "POST",
                data : {attributeid:attributeid},
                success : function(data)
                {
                    //alert(data);
                    $("#subattribute").html(data);
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#course_id').change(function(){
            var course_id = $(this).val();
            if(course_id!=8){
                $('.credit_card').show();
            }
            else{
                $('.credit_card').hide();
            }
        });
    });
</script>
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
        <div class="col-lg-2"></div>
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
                                    <input type="text" name="sort_by" class="form-control">
                                </div>
                            </div> 
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Category Name</label>
                                <div class="col-sm-10">
                                    <select name="course_id" id="course_id" class="form-control" required>
                                        <option value="">Select Category</option>
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
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>             
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
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Information</label>
                                <div class="col-sm-10">
                                    <textarea placeholder="Information" class="form-control summernote" name="information"></textarea>
                                </div>
                            </div>                            
                            <div class="form-group credit_card">
                                <label class="col-sm-2 control-label">Current ROI and Offer</label>
                                <div class="col-sm-10">
                                    <textarea placeholder="Current ROI and Offer" class="form-control summernote" name="current_roi"></textarea>
                                </div>
                            </div>                            
                            <div class="form-group credit_card">
                                <label class="col-sm-2 control-label">Features and Benefits</label>
                                <div class="col-sm-10">
                                    <textarea placeholder="features" class="form-control summernote" name="features"></textarea>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
     
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-white" type="submit">Cancel</button>
                                    <input type="submit" value="Save" name="addfilmlocation1" class="btn btn-primary">
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