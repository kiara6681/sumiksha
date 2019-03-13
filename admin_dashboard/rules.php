<?php include('header.php');?>
<?php include("config.php"); ?>
<?php 
error_reporting(0);
if(isset($_POST['addrules']))
{
    $structure = "uploads/rules/";
    
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

    $name = $_REQUEST['name'];
    $course_id = $_REQUEST['course_id'];
    $amazon_link = $_REQUEST['amazon_link'];
    if($metatitle1){
        $metatitle1=$amit = preg_replace('/[^A-Za-z0-9\-]/', '-', $metatitle1);
        $metatitle=strtolower($metatitle1);
    }
    else{
        $metatitle1=$amit = preg_replace('/[^A-Za-z0-9\-]/', '-', $name);
        $metatitle=strtolower($metatitle1);
    }
    $description1 = $_REQUEST['description'];
    $description = str_replace("'","\'",$description1);

    if(mysqli_query($conn, "INSERT INTO `rules` (`name`, `metatitle`, `image`, `description`, `amazon_link`, `course_id`) VALUES ('$name', '$metatitle', '$p_image1', '$description', '$amazon_link', '$course_id')"))
    
    {
        echo "<script language='javascript'>alert('Successfully Submited !');window.location = 'rules-list.php';</script>";
        move_uploaded_file($photo_tmp_name,$target);
    }
}

?>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- <script language="javascript"> 
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
</script> -->
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
                    <a href="home.php">Home</a>
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
                                <label class="col-sm-2 control-label">Course Name</label>
                                <div class="col-sm-10">
                                    <select name="course_id" class="form-control" required>
                                        <option value="">Select Course</option>
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
                                <label class="col-sm-2 control-label">Amazon Link</label>
                                <div class="col-sm-10">
                                    <input type="text" name="amazon_link" class="form-control">
                                </div>
                            </div>      
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="p_image1" class="form-control" required>
                                </div>
                            </div>      

                            <div class="form-group"><label class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea placeholder="description" class="form-control summernote" name="description"> </textarea>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
     
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-white" type="submit">Cancel</button>
                                    <input type="submit" value="Save" name="addrules" class="btn btn-primary">
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
    <!-- Mainly scripts -->

    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- SUMMERNOTE -->
    <script src="js/plugins/summernote/summernote.min.js"></script>

    <script>
        $(document).ready(function(){

            $('.summernote').summernote({
                minHeight: 200
            });
        });
    </script>

</body>
</html>