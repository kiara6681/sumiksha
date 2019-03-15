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

        $approve = "UPDATE `refer_earn` SET `status` = '".$delt."', `reject_reason` = '".$reject."' WHERE `id` = '".$id."'";

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
                                    <td>
                                        <?= $data_cmp['reject_reason'];?>
                                    </td>
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
                                                    <input type="hidden" id="refer_earn_<?= $data_cmp['id'];?>" name="delt" value="">
                                                    <input type="hidden" id="appr" name="appr" value="<?= $data_cmp['id'];?>">
                                                    <input type="text" class="form-control reject" name="reject" placeholder="write here...">
                                                </div>
                                                <div class="modal-footer">
                                                    <input class="btn btn-info reject_hide login" id="<?= $data_cmp['id'];?>" type="button" name="login" value="Login">
                                                    <input class="btn btn-primary reject_hide Inprocess"  id="<?= $data_cmp['id'];?>" type="button" name="inprocess" value="Inprocess">
                                                    <button class="btn btn-danger reject_hide file_pending"  id="<?= $data_cmp['id'];?>" type="button" name="file_pending">File Pending</button>
                                                    <button class="btn btn-success reject_hide approve"  id="<?= $data_cmp['id'];?>" type="button" name="approve">Approve</button>
                                                    <button class="btn btn-reject reject_hide dis_appr"  id="<?= $data_cmp['id'];?>" type="button">Reject</button>
                                                    <button class="btn btn-info reject" type="submit" name="dis_appr" style=" float: left;">Submit</button>
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