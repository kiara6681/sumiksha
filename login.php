<?php include('header.php');?>
<?php
    
    $error = false;
    
    if( isset($_POST['Login']) ) { 
        
        
        $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);
        
        $pass = trim($_POST['pass']);
        $pass = strip_tags($pass);
        $pass = htmlspecialchars($pass);
        
        
        if(empty($email)){
            $error = true;
            $emailError = "Please enter your email address.";
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $error = true;
            $emailError = "Please enter valid email address.";
        }
        
        if(empty($pass)){
            $error = true;
            $passError = "Please enter your password.";
        }
        
        if(!$error){
            
            $password = hash('sha256', $pass); // password hashing using SHA256-
             
            $res="select * from login where username='$email' and status='1'";

            $result = mysqli_query($conn, $res);
            $count = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);
             // if uname/pass correct it returns must be 1 row
            
            if( $count == 1 && $row['password']==$password ) {
                $user_id = $row['id'];
                $_SESSION['kU7sDGw65ra8ee65aFasae9Dr6as5d6'] = $row['id'];
                $_SESSION['user'] = $row['id'];
                $roles=$conn->query("select * from user_roles where user_id='$user_id'");
                $user_roles=mysqli_fetch_array($roles);
                if($user_roles['role_id']==1)
                {
                    header("Location: ".base_url()."includes/admin_home.php");
                }
                elseif($user_roles['role_id']==2 || $user_roles['role_id']==3 || $user_roles['role_id']==4 || $user_roles['role_id']==5){
                    header("Location: ".base_url()."includes/user_home.php");
                }
            } else {
                    $errMSG = "Incorrect Credentials, Try again...";
            }
                
        }
        
    }
?>
<section class="gredientPattern container-fluid" style="padding-top: 110px;">
    <div class="pageSection row magic-3">      
        <img src="<?= base_url();?>assets/img/LOGIN.jpg" alt="" class="img-responsive">
    </div>
</section>
<section class="section-side-image clearfix">
    <div class="container">
        <div class="row">

            <div class="col-md-3 col-sm-3 col-xs-12 bmargin"></div>
            <div class="col-md-6 col-sm-6 col-xs-12 bmargin"> 
              
                <h3 class="text-center" style="color: #000;font-weight: 600;">Login Form</h3>
                <br>
                <?php
                    if (isset($errMSG) ) 
                    {
                ?>
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                        </div>
                    </div>
                <?php
                    }
                ?>
                <form class="job-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                 
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-cont col-md-12">
                                <label>Email Address</label>
                                <input name="email" type="email" class="form-control" placeholder="eg:example@gmail.com" required=""/>
                            </div> 

                            <div class="form-cont col-md-12">
                                <label>Password</label>
                                <input name="pass" type="password" class="form-control" placeholder="******" required=""/>
                            </div>

                       </div>
                    </div>
                   
                    <div class="clearfix"></div>
                    <div class="row text-center">
                        <input type="submit" value="SUBMIT" name="Login" class="btn btn-primary sender_submit" style="margin-top: 10px;">
                        <a href="<?= base_url();?>forget" style="padding: 10px;font-size: 20px;vertical-align: middle;color: #003399;text-decoration: underline;"><small>Forgot Password ?</small></a>
                    </div>

                </form>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 bmargin"></div>
            <!--end right column--> 
        </div>
    </div>
</section>
<?php include('footer.php');?>