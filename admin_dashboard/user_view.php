<?php include('../includes/header.php');?>
<?php 
error_reporting(0);
$id=$_REQUEST['id'];
$sql1=$conn->query("select login.*, user_roles.role_id from login left join user_roles on user_roles.user_id = login.id where login.id='$id'");
//$sql1=$conn->query("select * from rules where id=$id");
$data1=mysqli_fetch_array($sql1);
$course_id=$data1['sub_product_id'];
$pd_id=$data1['product_id'];

if(isset($_POST['addrules']))
{
    
    $name = $_REQUEST['name'];
    $course_id = $_REQUEST['course_id'];
    $amazon_link = $_REQUEST['amazon_link'];
       
    if(mysqli_query($conn, "UPDATE `business_enquiry` SET `name` = '$name', `metatitle` = '$metatitle', `amazon_link` = '$amazon_link', `course_id` = '$course_id', `description` = '$description' WHERE `id` = $id;"));
    {
        echo "<script language='javascript'>alert('Successfully Updated !');window.location = 'business_lead_view.php';</script>";
    }
}

?>
<style type="text/css">
    .check_box{
        zoom: 2.0!important;
        display: inline-block!important;
        margin: 4px 0px 8px!important;
        vertical-align: middle;
    }
    .pdr{
        padding-right: 0;
    }
    .pdl{
        padding-left: 0
    }
    .health_income span{
        margin-right: 30px;
    }
</style>
<script src="<?= base_url();?>assets/js/jquery-3.1.1.min.js"></script>
<script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>

<style>
    .form-group .control-label:after {
        content: "*";
        color: red;
    }
    .form-cont{
        margin-top: 15px;
    }
    input[type=checkbox], input[type=radio]{
        margin-bottom: 17px;
    }
</style>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Add Form</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?= base_url();?>includes/admin_home">Home</a>
                </li>
                <li>
                    <a>Forms</a>
                </li>
                <li class="active">
                    <strong>View Form</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center"><?= $data1['name'];?></h1>
                <div class="ibox float-e-margins">
                    <a href="user_mutual_funds.php?id=<?php echo $data1['id'];?>" class="btn btn-success">
                        Mutual Funds
                    </a>
                    <div class="ibox-content">

                        <form method="post" class="form-horizontal" enctype="multipart/form-data" class="parsley-form" id="agent_form">
                            
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Full Name</label>
                                <input name="full_name" value="<?= $data1['name'];?>" type="text" class="form-control" readonly/>
                            </div>
                        </div>                             
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>User Designation</label>
                                <?php
                                    if($data1['role_id']==3)
                                    { 
                                ?>
                                <input name="email_id" value="Channel Partner" type="text" class="form-control" readonly/>
                                <?php
                                    }
                                    elseif($data1['role_id']==4)
                                    { 
                                ?>
                                <input name="email_id" value="Franchise Partner" type="text" class="form-control" readonly/>
                                <?php
                                    }
                                    else
                                    { 
                                ?>
                                <input name="email_id" value="Employee" type="text" class="form-control" readonly/>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>                         
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Email ID.</label>
                                <input name="mobile_no" value="<?= $data1['username'];?>" type="text" class="form-control" readonly/>
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Mobile No.</label>
                                <input name="phone" value="<?= $data1['phone'];?>" type="text" class="form-control" readonly/>
                            </div>
                        </div>                         
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Pincode</label>
                                <input name="phone" value="<?= $data1['pincode'];?>" type="text" class="form-control" readonly/>
                            </div>
                        </div>                          
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>DOB</label>
                                <input name="phone" value="<?= $data1['dob'];?>" type="text" class="form-control" readonly/>
                            </div>
                        </div>                         
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Ref Code</label>
                                <input name="phone" value="<?= $data1['ref_code'];?>" type="text" class="form-control" readonly/>
                            </div>
                        </div>                         
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Age</label>
                                <input name="phone" value="<?= $data1['age'];?>" type="text" class="form-control" readonly/>
                            </div>
                        </div>    
                        <?php
                            if($data1['role_id']!=5)
                            { 
                        ?>                      
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Unique_id</label>
                                <input name="phone" value="<?= $data1['unique_id'];?>" type="text" class="form-control" readonly/>
                            </div>
                        </div>                         
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Pan Card</label>
                                <input name="phone" value="<?= $data1['pan_card'];?>" type="text" class="form-control" readonly/>
                            </div>
                        </div>                         
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Aadhar Card</label>
                                <input name="phone" value="<?= $data1['aadhar_card'];?>" type="text" class="form-control" readonly/>
                            </div>
                        </div>                             
                        
                        <div class="col-md-4">
                            <div class="form-cont" style="margin-bottom: 40px;">
                                <label>Payment Receipt <span style="color: red">*</span></label><br>
                                <?php
                                    $pan_card = $data1['payment_receipt'];
                                    $pan_card = explode(".",$pan_card);
                                    if($pan_card[1]=="pdf")
                                    {
                                ?>
                                <a href="<?= base_url();?>admin_dashboard/uploads/receipt/<?= $data1['payment_receipt'];?>" target="_blank">VIEW PDF</a>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                <img src="<?= base_url();?>admin_dashboard/uploads/receipt/<?= $data1['payment_receipt'];?>" class="img-responsive">
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Cancel Cheque <span style="color: red">*</span></label><br>
                                <?php
                                    $pan_card = $data1['cancel_cheque'];
                                    $pan_card = explode(".",$pan_card);
                                    if($pan_card[1]=="pdf")
                                    {
                                ?>
                                <a href="<?= base_url();?>admin_dashboard/uploads/cancel_cheque/<?= $data1['cancel_cheque'];?>" target="_blank">VIEW PDF</a>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                <img src="<?= base_url();?>admin_dashboard/uploads/cancel_cheque/<?= $data1['cancel_cheque'];?>" class="img-responsive">
                                <?php
                                    }
                                ?>
                            </div>
                        </div>                         
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Pan Card Image <span style="color: red">*</span></label><br>
                                <?php
                                    $pan_card = $data1['pan_card_img'];
                                    $pan_card = explode(".",$pan_card);
                                    if($pan_card[1]=="pdf")
                                    {
                                ?>
                                <a href="<?= base_url();?>admin_dashboard/uploads/pan_card_img/<?= $data1['pan_card_img'];?>" target="_blank">VIEW PDF</a>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                <img src="<?= base_url();?>admin_dashboard/uploads/pan_card_img/<?= $data1['pan_card_img'];?>" class="img-responsive">
                                <?php
                                    }
                                ?>
                            </div>
                        </div>                         
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Aadhar Card Image <span style="color: red">*</span></label><br>
                                <?php
                                    $pan_card = $data1['aadhar_card_img'];
                                    $pan_card = explode(".",$pan_card);
                                    if($pan_card[1]=="pdf")
                                    {
                                ?>
                                <a href="<?= base_url();?>admin_dashboard/uploads/aadhar_card_img/<?= $data1['aadhar_card_img'];?>" target="_blank">VIEW PDF</a>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                <img src="<?= base_url();?>admin_dashboard/uploads/aadhar_card_img/<?= $data1['aadhar_card_img'];?>" class="img-responsive">
                                <?php
                                    }
                                ?>
                            </div>
                        </div>                        
                        
                        <?php
                            }
                        ?>
                            <div class="hr-line-dashed"></div>
                            <div class="col-md-12">
                                <div class="form-cont">
                                    <input type="submit" value="Save" name="addrules" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
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
    <!-- Mainly scripts -->
<?php include('../includes/footer_scripts.php');?>