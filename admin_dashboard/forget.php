<?php 
error_reporting(0);
include('config.php');
if($_POST['submit']=='Send')
{
//keep it inside
    $email=$_POST['email'];
    $code = $_GET['activation_code'];
    $query = $conn->query("select * from login where username='$email'");
    $row1 = mysqli_fetch_array($query);
    $email_id = $row1['username'];
    if($email==$email_id)
    {
        $code=rand(100,999);
        //$message="You activation link is: http://bing.fun2pk.com/resetpass.php?email=$email&code=$code";
        //mail($email, "Dexus Media", $message);
        
        $query2 = mysqli_query($conn,"update login set activation_code='$code' where username='$email'");
        
        $subject = "Reset Password";
        $to_email = "$email";
        $to_fullname = "Admin";
        $from_email = "$email";
        $from_fullname = "Dexus Media Admin Panel";
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        // Additional headers
        // This might look redundant but some services REALLY favor it being there.
        $headers .= "To: $to_fullname <$to_email>\r\n";
        $headers .= "From: $from_fullname <$from_email>\r\n";
        $message = "Reset Password link is: http://www.dexusmedia.org/jainco/manage/resetpass.php?email=$email&code=$code";
        if (!mail($to_email, $subject, $message, $headers)) { 
            print_r(error_get_last());
        }
        else 
        { 
            $success = 'Email sent successfully';
        }
    }
    else
        {
        $errMSG = 'No user exist with this email id';
    }
}

?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dexus Media</title>
    <link rel="icon" href="http://dexusmedia.com/images/favicon.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

        <div class="middle-box text-center loginscreen animated fadeInDown">
            <div>
                <div><img src="../images/logo.png" class="img-responsive"></div>
                <h3>Welcome to Dexus Media Admin Panel</h3>
                <p>Reset Password</p>
                    <?php
                        if (isset($errMSG)) 
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
                            <div class="alert alert-success">
                                <span class="glyphicon glyphicon-ok"></span> <?php echo $success; ?>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                <form method="post" class="m-t" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="E-Mail Address" name="email" required="">
                    </div>
    
                    <button type="submit" class="btn btn-primary block full-width m-b" name="submit" value="Send">Send Password Reset Link</button>
    
                    <a href="index.php"><small>Login</small></a>
                  <!--  <p class="text-muted text-center"><small>Do not have an account?</small></p>
                    <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a> -->
                </form>
                <p class="m-t"> <small>Dexus Media &copy; 2017</small></p>
            </div>
        </div>

        <!-- Mainly scripts -->
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
