<?php include('../includes/header.php');?>

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
            <h2>Profile</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url();?>includes/admin_home.php">Home</a>
                </li>
                
                <li class="active">
                    <strong>Profile</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <?php 

                $edit_query = "select * from login where id='$ud'";
                
                $run_edit = $conn->query($edit_query); 
                
                $edit_row=mysqli_fetch_array($run_edit);

                $user_id=$edit_row['id'];
                $users=$conn->query("select * from user_roles where user_id='$user_id'");
                $user_row=mysqli_fetch_array($users)
            ?>
            <div class="col-lg-6">
                <div class="contact-box">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="text-center">
                                <img alt="image" class="rounded-circle m-t-xs img-fluid img-responsive" src="<?= base_url();?>assets/img/man.png">
                                <?php
                                    if($user_row['role_id']==2)
                                    {
                                ?>
                                <div class="m-t-xs font-bold">Customer</div>
                                <?php
                                    }
                                    elseif($user_row['role_id']==3)
                                    { 
                                ?>
                                <div class="m-t-xs font-bold">Channel Partner</div>
                                <?php
                                    }
                                    elseif($user_row['role_id']==4)
                                    { 
                                ?>
                                <div class="m-t-xs font-bold">Franchise Partner</div>
                                <?php
                                    }
                                    else
                                    { 
                                ?>
                                <div class="m-t-xs font-bold">Employee</div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <h3><strong><?= $edit_row['name'];?></strong></h3>
                            <p><i class="fa fa-envelope"></i> <?= $edit_row['username'];?></p>
                            <p><i class="fa fa-phone"></i> <?= $edit_row['phone'];?></p>
                            <!-- <address>
                                <strong>Twitter, Inc.</strong><br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890 
                            </address>-->
                        </div>
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