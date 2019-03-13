<?php include('../includes/header.php');?>
<?php 
$user_id = $_REQUEST['id'];
error_reporting(0);
if(isset($_POST['addnews_events']))
{

    $user_id = $_REQUEST['user_id'];
    $scheme_name = $_REQUEST['scheme_name'];
    $nav = $_REQUEST['nav'];
    $amount_invested = $_REQUEST['amount_invested'];
    $market_value = $_REQUEST['market_value'];
    
    $start_date = date("Y-m-d H:i:s");
//exit;
    if(mysqli_query($conn, "INSERT INTO `user_mutual_funds` (`user_id`, `scheme_name`, `amount_invested`, `market_value`, `nav`, `created_at`) VALUES ('$user_id', '$scheme_name', '$amount_invested', '$market_value', '$nav', '$start_date')"))
    {
        echo "<script language='javascript'>alert('Successfully Submited !');window.location ='user_mutual_funds.php?id=".$user_id."';</script>";
    }
}

?>


<?php 

    if(isset($_REQUEST['delete']))
    {
        $id=$_REQUEST['delete'];

        $delete = "delete from user_mutual_funds where id='$id'";

        if($conn->query($delete))
        {
            //echo "Delete Succesfully";
        }
    }

?>
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
            <h2>User Mutual Funds</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url();?>includes/admin_home.php">Home</a>
                </li>
                <li>
                    <a>Forms</a>
                </li>
                <li class="active">
                    <strong>User Mutual Funds</strong>
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
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" class="parsley-form" id="agent_form">
                            <input type="hidden" value="<?= $user_id;?>" name="user_id">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Scheme Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="scheme_name" class="form-control">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Amount Invested</label>
                                <div class="col-sm-10">
                                    <input type="text" name="amount_invested" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Current Market Value</label>
                                <div class="col-sm-10">
                                    <input type="text" name="market_value" class="form-control">
                                </div>
                            </div>                             
                            <div class="form-group">
                                <label class="col-sm-2 control-label">NAV (<i class="fa fa-inr"></i>)</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nav" class="form-control">
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
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Scheme Name</th>
                                <th>Amount Invested</th>
                                <th>Current Market Value</th>
                                <th>NAV (<i class="fa fa-inr"></i>)</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $sql_cmp = $conn->query("select * from user_mutual_funds where user_id = '".$user_id."' order by id desc limit 0,10");
                                $count=1;
                                while($data_cmp=mysqli_fetch_array($sql_cmp))
                                {
                            ?>
                                <tr class="gradeX">
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $data_cmp['scheme_name']; ?></td>
                                    <td><?php echo $data_cmp['amount_invested']; ?></td>
                                    <td><?php echo $data_cmp['market_value']; ?></td>
                                    <td><?php echo $data_cmp['nav']; ?></td>
                                    <td><?php echo $data_cmp['created_at']; ?></td>
                                    <td>
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
                                            <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Delete</h4>
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
    <div class="footer">
        <div>
            <strong>Copyright</strong> &copy; 2017 Designed by <a href="http://dexusmedia.com/" target="_blank">Dexus Media</a>
        </div>
    </div>
<?php include('../includes/footer.php');?>
<?php //include('../includes/footer_scripts.php');?>