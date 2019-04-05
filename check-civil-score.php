<?php include('header.php');?>
<?php
    error_reporting(0);
    if($_REQUEST['register'])
    {
        $first_name=$_REQUEST['first_name'];
        $phone=$_REQUEST['phone'];
        $email=$_REQUEST['email'];
        $pan_card=$_REQUEST['pan_card'];
        $address=$_REQUEST['address'];
        $date=date("Y-m-d H:i:s");

        if(mysqli_query($conn, "INSERT INTO `check_civil_score` (`name`,`email`,`phone`,`pancard`,`address`,`created_at`) VALUES ('$first_name','$email','$phone','$pan_card','$address','$date')"))
        {
            $succMSG = "Successfully Submitted";      
        }
        else{
            $errorMSG = "Something Went Wrong";
        }
    }
?>

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
              
                <h3 class="text-center" style="color: #000;font-weight: 600;">Check Cibil Score</h3>
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
                                <input name="first_name" placeholder="john doe" type="text" class="validate[required] form-control"/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-cont">
                                <label>Mobile No. <span style="color: red">*</span></label>
                                <input name="phone" type="text" class="validate[required,custom[phone],maxSize[12],minSize[10]] form-control" placeholder="9876543210">
                            </div>
                        </div>     

                        <div class="col-md-6">
                            <div class="form-cont">
                                <label>Email Address <span style="color: red">*</span></label>
                                <input name="email" type="email" id="register_email" class="validate[required,custom[email]] form-control" placeholder="example@gmail.com" />
                                <span id="email_message"></span>
                            </div>
                        </div>                           

                        <div class="col-md-6 reg_franchise">
                            <div class="form-cont">
                                <label>Pan Card <span style="color: red">*</span></label>
                                <input name="pan_card" type="text" class="form-control validate[required,maxSize[10],minSize[10]" style="text-transform:uppercase"/>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-cont">
                                <label>Address <span style="color: red">*</span></label>
                                <textarea name="address" class="form-control"></textarea>
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