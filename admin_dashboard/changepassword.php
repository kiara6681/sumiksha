<?php include('../includes/header.php');?>
 <?php
    $ud=$_SESSION['user'];

    if(isset($_POST['save_updates']))
    {
        $new_pass = $_POST['new_pass'];
        
        $confirm_pass = $_POST['confirm_pass'];

        if($new_pass==$confirm_pass)
        {
            $new_pass = hash('sha256', $new_pass); // password hashing using SHA256
            
            $update_query = mysqli_query($conn, "update login set password='$new_pass' where id='$ud'");
                            
            if($update_query){
            
                echo "<script>alert('Password has been updated')</script>";
            }
            else{
                echo "<script>alert('Password Not Change')</script>";
            }          
        }
       else {
            echo "<script>alert('New Password and Confirm Password Not Match')</script>";
       }
    }

?>
<script src="<?= base_url();?>assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#password, #confirm_password').on('keyup', function () {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#message').html('Password Matching').css('color', 'green');
                $("#update_pass").show();

            } else{
                $('#message').html('Password Not Matching').css('color', 'red');
                $("#update_pass").hide();
            } 
        });
    });
</script>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Change Password Form</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url();?>includes/admin_home.php">Home</a>
                </li>
                <li>
                    <a>Forms</a>
                </li>
                <li class="active">
                    <strong>Change Password Form</strong>
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

                        <form class="formular form-horizontal ls_form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"> 
                            
                            <div class="row ls_divider">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">New Password:* </label>

                                    <div class="col-md-10">
                                        <input placeholder="*****" id="password" required class="form-control text-input" type="password" name="new_pass" />
                                    </div>
                                </div>
                            </div>   

                            <div class="row ls_divider">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Confirm Password:* </label>

                                    <div class="col-md-10">
                                        <input placeholder="*****" id="confirm_password" required class="form-control text-input" type="password" name="confirm_pass" />
                                        <span id='message'></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row ls_divider last" id="update_pass">
                                <div class="form-group">
                                    <label class="col-md-2 control-label"></label>

                                    <div class="col-sm-10">
                                        <button class="submit btn-primary btn" type="submit" name="save_updates">Update</button>
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