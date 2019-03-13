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
            <h2>Notifications</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url();?>includes/admin_home.php">Home</a>
                </li>
                
                <li class="active">
                    <strong>Notifications</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Notifications</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <marquee direction="up" scrollamount="2" onmouseover="stop()" onmouseout="start()">
                            <?php 
                                $sql_cmp = $conn->query("select * from notifications where status='1' order by id desc");
                                $count=1;
                                while($data_cmp=mysqli_fetch_array($sql_cmp))
                                {
                            ?>
                            <div class="alert alert-success">
                                <?php echo $data_cmp['notification']; ?>
                            </div>
                            <?php 
                                $count++; 
                                    }
                            ?>
                        </marquee>
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