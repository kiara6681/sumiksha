<?php include('../includes/header.php');?>
<?php 
$sub_course_id = $_REQUEST['id'];

error_reporting(0);
if(isset($_POST['addfilmlocation1']))
{
    $structure = "uploads/card_images/";
    
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

    $card_type_id = $_REQUEST['card_type_id'];
    $card_name = $_REQUEST['card_name'];
    $annual_fees = $_REQUEST['annual_fees'];

    $card_details = $_REQUEST['card_details'];
    $card_details = str_replace("'","\'",$card_details); 

    $date = date('Y-m-d H:i:s');

    if(mysqli_query($conn, "INSERT INTO `credit_card_features` (`course_id`, `sub_course_id`, `card_type_id`, `card_name`, `annual_fees`, `card_details`, `card_image`, `created_at`, `status`) VALUES (8, '".$sub_course_id."', '".$card_type_id."', '".$card_name."', '".$annual_fees."', '".$card_details."', '".$p_image1."', '".$date."', '1')"))
    {
        echo "<script language='javascript'>alert('Successfully Submited !');window.location = 'cards-features-list.php?id=".$sub_course_id."';</script>";
    }
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
                                <label class="col-sm-2 control-label">Card Type</label>
                                <div class="col-sm-10">
                                    <select name="card_type_id" id="card_type_id" class="form-control" required>
                                        <option value="">Select Card</option>
                                        <option value="1">Travel</option>
                                        <option value="2">Fuel</option>
                                        <option value="3">Premium</option>
                                        <option value="4">Rewards</option>
                                        <option value="5">Shopping & Cashback</option>
                                        <option value="6">LifeStyle</option>
                                    </select>
                                </div>
                            </div>  

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Card Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="card_name" class="form-control" required>
                                </div>
                            </div>    

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Annual Fees</label>
                                <div class="col-sm-10">
                                    <input type="text" name="annual_fees" class="form-control" required>
                                </div>
                            </div>             
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Card Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="p_image1" class="form-control">
                                </div>
                            </div>   

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Card Details</label>
                                <div class="col-sm-10">
                                    <textarea placeholder="Card Details" class="form-control summernote" name="card_details"></textarea>
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