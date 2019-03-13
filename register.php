<?php include('header.php');?>
<?php
    error_reporting(0);
    if($_REQUEST['register'])
    {

        $structure = "admin_dashboard/uploads/cancel_cheque/";
        
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

        $structure = "admin_dashboard/uploads/receipt/";
        
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

        // pan card photo
        $structure = "admin_dashboard/uploads/pan_card_img/";
        
        if(!file_exists($structure))
        {
            mkdir($structure, 0777, true);
        }
        
        $p_image3 = '';
        
        if ($_FILES['p_image3']['type'] != "image/gif" && $_FILES['p_image3']['type'] != "image/jpeg" 
        && $_FILES['p_image3']['type'] != "image/jpg" && $_FILES['p_image3']['type'] != "image/png" && $_FILES['p_image3']['type'] != "application/pdf") 
        { 
            $err = "This file type is not allowed";
        }
        else 
        {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $filename = substr( str_shuffle( $chars ), 0, 10 );
              
            $ext = pathinfo($_FILES['p_image3']['name'], PATHINFO_EXTENSION);
            
            $path=$structure."/".$filename.'.'.$ext;
            
            move_uploaded_file($_FILES['p_image3']['tmp_name'], $path );            
            $p_image3 = $filename.'.'.$ext;
        }

        // aadhar card image
        $structure = "admin_dashboard/uploads/aadhar_card_img/";
        
        if(!file_exists($structure))
        {
            mkdir($structure, 0777, true);
        }
        
        $p_image4 = '';
        
        if ($_FILES['p_image4']['type'] != "image/gif" && $_FILES['p_image4']['type'] != "image/jpeg" 
        && $_FILES['p_image4']['type'] != "image/jpg" && $_FILES['p_image4']['type'] != "image/png" && $_FILES['p_image4']['type'] != "application/pdf") 
        { 
            $err = "This file type is not allowed";
        }
        else 
        {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $filename = substr( str_shuffle( $chars ), 0, 10 );
              
            $ext = pathinfo($_FILES['p_image4']['name'], PATHINFO_EXTENSION);
            
            $path=$structure."/".$filename.'.'.$ext;
            
            move_uploaded_file($_FILES['p_image4']['tmp_name'], $path );            
            $p_image4 = $filename.'.'.$ext;
        }

        $first_name=$_REQUEST['first_name'];
        $phone=$_REQUEST['phone'];
        $email=$_REQUEST['email'];
        $emp_code=$_REQUEST['emp_code'];
        $dob=$_REQUEST['dob'];
        $pincode=$_REQUEST['pincode'];
        $referral_code=$_REQUEST['referral_code'];
        $age=$_REQUEST['age'];
        $pan_card=$_REQUEST['pan_card'];
        $aadhar_card=$_REQUEST['aadhar_card'];
        $password=$_REQUEST['password'];
        $password = hash('sha256', $password); // password hashing using SHA256-

        $date=date("Y-m-d H:i:s");

        if(mysqli_query($conn, "INSERT INTO `login` (`name`,`username`,`password`,`phone`,`pincode`,`dob`,`ref_code`,`age`,`pan_card`,`aadhar_card`,`cancel_cheque`,`payment_receipt`,`pan_card_img`,`aadhar_card_img`,`created_at`,`status`) VALUES ('$first_name','$email','$password','$phone','$pincode','$dob','$referral_code','$age','$pan_card','$aadhar_card','$p_image1','$p_image2','$p_image3','$p_image4','$date',0)"))
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
<script type="text/javascript">
    $(document).ready(function(){
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
            if(emp_code!=''){
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
<section class="gredientPattern container-fluid" style="padding-top: 110px;">
    <div class="pageSection row magic-3">      
        <img src="<?= base_url();?>assets/img/REGISTER.jpg" alt="" class="img-responsive">
    </div>
</section>
<section class="section-side-image clearfix">
    <div class="container">
        <div class="row">

            <div class="col-md-2 col-sm-2 col-xs-12 bmargin"></div>
            <div class="col-md-8 col-sm-8 col-xs-12 bmargin"> 
              
                <h3 class="text-center" style="color: #000;font-weight: 600;">Registration Form</h3>
                <br>
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
                <form class="job-form" action="" method="post" id="Register_form" enctype="multipart/form-data">
                 
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
                            <div class="form-cont">
                                <label>Date of Birth <span style="color: red">*</span></label>
                                <input name="dob" id="datepicker" type="text" class="validate[required] form-control" placeholder="dd/mm/yyyy"/>
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
                                <label>Upload Pan Card <span style="color: red">*</span></label>
                                <input name="p_image3" type="file" class="form-control reg_franchise_reg"/>
                            </div>
                        </div> 

                        <div class="col-md-6 reg_franchise" style="display: none;">
                            <div class="form-cont">
                                <label>Upload Aadhar Card <span style="color: red">*</span></label>
                                <input name="p_image4" type="file" class="form-control reg_franchise_reg"/>
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
                                <input name="check" type="checkbox"class="validate[required]" style="float: left;margin-right: 10px;" /> <p>You Agree to our <a href="javascript:;" style="color: #002e8a;text-decoration: underline;font-weight: 600;"> Privacy Policy</a></p>
                            </div>
                        </div>
                    </div>
                   
                    <div class="clearfix"></div>
                    <div class="row text-center">
                        <input type="submit" id="user_register" name="register" value="SUBMIT" class="btn btn-primary sender_submit">
                    </div>
                </form>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12 bmargin"></div>
            <!--end right column--> 
        </div>
    </div>
</section>
<?php include('footer.php');?>