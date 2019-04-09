<?php include('../includes/header.php');?>
<style>
    .modal-footer .btn+.btn
    {
        margin-bottom: 5px!important;
    }
    .btn-reject {
        color: #fff;
        background: red;
        border: 1px solid red;
    }
    .reject{
        display: none;
    }
</style>
<!-- upload pdf -->
<?php 
    error_reporting(0); 
    $user_id = $_REQUEST['id'];
?>

<script>
    function setDeleteAction() {
        if(confirm("Are you sure want to delete these rows?")) {
        document.frmUser.action = "users-list.php";
        document.frmUser.submit();
        }
    }
</script>
<script src="<?= base_url();?>assets/js/jquery-3.1.1.min.js"></script>
<script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Tables</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url();?>includes/admin_home.php">Home</a>
            </li>
            <li>
                <a>Tables</a>
            </li>
            <li class="active">
                <strong>Data Tables</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-left"><h5>Total Loan Amount</h5></span>
                </div>
                <div class="ibox-content">
                    <?php
                        $sql = $conn->query("SELECT sum(approve_loan) as total_amount FROM `refer_earn` where user_id='$user_id'");
                        $row = mysqli_fetch_array($sql);
                    ?>
                    <h1 class="no-margins"><?= $row['total_amount'];?> INR</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-left"><h5>Total Credit Cards</h5></span>
                </div>
                <div class="ibox-content">
                    <?php
                        $sql = $conn->query("SELECT count(*) as total_cards FROM `refer_earn` where user_id='$user_id' and product_id = 8 and status = 1");
                        $row = mysqli_fetch_array($sql);
                    ?>
                    <h1 class="no-margins"><?= $row['total_cards'];?> Cards</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-left"><h5>Total Insurance</h5></span>
                </div>
                <div class="ibox-content">
                    <?php
                        $sql = $conn->query("SELECT count(*) as total_insurance FROM `refer_earn` where user_id='$user_id' and product_id = 5 and status = 1");
                        $row = mysqli_fetch_array($sql);
                    ?>
                    <h1 class="no-margins"><?= $row['total_insurance'];?> Insurance</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <?php
                if (isset($succMSG)) 
                {
            ?>
                <div class="form-group">
                    <div class="alert alert-success">
                        <i class="fa fa-check"></i> <?php echo $succMSG; ?>
                    </div>
                </div>
            <?php
                }
            ?>
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Product</th>
                                    <th>Sub Product</th>
                                    <!-- <th>Required Loan Amount</th> -->
                                    <th>Approved Loan Amount</th>
<!--                                     <th>Login Bank</th>
<th>Login Date</th> -->
                                    <th>Net Premium</th>
                                    <th>TP</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $sql_cmp = $conn->query("select refer_earn.*, courses.name as product, course1.name as sub_product, states.name as state_name, cities.name as city_name, login.name as user_name from refer_earn left join courses on courses.id = refer_earn.product_id left join course1 on course1.id = refer_earn.sub_product_id left join login on login.id = refer_earn.user_id left join states on states.id = refer_earn.state_id left join cities on cities.id = refer_earn.city_id where user_id = '$user_id' order by refer_earn.id desc");
                                $count=1;
                                while($data_cmp = mysqli_fetch_array($sql_cmp))
                                {
                            ?>
                            <tr class="gradeX">
                                <td><?php echo $count; ?></td>
                                <td><?php echo $data_cmp['product']; ?></td>
                                <td><?php echo $data_cmp['sub_product']; ?></td>
                                <!-- <td style="color: red"><?php echo $data_cmp['required_loan']; ?></td> -->
                                <td style="color: green"><?php echo $data_cmp['approve_loan']; ?></td>
<!--                                 <td style="color: green"><?php echo $data_cmp['login_bank']; ?></td>
<td style="color: green"><?php echo $data_cmp['login_date']; ?></td> -->
                                <td style="color: green"><?php echo $data_cmp['net_premium']; ?></td>
                                <td style="color: green"><?php echo $data_cmp['tp']; ?></td>
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
<div id="upload_pdf" class="modal fade" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-upload"></i> Upload PDF File</h4>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="file" id="upload_file" name="upload_file"> 
                    <input type="hidden" name="us_id" id="us_id" value=""> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit" name="upload_pdf">Upload PDF</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('../includes/footer.php');?>