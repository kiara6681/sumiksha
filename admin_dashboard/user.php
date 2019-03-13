<?php include('../includes/header.php');?>
<?php
    error_reporting(0);
    if($_REQUEST['register'])
    {

        $structure = "uploads/cancel_cheque/";
        
        if(!file_exists($structure))
        {
            mkdir($structure, 0777, true);
        }
        
        $p_image1 = '';
        
        if ($_FILES['p_image1']['type'] != "image/gif" && $_FILES['p_image1']['type'] != "image/jpeg" 
        && $_FILES['p_image1']['type'] != "image/jpg" && $_FILES['p_image1']['type'] != "image/png" && $_FILES['p_image1']['type'] != "application/pdf") 
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

        $structure = "uploads/receipt/";
        
        if(!file_exists($structure))
        {
            mkdir($structure, 0777, true);
        }
        
        $p_image2 = '';
        
        if ($_FILES['p_image2']['type'] != "image/gif" && $_FILES['p_image2']['type'] != "image/jpeg" 
        && $_FILES['p_image2']['type'] != "image/jpg" && $_FILES['p_image2']['type'] != "image/png" && $_FILES['p_image2']['type'] != "application/pdf") 
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

        $first_name=$_REQUEST['first_name'];
        $phone=$_REQUEST['phone'];
        $email=$_REQUEST['email'];
        $emp_code=$_REQUEST['emp_code'];
        $dob=$_REQUEST['dob'];
        $pincode=$_REQUEST['pincode'];
        $referral_code=$_REQUEST['referral_code'];
        $unique_id=$_REQUEST['unique_id'];
        $age=$_REQUEST['age'];
        $pan_card=$_REQUEST['pan_card'];
        $aadhar_card=$_REQUEST['aadhar_card'];
        $password=$_REQUEST['password'];
        $password = hash('sha256', $password); // password hashing using SHA256-

        $date=date("Y:m:d H:i:s");

        if(mysqli_query($conn, "INSERT INTO `login` (`name`,`username`,`password`,`phone`,`pincode`,`dob`,`ref_code`,`unique_id`,`age`,`pan_card`,`aadhar_card`,`cancel_cheque`,`payment_receipt`,`created_at`,`status`) VALUES ('$first_name','$email','$password','$phone','$pincode','$dob','$referral_code','$unique_id','$age','$pan_card','$aadhar_card','$p_image1','$p_image2','$date',1)"))
        {
            $last_id = $conn->insert_id;

            if(mysqli_query($conn, "INSERT INTO `user_roles` (`role_id`,`user_id`,`created_at`) VALUES ('$emp_code','$last_id','$date')"))
            {
                $succMSG = "Successfully Registered";      
            }
        }
        else{
            $errorMSG = "Not Registered";
        }
    }
?>
<script src="<?= base_url();?>assets/js/jquery-3.1.1.min.js"></script>
<script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        //alert('hi');
        $("#register_email").change(function(){
            var username = $("#register_email").val();

            $.ajax({
                type:"post",
                url:"<?= base_url();?>ajaxPages/checkEmail",
                data:{username:username},
                success:function(data){
                    if(data==0){
                        $("#email_message").html("<span style='font-size:13px; color: green'> Email Id available</span>");
                        $("#user_register").removeAttr('disabled', 'disabled');
                        $("#emp_code").css({
                            marginBottom: '40px',
                        });
                    }
                    else{
                        $("#email_message").html("<span style='font-size:13px; color: red'> Email Id already registered</span>");
                        $("#user_register").attr('disabled', 'disabled');
                        $("#emp_code").css({
                            marginBottom: '40px',
                        });
                    }
                }
            })
        });
        $("#emp_code").change(function(){
            var emp_code = $("#emp_code").val();
            if(emp_code!=5){
                $('.reg_franchise').show();
                $('.reg_franchise_reg').addClass("validate[required]");
                $('.reg_franchise_reg_pan').addClass("validate[required,maxSize[10],minSize[10]");
            }
            else{
                $('.reg_franchise').hide();
                $('.reg_franchise_reg').removeClass("validate[required]");
                $('.reg_franchise_reg_pan').removeClass("validate[required,maxSize[10],minSize[10]");
            }
        });
    });
</script>
<style>
.form-group .control-label:after {
    content: "*";
    color: red;
}
.form-group {
    margin-bottom: 0px;
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
                <?php
                    if (isset($succMSG) ) 
                    {
                ?>
                    <div class="form-group">
                        <div class="alert alert-success">
                            <i class="fa fa-check"></i> <?php echo $succMSG; ?>
                        </div>
                    </div>
                <?php
                    }
                    if (isset($errorMSG) ) 
                    {
                ?>
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <i class="fa fa-info"></i> <?php echo $errorMSG; ?>
                        </div>
                    </div>
                <?php
                    }
                ?>
                        <form class="job-form Register_form" action="" method="post" enctype="multipart/form-data">
                         
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-cont">
                                        <label>Full Name <span style="color: red">*</span></label>
                                        <input name="first_name" size="20" type="text" class="validate[required] form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-cont">
                                        <label>Mobile No. <span style="color: red">*</span></label>
                                        <input name="phone" type="text" class="validate[required,custom[phone],maxSize[12],minSize[10]] form-control" placeholder="9876543210" />
                                    </div>
                                </div>                         
                                <div class="col-md-6">
                                    <div class="form-cont">
                                        <label>Email Address <span style="color: red">*</span></label>
                                        <input name="email" type="email" id="register_email" class="validate[required,custom[email]] form-control" placeholder="example@gmail.com" />
                                        <span id="email_message"></span>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-cont">
                                        <label>Select <span style="color: red">*</span></label>
                                        <select class="validate[required] form-control" name="emp_code" id="emp_code">
                                            <option value="">-----Select-----</option>
                                            <option value="3">Channel Partner</option>
                                            <option value="4">Franchise Partner</option>
                                            <option value="5">Employee</option>
                                        </select>
                                    </div>
                                </div>                         
                                
                                <div class="col-md-6">
                                    <div class="form-group" id="data_1">
                                        <label>Date of Birth <span style="color: red">*</span></label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" name="dob" id="datepicker" class="validate[required] form-control">
                                        </div>
                                    </div>
                                </div>  

                                <div class="col-md-6">
                                    <div class="form-cont">
                                        <label>Age </label>
                                        <input name="age" id="age" type="text" class="validate[required] form-control" readonly=""/>
                                    </div>
                                </div>  

                                <div class="col-md-6">
                                    <div class="form-cont">
                                        <label>Pincode <span style="color: red">*</span></label>
                                        <input name="pincode" type="text" class="validate[required,,custom[onlyNumberSp],maxSize[6],minSize[6] form-control"/>
                                    </div>
                                </div> 

                                <div class="col-md-6 reg_franchise" style="display: none;">
                                    <div class="form-cont">
                                        <label>Upload Cancel Cheque <span style="color: red">*</span></label>
                                        <input name="p_image1" type="file" class="form-control reg_franchise_reg"/>
                                    </div>
                                </div> 

                                <div class="col-md-6 reg_franchise" style="display: none;">
                                    <div class="form-cont">
                                        <label>Upload Payment Receipt <span style="color: red">*</span></label>
                                        <input name="p_image2" type="file" class="form-control reg_franchise_reg"/>
                                    </div>
                                </div>   

                                <div class="col-md-6 reg_franchise" style="display: none;">
                                    <div class="form-cont">
                                        <label>Pan Card <span style="color: red">*</span></label>
                                        <input name="pan_card" type="text" class="form-control reg_franchise_reg_pan" style="text-transform:uppercase"/>
                                    </div>
                                </div>
                            
                                <div class="col-md-6 reg_franchise" style="display: none;">
                                    <div class="form-cont">
                                        <label>Aadhar Card <span style="color: red">*</span></label>
                                        <input name="aadhar_card" type="text" class="form-control reg_franchise_reg"/>
                                    </div>
                                </div> 
                                <div class="col-md-6 reg_franchise" style="display: none;">
                                    <div class="form-cont">
                                        <label>Unique ID</label>
                                        <input name="unique_id" type="text" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-cont">
                                        <label>Referral Code</label>
                                        <input name="referral_code" type="text" class="form-control"/>
                                    </div>
                                </div>     

                                <div class="col-md-6">
                                    <div class="form-cont">
                                        <label>Password <span style="color: red">*</span></label>
                                        <input name="password" type="password" class="validate[required] form-control" placeholder="******" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-cont">
                                        <input type="submit" id="user_register" name="register" value="SUBMIT" class="btn btn-primary sender_submit" style="margin-top: 20px;">
                                    </div>
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