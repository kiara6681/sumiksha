<?php include('header.php');?>

<?php 
error_reporting(0);
    if(isset($_GET['code'])){

        $acode = $_GET['code'];
        $email = $_GET['email'];
    }
    if(isset($_POST['reset']))
    {

        $link = $_POST['link'];
        $acode1 = $_POST['code'];
        $email1 = $_POST['email'];
        $new_pass = $_POST['new_password'];
        $cfm_pass = $_POST['cnfm_password'];
        
        $query = $conn->query("select * from login where activation_code='$acode1'");
        $row1 = mysqli_fetch_array($query);
        $activation_code = $row1['activation_code'];
        $email = $row1['username'];
        
        if($activation_code==$acode1 && $email1==$email)
        {
            if($new_pass==$cfm_pass)
            {
                $new_pass = hash('sha256', $new_pass); // password hashing using SHA256
                $update_query = mysqli_query($conn, "update login set password='$new_pass' where activation_code='$acode1'");
                        
                if($update_query)
                {
                    $active = mysqli_query($conn, "update login set activation_code=NULL where username='$email1'");
                    if($active)
                    {
                        echo "<script language='javascript'>alert('Password has been changed successfully');window.location = 'https://sumikshaservices.com/login';</script>";;
                    }
                }
            }
            else
            {
                echo "<script language='javascript'>alert('New Password and Confirm Password does not match');window.location = 'resetpass.php?email=$email1&code=$acode1';</script>";
            }
        }
        
        else
        {
            echo "<script language='javascript'>alert('Wrong CODE');window.location = 'resetpass.php?email=$email1&code=$acode1';</script>";
        }

    }

?>

<section class="gredientPattern container-fluid" style="padding-top: 110px;">

    <div class="pageSection row magic-3">      

        <img src="<?= $urlset;?>images/blog/header-img-01.jpg" alt="" class="img-responsive"> 

    </div>

</section>

<section class="section-side-image clearfix">

    <div class="container">

        <div class="row">

            <div class="col-md-3 col-sm-3 col-xs-12 bmargin"></div>

            <div class="col-md-6 col-sm-6 col-xs-12 bmargin"> 

                <h3 class="text-center" style="color: #000;font-weight: 600;">Reset Password</h3>

                <br>

                <?php

                    if(isset($errMSG))

                    {

                ?>

                    <div class="form-group">

                        <div class="alert alert-danger">

                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>

                        </div>

                    </div>

                <?php

                    }

                    elseif(isset($success))

                    {

                ?>

                    <div class="form-group">

                        <div class="alert alert-danger">

                            <i class="fa fa-check"></i> <?php echo $success; ?>

                        </div>

                    </div>

                <?php

                    }

                ?>

                <form class="job-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                    <input class="form-control text-input" type="hidden" name="code" value="<?= $acode;?>" required/>
                    <input class="form-control text-input" type="hidden" name="email" value="<?= $email;?>" required/>
                    <input class="form-control text-input" type="hidden" name="link" value="<?= $actual_link;?>" required/>

                    <div class="row">

                        <div class="col-md-12">



                            <div class="form-cont col-md-12">

                                <label>New Password</label>

                                <input name="new_password" type="password" class="form-control" placeholder="******" required=""/>

                            </div> 

                            <div class="form-cont col-md-12">

                                <label>Confirm Password</label>

                                <input name="cnfm_password" type="password" class="form-control" placeholder="******" required=""/>

                            </div> 

                       </div>

                    </div>

                   

                    <div class="clearfix"></div>

                    <div class="row text-center">

                        <input type="submit" value="RESET" name="reset" class="btn btn-primary sender_submit" style="margin-top: 10px;">

                    </div>



                </form>

            </div>

            <div class="col-md-3 col-sm-3 col-xs-12 bmargin"></div>

            <!--end right column--> 

        </div>

    </div>

</section>

<?php include('footer.php');?>