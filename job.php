<?php include('header.php');?>
<?php
    error_reporting(0);
/*    if($_REQUEST['register'])
    {

        $structure = "admin_dashboard/uploads/resume/";
        
        if(!file_exists($structure))
        {
            mkdir($structure, 0777, true);
        }

        $resume = '';

        $allowedExts = array(
            "pdf", 
            "doc", 
            "docx"
        ); 

        $allowedMimeTypes = array( 
            'application/msword',
            'text/pdf',
            'image/gif',
            'image/jpeg',
            'image/png'
        );
        
        $extension = end(explode(".", $_FILES["resume"]["name"]));
        //exit;
        if ( ! ( in_array($extension, $allowedExts ) ) ) {
            //die('Please provide another file type [E/2].');
            $errorMSG = "Please provide another file type";
            //exit;
        }
                
        else{
            $_FILES['resume']['name'];
            //exit;
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $filename = substr( str_shuffle( $chars ), 0, 10 );
              
            $ext = pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION);
            
            $path=$structure."/".$filename.'.'.$ext;
            
            move_uploaded_file($_FILES['resume']['tmp_name'], $path );            
            $resume = $filename.'.'.$ext;

            $sendername=$_REQUEST['sendername'];
            $mobile=$_REQUEST['mobile'];
            $emailaddress=$_REQUEST['emailaddress'];
            $whatsapp=$_REQUEST['whatsapp'];
            $work=$_REQUEST['work'];
            $designation=$_REQUEST['designation'];

            $date=date("Y-m-d H:i:s");
            //exit;
            if(mysqli_query($conn, "INSERT INTO `job` (`name`,`email`,`mobile`,`whatsapp`,`work`,`designation`,`resume`,`created_at`) VALUES ('$sendername','$emailaddress','$mobile','$whatsapp','$work','$designation','$resume','$date')"))
            {
                $succMSG = "Successfully Registered";      
            }
            else{
                $errorMSG = "Not Registered";
            }
        }
    }*/
    if($_REQUEST['register'])
    {

        $structure = "admin_dashboard/uploads/resume/";
        
        if(!file_exists($structure))
        {
            mkdir($structure, 0777, true);
        }

        //$resume = '';

        $allowedExts = array(
            "pdf", 
            "doc", 
            "docx",
            "jpg",
            "gif",
            "jpeg",
            "png",
            "bmp"
        ); 

        foreach($_FILES["resume"]["tmp_name"] as $key=>$tmp_name)
        {
            $file_name=$_FILES["resume"]["name"][$key];
            $file_tmp=$_FILES["resume"]["tmp_name"][$key];
            $ext=pathinfo($file_name,PATHINFO_EXTENSION);

            if (!( in_array($ext, $allowedExts ))) {
                //die('Please provide another file type [E/2].');
                //$errorMSG = "Please provide another file type";
                $resume = '';
                break;
            }
            else
            {
                $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $filename = substr( str_shuffle( $chars ), 0, 10 );
                  
                //$ext = pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION);
                
                $path=$structure."/".$filename.'.'.$ext;
                
                move_uploaded_file($_FILES['resume']['tmp_name'][$key], $path);            
                $resume .=$filename.'.'.$ext.',';
            }
        }
        $resume = rtrim($resume,",");
        $sendername=$_REQUEST['sendername'];
        $mobile=$_REQUEST['mobile'];
        $emailaddress=$_REQUEST['emailaddress'];
        $whatsapp=$_REQUEST['whatsapp'];
        $work=$_REQUEST['work'];
        $designation=$_REQUEST['designation'];

        $date=date("Y-m-d H:i:s");
        //exit;
        if($resume!='')
        {
            if(mysqli_query($conn, "INSERT INTO `job` (`name`,`email`,`mobile`,`whatsapp`,`work`,`designation`,`resume`,`created_at`) VALUES ('$sendername','$emailaddress','$mobile','$whatsapp','$work','$designation','$resume','$date')"))
            {
                $succMSG = "Successfully Registered";      
            }
            else{
                $errorMSG = "Not Registered";
            }
        }
        else
        {
            $errorMSG = "Please provide another file type";
        }
    }
?>
<section class="gredientPattern container-fluid" style="padding-top: 110px;">
    <div class="pageSection row magic-3">      
        <img src="<?= base_url();?>assets/img/JOBS.jpg" alt="" class="img-responsive"> 
    </div>
</section>
<section class="section-side-image clearfix">
    <div class="container">
        <?php 
            $sql_cmp=$conn->query("select * from aboutus limit 1,3");
            $count=1;
            while($data_cmp=mysqli_fetch_array($sql_cmp))
            {
        ?>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 bmargin"> 
                <h5 class="text-left" style="color: #000;font-weight: 600;"><?= $data_cmp['name'];?></h5>
                <img src="<?= base_url();?>admin_dashboard/uploads/products/<?= $data_cmp['image'];?>" class="img-responsive">
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12 bmargin"> 
                <h3 class="text-left" style="color: #000;font-weight: 600;margin-top:0px">&nbsp;</h3>
                <p><?= $data_cmp['about_content'];?></p> 
            </div>
        </div>        
        <hr>
        <?php
            }
        ?>
        <hr>     
        <div class="row">
            <div class="smart-forms bmargin">
                <h3 class="text-left" style="text-align:center;color: #000;font-weight: 600;margin-top: 20px;">Apply by Filling Your Personal Details</h3>
                <br>
                <?php
                    if(isset($succMSG)) 
                    {
                ?>
                    <div class="form-group">
                        <div class="alert alert-success">
                            <i class="fa fa-check"></i> <?php echo $succMSG; ?>
                        </div>
                    </div>
                <?php
                    }
                    if (isset($errorMSG)) 
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
                <form method="post" action="" id="smart-form" class="Job_form" enctype="multipart/form-data">
                    <div>
                        <div class="col-md-6">
                            <div class="section" style="padding: 0px 0px;">
                                <label class="field prepend-icon">
                                <input type="text" name="sendername" id="sendername" class="validate[required] gui-input" placeholder="Enter name">
                                <span class="field-icon"><i class="fa fa-user"></i></span> </label>
                            </div>
                            <div class="section" style="padding: 0px 0px;">
                                <label class="field prepend-icon">
                                <input type="email" name="emailaddress" id="emailaddress" class="validate[required,custom[email]] gui-input" placeholder="Email address">
                                <span class="field-icon"><i class="fa fa-envelope"></i></span> </label>
                            </div>
                            <div class="section" style="padding: 0px 0px;">
                                <label class="field prepend-icon">
                                <input type="tel" name="mobile" id="mobile" class="validate[required,custom[phone],maxSize[12],minSize[10]] gui-input" placeholder="Mobile No.">
                                <span class="field-icon"><i class="fa fa-phone-square"></i></span> </label>
                            </div>                             
                            <div class="section" style="padding: 0px 0px;">

                                <label class="field prepend-icon">
                                    <h4 style="margin-top: 0px;margin-bottom: 5px;">Resume Upload</h4>
                                    <input type="file" name="resume[]" class="validate[required] gui-input" multiple>
                                </label>
                            </div>                            
                        </div>
                        <!-- end section -->
                        
                        <div class="col-md-6">
                            <div class="section" style="padding: 0px 0px;">
                                <label class="field prepend-icon">
                                <input type="tel" name="whatsapp" id="" class="validate[custom[phone],maxSize[12],minSize[10]] gui-input" placeholder="Whatsapp No.">
                                <span class="field-icon"><i class="fa fa-whatsapp"></i></span> </label>
                            </div>                            
                            <div class="section" style="padding: 0px 0px;">
                                <label class="field prepend-icon">
                                <input type="text" name="work" id="" class="validate[required] gui-input" placeholder="Work Experience">
                            </div>                            
                            <div class="section" style="padding: 0px 0px;">
                                <label class="field prepend-icon">
                                <input type="text" name="designation" id="" class="validate[required] gui-input" placeholder="Apply for(Designation)">
                            </div>
                            <!-- end .form-body section -->
                            <div class="form-footer">
                                <h4 style="margin-top: 0px;margin-bottom: 5px;">&nbsp;</h4>
                                <input type="submit" id="user_register" name="register" value="SUBMIT" class="btn darkGreyBtn red-bg-btn back_color" style="color: #fff;">
                                <button type="reset" class="button"> Cancel </button>
                            </div>
                        </div>
                        <!-- end section --> 
                        
                    </div>
                    <!-- end .form-footer section -->
                </form>
            </div>
        </div>
    </div>
</section>
<br>
<?php include('footer.php');?>