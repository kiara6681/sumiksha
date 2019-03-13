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
    $ipo_type = $_REQUEST['ipo_type'];
    $company = $_REQUEST['company'];
    $open_date = $_REQUEST['open_date'];
    $close_date = $_REQUEST['close_date'];
    $face_value = $_REQUEST['face_value'];
    $price_brand = $_REQUEST['price_brand'];
    $issue_size = $_REQUEST['issue_size'];

    $start_date = date("Y-m-d H:i:s");

    if(mysqli_query($conn, "INSERT INTO `ipo` (`ipo_type`, `company`, `open_date`, `close_date`, `face_value`, `price_brand`, `issue_size`, `created_at`) VALUES ('$ipo_type', '$company', '$open_date', '$close_date', '$face_value', '$price_brand', '$issue_size', '$start_date')"))
    {
        echo "<script language='javascript'>alert('Successfully Submited !');window.location ='ipo.php';</script>";
    }
}

?>


<?php 

    if(isset($_REQUEST['delete']))
    {
        $id=$_REQUEST['delete'];

        $delete = "delete from ipo where id='$id'";

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
            if(categoryid==1){
                $('.issue').show();
                $('.listing').hide();
            }
            else{
                $('.issue').hide();
                $('.listing').show();
            }

            //alert(categoryid);
/*            $.ajax({
                url : "<?= base_url();?>ajaxPages/getSubcategory.php",
                type : "POST",
                data : {categoryid:categoryid},
                success : function(data)
                {
                    //alert(data);
                    $("#subcategory").html(data);
                }
            });*/
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
            <h2>IPO</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url();?>includes/admin_home.php">Home</a>
                </li>
                <li>
                    <a>Forms</a>
                </li>
                <li class="active">
                    <strong>IPO</strong>
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
                        <form method="post" class="form-horizontal Register_form" enctype="multipart/form-data" class="parsley-form" id="agent_form">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">IPO Type</label>
                                <div class="col-sm-10" >
                                    <select name="ipo_type" class="form-control validate[required]" id="category">
                                        <option value="">Select Type</option>
                                        <option value="1">Open Issue</option>
                                        <option value="2">New Listing</option>
                                    </select>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Company</label>
                                <div class="col-sm-10">
                                    <input type="text" name="company" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label issue">Open Date</label>
                                <label class="col-sm-2 control-label listing" style="display: none">Listing Date</label>
                                <div class="col-sm-10">
                                    <input type="text" name="open_date" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label issue">Close Date</label>
                                <label class="col-sm-2 control-label listing" style="display: none">Listing Price (<i class="fa fa-inr"></i>)</label>
                                <div class="col-sm-10">
                                    <input type="text" name="close_date" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label issue">Face Value</label>
                                <label class="col-sm-2 control-label listing" style="display: none">Issue Price (<i class="fa fa-inr"></i>)</label>
                                <div class="col-sm-10">
                                    <input type="text" name="face_value" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label issue">Price Brand</label>
                                <label class="col-sm-2 control-label listing" style="display: none">LTP (<i class="fa fa-inr"></i>)</label>
                                <div class="col-sm-10">
                                    <input type="text" name="price_brand" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label issue">Issue Size</label>
                                <label class="col-sm-2 control-label listing" style="display: none">Chg (%)</label>
                                <div class="col-sm-10">
                                    <input type="text" name="issue_size" class="form-control">
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
                <h2 class="text-center" style="color: red">Open Issue Table</h2>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>IPO Type</th>
                                <th>Company</th>
                                <th>Open Date</th>
                                <th>Close Date</th>
                                <th>Face Value</th>
                                <th>Price Brand</th>
                                <th>Issue Size</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $sql_cmp = $conn->query("select * from ipo where ipo_type='1' order by id desc limit 0,10");
                                $count=1;
                                while($data_cmp=mysqli_fetch_array($sql_cmp))
                                {
                            ?>
                                <tr class="gradeX">
                                    <td><?php echo $count; ?></td>
                                    <td>Open Issue</td>
                                    <td><?php echo $data_cmp['company']; ?></td>
                                    <td><?php echo $data_cmp['open_date']; ?></td>
                                    <td><?php echo $data_cmp['close_date']; ?></td>
                                    <td><?php echo $data_cmp['face_value']; ?></td>
                                    <td><?php echo $data_cmp['price_brand']; ?></td>
                                    <td><?php echo $data_cmp['issue_size']; ?></td>
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
                <h2 class="text-center" style="color: red">New Listing Table</h2>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>IPO Type</th>
                                <th>Company</th>
                                <th>Listing Date</th>
                                <th>Listing Price (<i class="fa fa-inr"></i>)</th>
                                <th>Issue Price (<i class="fa fa-inr"></i>)</th>
                                <th>LTP (<i class="fa fa-inr"></i>)</th>
                                <th>Chg (%)</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $sql_cmp = $conn->query("select * from ipo where ipo_type='2' order by id desc limit 0,10");
                                $count=1;
                                while($data_cmp=mysqli_fetch_array($sql_cmp))
                                {
                            ?>
                                <tr class="gradeX">
                                    <td><?php echo $count; ?></td>
                                    <td>New Listing</td>
                                    <td><?php echo $data_cmp['company']; ?></td>
                                    <td><?php echo $data_cmp['open_date']; ?></td>
                                    <td><?php echo $data_cmp['close_date']; ?></td>
                                    <td><?php echo $data_cmp['face_value']; ?></td>
                                    <td><?php echo $data_cmp['price_brand']; ?></td>
                                    <td><?php echo $data_cmp['issue_size']; ?></td>
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