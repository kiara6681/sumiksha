<?php include('../includes/header.php');?>
<style>
    .modal-footer .btn+.btn
    {
        margin-bottom: 5px!important;
    }
</style>
<?php 
error_reporting(0);

    //delete user
    $rowCount = count($_POST["users"]);
        for($i=0;$i<$rowCount;$i++) {

        $conn->query("DELETE FROM job WHERE id='" . $_POST["users"][$i] . "'");

        header("Location: ".base_url()."admin_dashboard/job.php");
    }

?>
<script>
    function setDeleteAction() {
        if(confirm("Are you sure want to delete these rows?")) {
        document.frmUser.action = "job.php";
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
                                <th>Full Name</th>
                                <th>Email Id</th>
                                <th>Mobile No.</th>
                                <th>Whatsapp</th>
                                <th>Work Experience</th>
                                <th>Designation</th>
                                <th>Resume</th>
                                <th>Created Date</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql_cmp=$conn->query("select * from job order by id desc");
                                    $count=1;
                                    while($data_cmp=mysqli_fetch_array($sql_cmp))
                                    {
                                ?>
                                <tr class="gradeX">
                                    <td><input type="checkbox" name="users[]" value="<?= $data_cmp["id"]; ?>" ></td>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $data_cmp['name']; ?></td>
                                    <td><?php echo $data_cmp['email']; ?></td>
                                    <td><?php echo $data_cmp['mobile']; ?></td>
                                    <td><?php echo $data_cmp['whatsapp']; ?></td>
                                    <td><?php echo $data_cmp['work']; ?></td>
                                    <td><?php echo $data_cmp['designation']; ?></td>
                                    <td>
                                    <?php
                                        $resume = $data_cmp['resume'];
                                        $resume = explode(".",$resume);
                                        if($resume[1]=="pdf")
                                        {
                                    ?>
                                    <a href="<?= base_url();?>admin_dashboard/uploads/resume/<?= $data_cmp['resume'];?>" target="_blank">VIEW PDF</a>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                    <img src="<?= base_url();?>admin_dashboard/uploads/resume/<?= $data_cmp['resume'];?>" class="img-responsive">
                                    <?php
                                        }
                                    ?>
                                    </td>
                                    <td><?php echo $data_cmp['created_at']; ?></td>
                                </tr>                           
                                <?php $count++; 
                                    }
                                ?>
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