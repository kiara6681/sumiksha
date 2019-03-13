<?php include('header.php');?>
<?php
if(isset($_POST['Submit'])) 
    {
        $email = $_POST['email'];

        $query = $conn->query("select * from login where username='$email'");

        $row1 = mysqli_fetch_array($query);

        $email_id = $row1['username'];

        if($email == $email_id)
        {
            $code=rand(100,999);
            $query2 = mysqli_query($conn,"update login set activation_code='$code' where username='$email'");
            
            $message="";
            $message .="Reset Password link : <a href='".base_url()."resetpass.php?email=$email&code=$code'> Click Here</a>";
            $subject  ="Reset Password"; //like--- Resume From Website
            $headers  ="";
            include("PHPMailer/PHPMailerAutoload.php"); //Here magic Begen we include PHPMailer Library.
            include("PHPMailer/class.phpmailer.php");   
            $mail = new PHPMailer;
                                          // Enable verbose debug output
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'mailout.one.com;';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'test@sumikshaservices.com';// SMTP username 
            $mail->Password = '?t@NYp^L.Fay'; // SMTP password 
            $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted
            $mail->Port = 25; 
            $mail->SMTPDebug = 0; // TCP port to connect to
            $mail->setFrom('test@sumikshaservices.com', 'Reset Password'); //You Can add your own From mail
            $mail->addAddress($email); // Add a recipient id where you want to send mail 
            
            $mail->addAttachment($_FILES['cv']['tmp_name'],$_FILES['cv']['name']); //This line Use to Keep User Txt,Doc,pdf file ,attachment      
            $mail->addReplyTo('info@sumikshaservices.com'); //where you want reply from user
            $mail->isHTML(true); 
            $mail->Subject=''.$subject;
            $mail->Body=''.$message;
            if(!$mail->send()) 
                {                            
                    echo "Error in Form :- $mail->ErrorInfo!. We will Fix This soon";
                }
            else 
                {    
                    echo "<script language='javascript'>alert('Submitted Successfully!');window.location='https://sumikshaservices.com/forget';</script>";              
                }
            return true;    
        }
        else
        {
            $errMSG = 'No user exist with this email id';
        }
    }
?>


<section class="gredientPattern container-fluid" style="padding-top: 110px;">

    <div class="pageSection row magic-3">      

        <!-- <img src="<?= $urlset;?>images/blog/header-img-01.jpg" alt="" class="img-responsive">  -->

    </div>

</section>

<section class="section-side-image clearfix">

    <div class="container">

        <div class="row">



            <div class="col-md-3 col-sm-3 col-xs-12 bmargin"></div>

            <div class="col-md-6 col-sm-6 col-xs-12 bmargin"> 

              

                <h3 class="text-center" style="color: #000;font-weight: 600;">Forgot Password</h3>

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

                 

                    <div class="row">

                        <div class="col-md-12">



                            <div class="form-cont col-md-12">

                                <label>Email Address</label>

                                <input name="email" type="email" class="form-control" placeholder="eg:example@gmail.com" required=""/>

                            </div> 

                       </div>

                    </div>

                   

                    <div class="clearfix"></div>

                    <div class="row text-center">

                        <input type="submit" value="SUBMIT" name="Submit" class="btn btn-primary sender_submit" style="margin-top: 10px;">

                    </div>



                </form>

            </div>

            <div class="col-md-3 col-sm-3 col-xs-12 bmargin"></div>

            <!--end right column--> 

        </div>

    </div>

</section>

<?php include('footer.php');?>