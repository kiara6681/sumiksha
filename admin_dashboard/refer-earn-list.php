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
<?php 
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

?>
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
                <div class="ibox-title">
                    <!-- <a href="banner.php" class="btn btn-success"><i class="fa fa-plus"></i> add</a> 
                    <button type="button" name="delete" value="Delete" onClick="setDeleteAction();" class="btn btn-danger delete">
                        <i class="fa fa-trash"></i> Delete
                    </button>-->
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Refer By</th>
                                <th>Refer Name</th>
                                <th>Phone</th>
                                <th>Product</th>
                                <th>Sub Product</th>
                                <th>Required Loan Amount</th>
                                <th>Approved Loan Amount</th>
                                <th>Login Bank</th>
                                <th>Login Date</th>
                                <th>Created Date</th>
                                <th>Approval</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $sql_cmp = $conn->query("select refer_earn.*, courses.name as product, course1.name as sub_product, login.name as user_name from refer_earn left join courses on courses.id = refer_earn.product_id left join course1 on course1.id = refer_earn.sub_product_id left join login on login.id = refer_earn.user_id order by refer_earn.id desc");
                                $count=1;
                                while($data_cmp=mysqli_fetch_array($sql_cmp))
                                {
                            ?>
                                <tr class="gradeX">
                                    <td><?php echo $count; ?></td>
                                    <td><b><?php echo $data_cmp['user_name']; ?></b></td>
                                    <td><?php echo $data_cmp['name']; ?></td>
                                    <td><?php echo $data_cmp['phone']; ?></td>
                                    <td><?php echo $data_cmp['product']; ?></td>
                                    <td><?php echo $data_cmp['sub_product']; ?></td>
                                    <td style="color: red"><?php echo $data_cmp['required_loan']; ?></td>
                                    <td style="color: green"><?php echo $data_cmp['approve_loan']; ?></td>
                                    <td style="color: green"><?php echo $data_cmp['login_bank']; ?></td>
                                    <td style="color: green"><?php echo $data_cmp['login_date']; ?></td>
                                    <td><?php echo $data_cmp['created_at']; ?></td>
                                    <td>
                                        <?php
                                            if($data_cmp['status']==1){
                                        ?>
                                        <button type="button" class="btn btn-success btn-xs">Done</button>
                                        <?php
                                            }
                                            elseif($data_cmp['status']==2)
                                            {
                                        ?>
                                        <a href="#<?= $data_cmp['id'];?>" data-toggle="modal" class="btn btn-reject btn-xs" data-animation="bounceIn">
                                            Reject
                                        </a>
                                        <?php
                                            }
                                            elseif($data_cmp['status']==3)
                                            {
                                        ?>
                                        <a href="#<?= $data_cmp['id'];?>" data-toggle="modal" class="btn btn-info btn-xs" data-animation="bounceIn">
                                            Login
                                        </a>
                                        <?php
                                            }
                                            elseif($data_cmp['status']==4)
                                            {
                                        ?>
                                        <a href="#<?= $data_cmp['id'];?>" data-toggle="modal" class="btn btn-primary btn-xs" data-animation="bounceIn">
                                            Inprocess
                                        </a>
                                        <?php
                                            }
                                            elseif($data_cmp['status']==5)
                                            {
                                        ?>
                                        <a href="#<?= $data_cmp['id'];?>" data-toggle="modal" class="btn btn-danger btn-xs" data-animation="bounceIn">
                                            File Pending
                                        </a>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                        <a href="#<?= $data_cmp['id'];?>" data-toggle="modal" class="btn btn-warning btn-xs animation_select" data-animation="bounceIn">
                                            Waiting (click here for approve/disApprove)
                                        </a>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <?php
                                        if($data_cmp['status']==1):
                                    ?>
                                    <td>
                                        Approved
                                    </td>
                                    <?php
                                        else:
                                    ?>
                                    <td>
                                        <?= $data_cmp['reject_reason'];?>
                                    </td>
                                    <?php
                                        endif;
                                    ?>
                                </tr>
                                <div id="<?= $data_cmp['id'];?>" class="modal fade animated bounceIn" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><i class="fa fa-check"></i> Approval </h4>
                                            </div>
                                            <form action="" method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" id="refer_earn_<?= $data_cmp['id'];?>" name="delt">
                                                    <input type="hidden" id="appr" name="appr" value="<?= $data_cmp['id'];?>">
                                                    <div class="form-group login_show" style="display: none">
                                                        <label>Login Bank <span style="color: red">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                            <input type="text" name="login_bank" class="form-control login_req" value="<?php echo $data_cmp['login_bank']; ?>">
                                                        </div>
                                                    </div>                                                    
                                                    <div class="form-group login_show" id="data_1" style="display: none">
                                                        <label>Login Date <span style="color: red">*</span></label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="text" name="login_date" id="datepicker" class="form-control login_req" value="<?php echo $data_cmp['login_date']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group reject">
                                                        <label>Write Here <span style="color: red">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                            <input type="text" name="reject" class="form-control">
                                                        </div>
                                                    </div>                                                     
                                                    <div class="form-group approve_tab" style="display: none">
                                                        <label>Disbursed Loan Amount <span style="color: red">*</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                                            <input type="text" name="approved_loan" class="form-control approve_req" value="<?php echo $data_cmp['approve_loan']; ?>">
                                                        </div>
                                                    </div>  
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-info reject_hide login" id="<?= $data_cmp['id'];?>" data-id="<?= $data_cmp['product_id'];?>" type="button" name="login">Login</button>
                                                    <button class="btn btn-primary reject_hide Inprocess" id="<?= $data_cmp['id'];?>" type="button" name="inprocess">Inprocess</button>
                                                    <button class="btn btn-danger reject_hide file_pending"  id="<?= $data_cmp['id'];?>" type="button" name="file_pending">File Pending</button>
                                                    <button class="btn btn-success reject_hide approve"  id="<?= $data_cmp['id'];?>" type="button" name="approve">Approve</button>
                                                    <button class="btn btn-reject reject_hide dis_appr"  id="<?= $data_cmp['id'];?>" type="button">Reject</button>
                                                    <button class="btn btn-info reject approve_tab login_show" type="submit" name="dis_appr" style=" float: left;">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>                              

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
<div id="image_modal" class="modal fade animated shake" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Delete Category</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to Delete ?</p>
                <input type="hidden" id="delt" value="<?= $data_cmp['id'];?>"> 
            </div>
            <div class="modal-footer">
                <form method="post">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit" name="delete" value="<?php echo $data_cmp['id']; ?>">Delete</button>
                </form>
            </div>
        </div>

    </div>
</div>

<?php include('../includes/footer.php');?>