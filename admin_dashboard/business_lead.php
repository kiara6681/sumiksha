<?php include('../includes/header.php');?>
<style>
    .modal-footer .btn+.btn
    {
        margin-bottom: 5px!important;
    }
</style>
<?php 
error_reporting(0);
    
    //approve/disaaprove user
    if(isset($_REQUEST['appr']))
    {
        $id=$_REQUEST['appr'];

        $delt=$_REQUEST['delt'];

        $unique_code=$_REQUEST['unique_code'];

        if($delt==0)
        {
            $delt=1;
        }
        else
        {
            $delt=0;
        }
        if(!empty($unique_code)){
            $approve = "UPDATE `login` SET `status` = '".$delt."', `unique_id` = '".$unique_code."' WHERE `id` = '$id'";
        }
        else{
            $approve = "UPDATE `login` SET `status` = '".$delt."' WHERE `id` = '$id'";
        }

        if($conn->query($approve))
        {
            //echo "Delete Succesfully";
        }
    }

    //delete user
    $rowCount = count($_POST["users"]);
        for($i=0;$i<$rowCount;$i++) {

        $conn->query("DELETE FROM login WHERE id='" . $_POST["users"][$i] . "'");

        header("Location: ".base_url()."admin_dashboard/business_lead.php");
    }

?>
<script>
    function setDeleteAction() {
        if(confirm("Are you sure want to delete these rows?")) {
        document.frmUser.action = "business_lead.php";
        document.frmUser.submit();
        }
    }
</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Tables</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url();?>includes/admin_home">Home</a>
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
            <form name="frmUser" method="post" action="">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <!-- <a href="banner.php" class="btn btn-success"><i class="fa fa-plus"></i> add</a> -->
                    <button type="button" name="delete" value="Delete" onClick="setDeleteAction();" class="btn btn-danger delete">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>S.No.</th>
                                <th>Refer By</th>
                                <th>Unique ID</th>
                                <th>Product Name</th>
                                <th>Sub Product Name</th>
                                <th>Full Name</th>
                                <th>Email Id</th>
                                <th>Mobile No.</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql_cmp=$conn->query("select business_enquiry.*, courses.name as product_name, course1.name as sub_product_name, login.name as user_name, login.unique_id from business_enquiry left join courses on courses.id = business_enquiry.product_id left join course1 on course1.id = business_enquiry.sub_product_id left join login on login.id = business_enquiry.user_id order by business_enquiry.id desc");
                                    $count=1;
                                    while($data_cmp=mysqli_fetch_array($sql_cmp))
                                    {
                                ?>
                                <tr class="gradeX">
                                    <td><input type="checkbox" class="data_check" name="users[]" value="<?= $data_cmp["id"]; ?>" ></td>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $data_cmp['user_name']; ?></td>
                                    <td style="color:red"><?php echo $data_cmp['unique_id']; ?></td>
                                    <td><?php echo $data_cmp['product_name']; ?></td>
                                    <td><?php echo $data_cmp['sub_product_name']; ?></td>
                                    <td><?php echo $data_cmp['full_name']; ?></td>
                                    <td><?php echo $data_cmp['email_id']; ?></td>
                                    <td><?php echo $data_cmp['mobile_no']; ?></td>
                                    <td><?php echo $data_cmp['created_at']; ?></td>
                                    <td class="center">
                                        <a href="business_lead_view.php?id=<?php echo $data_cmp['id']; ?>" class="btn btn-success btn-circle">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>                           
 
                                <div id="<?= $data_cmp['id'];?>" class="modal fade animated shake" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                <h4 class="modal-title"><i class="fa fa-user"></i> DisApprove User</h4>

                                            </div>
                                            <div class="modal-body">

                                                <p>Are you sure you want to DisApprove ?</p>

                                                
                                            </div>
                                            <div class="modal-footer">
                                                <form method="post" class="form-horizontal">
                                                    <input type="hidden" name="delt" id="delt" value="<?= $data_cmp['status'];?>">
                                                    <div class="col-sm-12">
                                                        <button class="btn btn-danger" type="submit" name="appr" value="<?php echo $data_cmp['id']; ?>" style="margin-top: 10px;">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php $count++; }?>
                            </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </form>
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