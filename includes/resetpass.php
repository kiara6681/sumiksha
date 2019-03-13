 <?php
    include('config.php');
    if(isset($_GET['code'])){

        $acode = $_GET['code'];
        $email = $_GET['email'];
    }
    
    if(isset($_POST['save_updates']))
    {
        
        $link = $_POST['link'];
        $acode1 = $_POST['code'];
        $email1 = $_POST['email'];
        $new_pass = $_POST['new_pass'];
        $cfm_pass = $_POST['cfm_pass'];
        
        $query = $conn->query("select * from login where activation_code='$acode1'");
        $row1 = mysqli_fetch_array($query);
        $activation_code = $row1['activation_code'];
        
        if($activation_code==$acode1)
        {
            if($new_pass==$cfm_pass)
            {
                $new_pass = hash('sha256', $new_pass); // password hashing using SHA256
                $update_query = mysqli_query($conn, "update login set password='$new_pass' where activation_code='$acode1'");
                        
                if($update_query)
                {
                    $active = mysqli_query($conn, "update login set activation_code='' where username='$email1'");
                    if($active)
                    {
                        echo "<script language='javascript'>alert('Password has been changed successfully');window.location = 'index.php';</script>";;
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
            <div>

                <img src="../images/logo.png" class="img-responsive">

            </div>
                <h3>Welcome to Dexus Media Admin Panel</h3>
                <p>Change Password</p>
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
                    <form class="formular form-horizontal ls_form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <input class="form-control text-input" type="hidden" name="code" value="<?= $acode;?>" required/>
                        <input class="form-control text-input" type="hidden" name="email" value="<?= $email;?>" required/>
                        <input class="form-control text-input" type="hidden" name="link" value="<?= $actual_link;?>" required/>
                        <div class="row ls_divider">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input placeholder="New Password" class="form-control text-input" type="password" name="new_pass" required/>
                                </div>
                            </div>
                        </div> 
                        
                        <div class="row ls_divider">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input placeholder="Confirm Password" class="form-control text-input" type="password" name="cfm_pass" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row ls_divider last">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="submit btn-primary btn" type="submit" name="save_updates" style="width: 100%;">Change Password</button>
                                </div>
                            </div>
                        </div>

                    </form>
                <p class="m-t"> <small>Dexus Media &copy; 2017</small></p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
