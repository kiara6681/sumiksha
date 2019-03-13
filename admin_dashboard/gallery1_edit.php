<?php include('../includes/header.php');?>
<?php 
error_reporting(0);
$id=$_REQUEST['id'];
$sql1=$conn->query("select gallery1.*, gallery.name as gallery_name, gallery.id as gallery_id from gallery1 left join gallery on gallery.id = gallery1.gallery_id where gallery1.id=$id");
$data1=mysqli_fetch_array($sql1);

if(isset($_POST['addgallery1']))
{
    $structure = "uploads/gallery/";
    
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

    $gallery_id = $_REQUEST['gallery_id'];
    $description1 = $_REQUEST['description'];
    $description = str_replace("'","\'",$description1);
    $you_tube = $_REQUEST['you_tube'];

    if(!empty($you_tube)){

       $filename = $you_tube;

        if($filename)
        {
            mysqli_query($conn, "UPDATE `gallery1` SET `name` = '$name', `image` = '$filename', `gallery_id` = '$gallery_id' WHERE `id` = $id;");
            echo "<script language='javascript'>alert('Successfully Updated !');window.location = 'gallery1-list.php';</script>";
        }
    }
    else
    {
        if($p_image1)
        {
            mysqli_query($conn, "UPDATE `gallery1` SET `name` = '$name', `image` = '$p_image1', `gallery_id` = '$gallery_id' WHERE `id` = $id;");
            echo "<script language='javascript'>alert('Successfully Updated !');window.location = 'gallery1-list.php';</script>";
        }
        
        else
        {
            mysqli_query($conn, "UPDATE `gallery1` SET `name` = '$name', `gallery_id` = '$gallery_id' WHERE `id` = $id;");
            echo "<script language='javascript'>alert('Successfully Updated !');window.location = 'gallery1-list.php';</script>";
        }   
    }

}

?>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script language="javascript"> 
    //pop up script
    $(document).ready(function(e){
/*
        var gallery_id = "<?= $data1['gallery_id'];?>";
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
            $(".you_tube").attr('name', 'youtube1');
        }

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
                $(".you_tube").attr('name', 'youtube1');
            }
        });*/
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
                                <label class="col-sm-2 control-label">Gallery Name</label>
                                <div class="col-sm-10">
                                    <select name="gallery_id" id="gallery_id" class="form-control" readonly required>
                                        <option value="<?= $data1['gallery_id'];?>"><?= $data1['gallery_name'];?></option>
<!--                                     <?php 
                                        $sql_cmp = $conn->query("SELECT * from gallery order by id asc");
                                        while($data_cmp=mysqli_fetch_array($sql_cmp))
                                        {
                                    ?>
                                        <option value="<?= $data_cmp['id'];?>"><?= $data_cmp['name'];?></option>
                                    <?php
                                        }
                                    ?> -->
                                    </select>
                                </div>
                            </div>  

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" value="<?= $data1['name'];?>">
                                </div>
                            </div>  

                            <div class="form-group" id="you_tube" style="display:none">
                                <label class="col-sm-2 control-label">You Tube Link</label>
                                <div class="col-sm-10">
                                    <input type="text" name="you_tube" class="form-control you_tube" value="<?= $data1['image'];?>">
                                </div>
                            </div>     
    
                            <div class="form-group" id="upload_image">
                                <label class="col-sm-2 control-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="p_image1" class="form-control upload_image">
                                </div>
                            </div>      
<!--                             
                            <div class="form-group"><label class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea placeholder="description" class="form-control summernote" name="description"><?= $data1['description'];?></textarea>
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