<?php include('../includes/header.php');?>
<?php

    if(isset($_POST['addgallery1'])){

            $name = $_REQUEST['name'];
            $gallery_id = $_REQUEST['gallery_id'];
            $you_tube = $_REQUEST['you_tube'];
            if(!empty($you_tube)){

               $filename = $you_tube;

               if(mysqli_query($conn, "INSERT INTO `gallery1` (`name`, `image`, `gallery_id`) VALUES ('$name', '$filename', '$gallery_id')"))
                {
                    echo "<script language='javascript'>alert('Successfully Submited !');window.location = 'gallery1-list.php';</script>";
                } 
            }

            else
            {
            //$description1 = $_REQUEST['description'];
            //$description = str_replace("'","\'",$description1);

            $j = 0; //Variable for indexing uploaded image 
        
            //loop to get individual element from the array 
        
              define ("MAX_SIZE","4000");
        
              for($i=0; $i<count($_FILES['p_image1']['name']); $i++){

                $validextensions = array("jpeg", "jpg", "png");
        
                $size=filesize($_FILES['p_image1']['tmp_name'][$i]); 
        
                $path = "uploads/gallery/";
                $fname = $_FILES['p_image1']['name'][$i];
                $size = $_FILES['p_image1']['size'][$i];
                list($txt, $ext) = explode(".", $fname);
                //date_default_timezone_set ("Asia/Calcutta"); 
                //$currentdate=date("d M Y");  
                $file= time().substr(str_replace(" ", "_", $txt), 0);
                $info = pathinfo($file);
                $filename = $file.".".$ext;
        
                $j = $j + 1;
        
                if($size < (MAX_SIZE*2048) && in_array($ext, $validextensions)){

                    if (move_uploaded_file($_FILES['p_image1']['tmp_name'][$i], $path.$filename)){
                    //if file moved to uploads folder
                        //echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
                        /***********************************************/
 
                        if(mysqli_query($conn, "INSERT INTO `gallery1` (`name`, `image`, `gallery_id`) VALUES ('$name', '$filename', '$gallery_id')"))
                        {
                            echo "<script language='javascript'>alert('Successfully Submited !');window.location = 'gallery1-list.php';</script>";
                        } 
        
                        else
                        {
                            echo "<script language='javascript'>alert('Image not saved successfully !');window.location = 'gallery1-list.php';</script>";
                        }
                        /*************************************************/
                    } else {//if file was not moved.
                        echo "<script language='javascript'>alert('please try again!.');window.location = 'gallery1.php';</script>";
                    }
                } else {//if file size and file type was incorrect.
                    echo "<script language='javascript'>alert('***Invalid file Size or Type***');window.location = 'gallery1.php';</script>";
                }
            }
            exit; 
        }
    }
?>

<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script language="javascript"> 
    //pop up script
    $(document).ready(function(e){
        $("#gallery_id").change(function(){
            
            var gallery_id = $("#gallery_id").val();
            //alert(gallery_id);
            if(gallery_id==20){
                $("#upload_image").hide();
                $("#you_tube").show();
                $(".you_tube").attr('required', 'required');
                $(".upload_image").removeAttr('required', 'required');
            }            
            if(gallery_id!=20){
                $("#upload_image").show();
                $("#you_tube").hide();
                $(".upload_image").attr('required', 'required');
                $(".you_tube").removeAttr('required', 'required');
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
                                <label class="col-sm-2 control-label">Gallery Name</label>
                                <div class="col-sm-10">
                                    <select name="gallery_id" id="gallery_id" class="form-control" readonly required>
                                        <?php 
                                            $sql_cmp = $conn->query("SELECT * from gallery order by id asc limit 0,1");
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
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>      

                            <div class="form-group" id="you_tube" style="display:none">
                                <label class="col-sm-2 control-label">You Tube Link</label>
                                <div class="col-sm-10">
                                    <input type="text" name="you_tube" class="form-control you_tube">
                                </div>
                            </div>      
    
                            <div class="form-group" id="upload_image">
                                <label class="col-sm-2 control-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file"  name="p_image1[]" multiple="multiple" class="upload_image" required="required" /> 
                                    <span style="color:#FF0000;font-size:20px;"><strong>User Can upload 6 to 8 Images!</strong></span>
                                </div>
                            </div>      
<!-- 
                            <div class="form-group"><label class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea placeholder="description" class="form-control summernote" name="description"> </textarea>
                                </div>
                            </div> -->
                            <div class="hr-line-dashed"></div>
     
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-white" type="submit">Cancel</button>
                                    <input type="submit" value="Save" name="addgallery1" class="btn btn-primary">
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