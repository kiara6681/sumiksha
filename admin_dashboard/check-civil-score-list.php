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
<!-- <?php 
error_reporting(0); 

    //disaaprove user
    if(isset($_REQUEST['dis_appr']))
    {
        $id=$_REQUEST['appr'];

        $delt=$_REQUEST['delt'];
        
        $reject=$_REQUEST['reject'];

        $login_bank=$_REQUEST['login_bank'];

        $login_date=$_REQUEST['login_date'];

        $approved_loan=$_REQUEST['approved_loan'];

        $approve = "UPDATE `refer_earn` SET `status` = '".$delt."', `reject_reason` = '".$reject."', `login_bank` = '".$login_bank."', `login_date` = '".$login_date."', `approve_loan` = '".$approved_loan."' WHERE `id` = '".$id."'";

        if($conn->query($approve))
        {
            echo "Submitted Succesfully";
        }
    }

    //delete user
    $rowCount = count($_POST["users"]);
        for($i=0;$i<$rowCount;$i++) {

        $conn->query("DELETE FROM login WHERE id='" . $_POST["users"][$i] . "'");

        header("Location: ".base_url()."admin_dashboard/users-list.php");
    }

?> -->
<script>
    function setDeleteAction() {
        if(confirm("Are you sure want to delete these rows?")) {
        document.frmUser.action = "users-list.php";
        document.frmUser.submit();
        }
    }
</script>
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
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email ID</th>
                                <th>Pan Card</th>
                                <th>Address</th>
                                <th>Created Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $sql_cmp = $conn->query("select * from check_civil_score order by id desc");
                                $count=1;
                                while($data_cmp=mysqli_fetch_array($sql_cmp))
                                {
                            ?>
                                <tr class="gradeX">
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $data_cmp['name']; ?></td>
                                    <td><?php echo $data_cmp['phone']; ?></td>
                                    <td><?php echo $data_cmp['email']; ?></td>
                                    <td><?php echo $data_cmp['pancard']; ?></td>
                                    <td><?php echo $data_cmp['address']; ?></td>
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
<?php include('../includes/footer.php');?>