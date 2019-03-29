<?php include('../includes/header.php');?>
<?php 
error_reporting(0);
if(isset($_POST['addnews_events']))
{

    $user_id = $_REQUEST['user_id'];
    $phone = $_REQUEST['phone'];
    $name = $_REQUEST['name'];
    $product_id = $_REQUEST['product_id'];
    $sub_product_id = $_REQUEST['sub_product_id'];
    $required_amount = $_REQUEST['required_amount'];
    $state_id = $_REQUEST['state_id'];
    $city_id = $_REQUEST['city_id'];

    $start_date = date("Y-m-d H:i:s");

    if(mysqli_query($conn, "INSERT INTO `refer_earn` (`name`, `phone`, `user_id`, `product_id`, `sub_product_id`, `required_loan`, `state_id`, `city_id`, `created_at`) VALUES ('$name', '$phone', '$user_id', '$product_id', '$sub_product_id', '$required_amount', '$state_id', '$city_id', '$start_date')"))
    {
        echo "<script language='javascript'>alert('Successfully Submited !');window.location ='refer-and-earn.php';</script>";
    }
}
?>
<style type="text/css">
    .btn-reject {
        color: #fff;
        background: red;
        border: 1px solid red;
    }
</style>
<script src="<?= base_url();?>assets/js/jquery-3.1.1.min.js"></script>
<script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
<script language="javascript"> 
    //pop up script
    $(document).ready(function(e){
        // Get Subcategory By Category ID
        $("#category").change(function(){
            
            var categoryid = $("#category").val();
            if(categoryid==4)
            {
                $('.req_amount').show();
                $('.required_amount').attr('required','required');
            }
            else
            {
                $('.req_amount').hide();
                $('.required_amount').removeAttr('required','required');   
            }
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

        // Get City By State ID
        $("#state").change(function(){
            
            var stateid = $("#state").val();
            //alert(categoryid);
            $.ajax({
                url : "<?= base_url();?>ajaxPages/getCity.php",
                type : "POST",
                data : {stateid:stateid},
                success : function(data)
                {
                    //alert(data);
                    $("#city").html(data);
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
            <h2>Refer and Earn</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url();?>includes/admin_home.php">Home</a>
                </li>
                <li>
                    <a>Forms</a>
                </li>
                <li class="active">
                    <strong>Refer and Earn</strong>
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
                            <input type="hidden" name="user_id" value="<?= $_SESSION['user'];?>" class="form-control">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Mobile No.</label>
                                <div class="col-sm-10">
                                    <input type="tel" name="phone" class="form-control" required>
                                </div>
                            </div>  


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Product</label>
                                <div class="col-sm-10">
                                    <select id="category" class="form-control" name="product_id" required>
                                        <option value="">Select Category</option>
                                        <?php 
                                            $sql_cmp = $conn->query("SELECT * from courses order by id asc");
                                            while($data_cmp=mysqli_fetch_array($sql_cmp))
                                            {
                                        ?>
                                            <option value="<?= $data_cmp['id'];?>"><?= $data_cmp['name'];?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Sub Product</label>
                                <div class="col-sm-10">
                                    <select id="subcategory" name="sub_product_id" class="form-control" required>
                                        <option value="">Select SubCategory</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">State</label>
                                <div class="col-sm-10">
                                    <select id="state" class="form-control" name="state_id" required>
                                        <option value="">Select State</option>
                                        <?php 
                                            $sql_cmp = $conn->query("SELECT * from states order by id asc");
                                            while($data_cmp=mysqli_fetch_array($sql_cmp))
                                            {
                                        ?>
                                            <option value="<?= $data_cmp['id'];?>"><?= $data_cmp['name'];?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">City</label>
                                <div class="col-sm-10">
                                    <select id="city" name="city_id" class="form-control" required>
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group req_amount" style="display: none">
                                <label class="col-sm-2 control-label">Required Loan Amount</label>
                                <div class="col-sm-10">
                                    <input type="number" name="required_amount" class="form-control required_amount">
                                </div>
                            </div>  
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
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Product</th>
                                <th>Sub Product</th>
                                <th>Required loan Amount</th>
                                <th>Approved loan Amount</th>
                                <th>Login Bank</th>
                                <th>Login Date</th>
                                <th>Created Date</th>
                                <th>Approval</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $sql_cmp = $conn->query("select refer_earn.*, courses.name as product, course1.name as sub_product from refer_earn left join courses on courses.id = refer_earn.product_id left join course1 on course1.id = refer_earn.sub_product_id where refer_earn.user_id = ".$_SESSION['user']." order by refer_earn.id desc");
                                $count=1;
                                while($data_cmp=mysqli_fetch_array($sql_cmp))
                                {
                            ?>
                                <tr class="gradeX">
                                    <td><?php echo $count; ?></td>
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
                                        <button type="button" class="btn btn-reject btn-xs">
                                            Reject
                                        </button>
                                        <?php
                                            }
                                            elseif($data_cmp['status']==3)
                                            {
                                        ?>
                                        <button type="button" class="btn btn-info btn-xs">
                                            Login
                                        </button>
                                        <?php
                                            }
                                            elseif($data_cmp['status']==4)
                                            {
                                        ?>
                                        <button type="button" class="btn btn-primary btn-xs">
                                            Inprocess
                                        </button>
                                        <?php
                                            }
                                            elseif($data_cmp['status']==5)
                                            {
                                        ?>
                                        <button type="button" class="btn btn-danger btn-xs">
                                            File Pending
                                        </button>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                        <button class="btn btn-warning btn-xs">Waiting</button>
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
    <div class="footer">
        <div>
            <strong>Copyright</strong> &copy; 2017 Designed by <a href="http://dexusmedia.com/" target="_blank">Sumiksha Services</a>
        </div>
    </div>
<?php include('../includes/footer.php');?>