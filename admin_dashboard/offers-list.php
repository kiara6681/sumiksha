<?php include('../includes/header.php');?>
<?php 
error_reporting(0);
if(isset($_POST['addnews_events']))
{

    $offer_name = $_REQUEST['offer_name'];
    $offer_des = $_REQUEST['offer_des'];
    $start_date = $_REQUEST['start_date'];
    $end_date = $_REQUEST['end_date'];

/*    $start_date = date("Y-m-d H:i:s");
    $end_date = date("Y-m-d H:i:s");*/

    if(mysqli_query($conn, "INSERT INTO `offers` (`offer_name`, `offer_des`, `start_date`, `end_date`) VALUES ('$offer_name', '$offer_des', '$start_date', '$end_date')"))
    {
        echo "<script language='javascript'>alert('Successfully Submited !');window.location ='offers-list.php';</script>";
    }
}

?>
<style>
    .modal-footer .btn+.btn
    {
        margin-bottom: 5px!important;
    }
</style>
<?php 

    if(isset($_REQUEST['delete']))
    {
        $id=$_REQUEST['delete'];

        $delete = "delete from offers where id='$id'";

        if($conn->query($delete))
        {
            //echo "Delete Succesfully";
        }
    }

?>
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
                <!-- <div class="ibox-title">
                    <a href="news_events.php" class="btn btn-success"><i class="fa fa-plus"></i> add</a>
                </div> -->
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" class="parsley-form" id="agent_form">
                            <input type="hidden" name="user_id" value="<?= $_SESSION['user'];?>" class="form-control">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Offer Name <span style="color: red">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" name="offer_name" class="form-control" required>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Offer Description <span style="color: red">*</span></label>
                                <div class="col-sm-6">
                                    <textarea cols="10" rows="5" name="offer_des" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="form-group" id="data_1">
                                <label class="col-sm-2 control-label">Start Date <span style="color: red">*</span></label>
                                <div class="col-sm-4 input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="start_date" class="form-control" required="">
                                </div>
                            </div>                            
                            <div class="form-group" id="data_1">
                                <label class="col-sm-2 control-label">End Date <span style="color: red">*</span></label>
                                <div class="col-sm-4 input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="end_date" class="form-control" required>
                                </div>
                            </div>                            

                            <div class="hr-line-dashed"></div>
     
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <input type="submit" value="Save" name="addnews_events" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Offer Name</th>
                                <th>Offer Description</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $sql_cmp = $conn->query("select * from offers where status='1'");
                                $count=1;
                                while($data_cmp=mysqli_fetch_array($sql_cmp))
                                {
                            ?>
                                <tr class="gradeX">
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $data_cmp['offer_name']; ?></td>
                                    <td><?php echo $data_cmp['offer_des']; ?></td>
                                    <td><?php echo $data_cmp['start_date']; ?></td>
                                    <td><?php echo $data_cmp['end_date']; ?></td>
                                    <td class="center">
                                        <a href="#<?= $data_cmp['id'];?>" data-toggle="modal" class="btn btn-danger btn-circle animation_select" data-animation="shake">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                </tr>
                                <div id="<?= $data_cmp['id'];?>" class="modal fade animated shake" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
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