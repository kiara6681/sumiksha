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
            <h2>Offers</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url();?>includes/admin_home.php">Home</a>
                </li>
                
                <li class="active">
                    <strong>Offers</strong>
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
                        <h5>Offers</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <?php 
                            $sql_cmp = $conn->query("select * from offers where status='1'");
                            $count=1;
                            while($data_cmp=mysqli_fetch_array($sql_cmp))
                            {
                        ?>
                        <div class="alert alert-success">
                            <a class="alert-link" href="#offer_<?= $data_cmp['id'];?>" data-toggle="modal" style="text-decoration: underline;"><?php echo $data_cmp['offer_name']; ?></a>.
                        </div>
                        <div id="offer_<?= $data_cmp['id'];?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"><i class="fa fa-gift"></i> Offer</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p><?php echo $data_cmp['offer_des']; ?></p>
                                  </div>
                                  <div class="modal-footer">
                                    <form method="post">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </form>
                                  </div>
                                </div>

                            </div>
                        </div> 
                        <?php 
                            $count++; 
                                }
                        ?>
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