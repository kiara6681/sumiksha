<?php include('../includes/header.php');?>
<?php 
error_reporting(0);
if(isset($_POST['addnews_events']))
{
/*    $structure = "uploads/news_events/";
    
    if(!file_exists($structure))
    {
        mkdir($structure, 0777, true);
    }
    
    $p_image1 = '';
    
    if ($_FILES['p_image1']['type'] != "image/gif" && $_FILES['p_image1']['type'] != "image/jpeg" 
    && $_FILES['p_image1']['type'] != "image/jpg" && $_FILES['p_image1']['type'] != "image/png") 
    { 
        $err = "This file type is not allowed";
    }
    else 
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $filename = substr( str_shuffle( $chars ), 0, 10 );
          
        $ext = pathinfo($_FILES['p_image1']['name'], PATHINFO_EXTENSION);
        
        $path=$structure."/".$filename.'.'.$ext;
        
        move_uploaded_file($_FILES['p_image1']['tmp_name'], $path );            
        $p_image1 = $filename.'.'.$ext;
    }
*/
    $scheme_name = $_REQUEST['scheme_name'];
    $nav = $_REQUEST['nav'];
    $three_M = $_REQUEST['3M'];
    $six_M = $_REQUEST['6M'];
    $one_yr = $_REQUEST['1yr'];
    $three_yrs = $_REQUEST['3yrs'];
    $five_yrs = $_REQUEST['5yrs'];
    $ytd = $_REQUEST['ytd'];

    $start_date = date("Y-m-d H:i:s");

    if(mysqli_query($conn, "INSERT INTO `mutual_funds` (`scheme_name`, `nav`, `3M`, `6M`, `1yr`, `3yrs`, `5yrs`, `ytd`, `created_at`) VALUES ('$scheme_name', '$nav', '$three_M', '$six_M', '$one_yr', '$three_yrs', '$five_yrs', '$ytd', '$start_date')"))
    {
        echo "<script language='javascript'>alert('Successfully Submited !');window.location ='mutual_fund.php';</script>";
    }
}

?>


<?php 

    if(isset($_REQUEST['delete']))
    {
        $id=$_REQUEST['delete'];

        $delete = "delete from mutual_funds where id='$id'";

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
            <h2>Mutual Funds</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url();?>includes/admin_home.php">Home</a>
                </li>
                <li>
                    <a>Forms</a>
                </li>
                <li class="active">
                    <strong>Mutual Funds</strong>
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
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Scheme Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="scheme_name" class="form-control">
                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="col-sm-2 control-label">NAV (<i class="fa fa-inr"></i>)</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nav" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">3M</label>
                                <div class="col-sm-10">
                                    <input type="text" name="3M" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">6M</label>
                                <div class="col-sm-10">
                                    <input type="text" name="6M" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">1yr </label>
                                <div class="col-sm-10">
                                    <input type="text" name="1yr" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">3yrs</label>
                                <div class="col-sm-10">
                                    <input type="text" name="3yrs" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">5yrs</label>
                                <div class="col-sm-10">
                                    <input type="text" name="5yrs" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ytd</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ytd" class="form-control">
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
                                <th>NAV (<i class="fa fa-inr"></i>)</th>
                                <th>3M</th>
                                <th>6M</th>
                                <th>1yr</th>
                                <th>3yrs</th>
                                <th>5yrs</th>
                                <th>YTD</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $sql_cmp = $conn->query("select * from mutual_funds order by id desc limit 0,10");
                                $count=1;
                                while($data_cmp=mysqli_fetch_array($sql_cmp))
                                {
                            ?>
                                <tr class="gradeX">
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $data_cmp['scheme_name']; ?></td>
                                    <td><?php echo $data_cmp['nav']; ?></td>
                                    <td><?php echo $data_cmp['3M']; ?></td>
                                    <td><?php echo $data_cmp['6M']; ?></td>
                                    <td><?php echo $data_cmp['1yr']; ?></td>
                                    <td><?php echo $data_cmp['3yrs']; ?></td>
                                    <td><?php echo $data_cmp['5yrs']; ?></td>
                                    <td><?php echo $data_cmp['ytd']; ?></td>
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