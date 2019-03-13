<?php include('../includes/header.php');?>

<script src="<?= base_url();?>assets/js/jquery-3.1.1.min.js"></script>
<script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
<script language="javascript"> 
    //pop up script
    $(document).ready(function(e){
        // Get Subcategory By Category ID
        $("#category").change(function(){
            
            var categoryid = $("#category").val();
            //alert(categoryid);
            $.ajax({
                url : "<?= base_url();?>ajaxPages/getSubcategory.php",
                type : "POST",
                data : {categoryid:categoryid},
                success : function(data)
                {
                    //alert(data);
                    $("#subcategory").html(data);
                }
            });
        });
    });
</script>
<style>
.form-group .control-label:after {
    content: "*";
    color: red;
}
</style>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Redemption Request</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url();?>includes/admin_home.php">Home</a>
                </li>
                <li class="active">
                    <strong>Redemption Request</strong>
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
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>User Name</th>
                                <th>Created Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $sql_cmp = $conn->query("select redem_statement_request.*, login.name as user_name from redem_statement_request left join login on login.id = redem_statement_request.user_id where redem_statement_request.name ='redemption' order by redem_statement_request.id desc");
                                $count=1;
                                while($data_cmp=mysqli_fetch_array($sql_cmp))
                                {
                            ?>
                                <tr class="gradeX">
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $data_cmp['user_name']; ?></td>
                                    <td><?php echo $data_cmp['created_at']; ?></td>

                                </tr>                           

                            <?php 
                            $count++; 
                                }
                            ?>
                            </tbody>
                       </table>
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
<?php include('../includes/footer.php');?>