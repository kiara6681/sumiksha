<?php include('../includes/header.php');?>
<link rel="stylesheet" type="text/css" href="https://dexusmedia.com/css/fresco.css" media="screen">
<script type="text/javascript" src="https://dexusmedia.com/js/fresco.js" async=""></script>
<?php 
function get_file_extension($value)
{
    return substr(strrchr($value, '.'), 1);
}
error_reporting(0);
$id=$_REQUEST['id'];
$sql1=$conn->query("select business_enquiry.*, courses.name as product_name, course1.name as sub_product_name from business_enquiry left join courses on courses.id = business_enquiry.product_id left join course1 on course1.id = business_enquiry.sub_product_id where business_enquiry.id=$id");
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
    // Upload PDF
    if($_POST['upload_pdf'])
    {
        $structure = "uploads/PDF/";
        
        if(!file_exists($structure))
        {
            mkdir($structure, 0777, true);
        }
        
        $p_image1 = '';
        
        if ($_FILES['p_image1']['type'] != "image/gif" && $_FILES['p_image1']['type'] != "image/jpeg" 
        && $_FILES['p_image1']['type'] != "image/jpg" && $_FILES['p_image1']['type'] != "image/png" && $_FILES['p_image1']['type'] != "application/pdf") 
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
            echo $p_image1 = $filename.'.'.$ext;
        }    

        $user_id = $_REQUEST['user_id'];
        $date=date("Y:m:d H:i:s");

        if(mysqli_query($conn, "UPDATE `business_enquiry` SET `upload_pdf` = '$p_image1', `created_at` = '$date' WHERE `id` = $user_id;"))
        {
            //echo "<script language='javascript'>alert('Successfully Updated !');window.location = 'business_lead_view.php?id=".$id.";</script>";
            $succMSG = "Successfully Uploaded";      
        }
        else{
            $errorMSG = "Not Uploaded";
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
    .table-style th{
        padding: 0px;
    }    
    .table-style td{
        padding: 5px 20px;
    }
    img{
        width: 200px;
        height: 100px;
    }
</style>
<script src="<?= base_url();?>assets/js/jquery-3.1.1.min.js"></script>
<script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
<script language="javascript"> 
    //pop up script
    $(document).ready(function(e){
        var maritial_status = "<?= $data1['maritial_status']?>";
        $("input[name='maritial_status'][value='"+maritial_status+"']").prop("checked", true);        
        var current_account = "<?= $data1['current_account']?>";
        $("input[name='current_account'][value='"+current_account+"']").prop("checked", true);        
        var house_status = "<?= $data1['house_status']?>";
        $("input[name='house_status'][value='"+house_status+"']").prop("checked", true);        
        var occupation = "<?= $data1['occupation']?>";
        $("#occupation option[value='"+occupation+"']").prop("selected", true);        
        var salary_type = "<?= $data1['salary_type']?>";
        $("#salary_type option[value='"+salary_type+"']").prop("selected", true);        
        var type_land = "<?= $data1['type_land']?>";
        $("#type_land option[value='"+type_land+"']").prop("selected", true);        
        var registered_authority = "<?= $data1['registered_authority']?>";
        $("#registered_authority option[value='"+registered_authority+"']").prop("selected", true);        
        var loan_type = "<?= $data1['loan_type']?>";
        $("#loan_type option[value='"+loan_type+"']").prop("selected", true);

        var travel_check = "<?= $data1['travel_check']?>";
        $("input[name='travel_check'][value='"+travel_check+"']").prop("checked", true);
        var travel_check1 = "<?= $data1['travel_check1']?>";
        $("input[name='travel_check1'][value='"+travel_check1+"']").prop("checked", true);
        var travel_check2 = "<?= $data1['travel_check2']?>";
        $("input[name='travel_check2'][value='"+travel_check2+"']").prop("checked", true);
        var travel_check3 = "<?= $data1['travel_check3']?>";
        $("input[name='travel_check3'][value='"+travel_check3+"']").prop("checked", true);

        var self_age = "<?= $data1['self_age']?>";
        $("#self_age option[value='"+self_age+"']").prop("selected", true);
        var spouse_age = "<?= $data1['spouse_age']?>";
        $("#spouse_age option[value='"+spouse_age+"']").prop("selected", true);
        var son_age = "<?= $data1['son_age']?>";
        $("#son_age option[value='"+son_age+"']").prop("selected", true);
        var daughter_age = "<?= $data1['daughter_age']?>";
        $("#daughter_age option[value='"+daughter_age+"']").prop("selected", true);

        var select_income = "<?= $data1['select_income']?>";
        $("input[name='select_income'][value='"+select_income+"']").prop("checked", true);

        var medical = "<?= $data1['medical']?>";
        $("input[name='medical'][value='"+medical+"']").prop("checked", true);
        
        if(medical==1){
            $(".medical_yes").show();
        }
        else{
            $(".medical_yes").hide();
        }

        var self_asthma = "<?= $data1['self_asthma']?>";
        $("input[name='self_asthma'][value='"+self_asthma+"']").prop("checked", true);

        var spouse_asthma = "<?= $data1['spouse_asthma']?>";
        $("input[name='spouse_asthma'][value='"+spouse_asthma+"']").prop("checked", true);

        var self_diabetes = "<?= $data1['self_diabetes']?>";
        $("input[name='self_diabetes'][value='"+self_diabetes+"']").prop("checked", true);

        var spouse_diabetes = "<?= $data1['spouse_diabetes']?>";
        $("input[name='spouse_diabetes'][value='"+spouse_diabetes+"']").prop("checked", true);

        var self_heart = "<?= $data1['self_heart']?>";
        $("input[name='self_heart'][value='"+self_heart+"']").prop("checked", true);

        var spouse_heart = "<?= $data1['spouse_heart']?>";
        $("input[name='spouse_heart'][value='"+spouse_heart+"']").prop("checked", true);

        var self_hyper = "<?= $data1['self_hyper']?>";
        $("input[name='self_hyper'][value='"+self_hyper+"']").prop("checked", true);

        var spouse_hyper = "<?= $data1['spouse_hyper']?>";
        $("input[name='spouse_hyper'][value='"+spouse_hyper+"']").prop("checked", true);

        var self_thyroid = "<?= $data1['self_thyroid']?>";
        $("input[name='self_thyroid'][value='"+self_thyroid+"']").prop("checked", true);
        
        var spouse_thyroid = "<?= $data1['spouse_thyroid']?>";
        $("input[name='spouse_thyroid'][value='"+spouse_thyroid+"']").prop("checked", true);

        //alert(occupation);
        if(occupation!="Salaried"){
            $(".salaried").hide();
            $(".business").show();
            $(".salaried_req").removeClass("validate[required]");
            $(".val_salaried_req").removeClass("validate[required,custom[onlyNumberSp]]");
            $(".business_req").addClass("validate[required]");
            $(".income_per_month").show();
            $(".income_per_month_req").addClass("validate[required]");
        }
        else{
            $(".salaried").show();
            $(".business").hide();
            $(".salaried_req").addClass("validate[required]");
            $(".val_salaried_req").addClass("validate[required,custom[onlyNumberSp]]");
            $(".business_req").removeClass("validate[required]");
            $(".income_per_month").hide();
            $(".income_per_month_req").removeClass("validate[required]");
        }

        if(salary_type=="Cash"){
            $(".salarry_slip").hide();
            $(".salarry_slip_req").removeClass("validate[required]");
        }
        else{
            $(".salarry_slip").show();
            $(".salarry_slip_req").addClass("validate[required]");
        }
        if(salary_type=="In account"){
            $(".in_aaccount").show();
            $(".in_aaccount_req").addClass("validate[required]");
        }
        else{
            $(".in_aaccount").hide();
            $(".in_aaccount_req").removeClass("validate[required]");
        }
    });
</script>
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
    <div id="uploadPDF" class="modal fade animated shake" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title"><i class="fa fa-upload"></i> Upload PDF</h4>

                </div>

                <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="modal-body">

                        <input type="file" name="p_image1">
                        <input type="hidden" name="user_id" value="<?= $id;?>">

                    </div>
                    <div class="modal-footer">
                        
                        <div class="col-sm-12">
                            <input class="btn btn-danger" type="submit" name="upload_pdf" value="Submit" style="margin-top: 10px;">
                        </div>
                        
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center"><?= $data1['full_name'];?></h1>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <a href="#uploadPDF" data-toggle="modal" class="btn btn-success">
                            <i class="fa fa-upload"></i> Upload PDF
                        </a>
                        <?php
                            if(!empty($data1['upload_pdf']))
                            {
                        ?>
                        <a href="<?= base_url();?>admin_dashboard/uploads/PDF/<?= $data1['upload_pdf'];?>" data-toggle="modal" class="btn btn-primary" target="_blank">
                            <i class="fa fa-eye"></i> View PDF
                        </a>
                        <?php
                            }
                        ?>
                    </div>
                <div class="ibox-content">
                <br>
                <?php
                    if (isset($succMSG) ) 
                    {
                ?>
                    <div class="form-group">
                        <div class="alert alert-success">
                            <i class="fa fa-check"></i> <?php echo $succMSG; ?>
                        </div>
                    </div>
                <?php
                    }
                    if (isset($errorMSG) ) 
                    {
                ?>
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <i class="fa fa-info"></i> <?php echo $errorMSG; ?>
                        </div>
                    </div>
                <?php
                    }
                ?>
                    <form method="post" class="form-horizontal" enctype="multipart/form-data" class="parsley-form" id="agent_form">
                       <div class="col-md-4">
                            <div class="form-cont">
                                <label>Product Name</label>
                                <input name="product_name" value="<?= $data1['product_name'];?>" type="text" class="form-control" readonly>
                            </div>
                        </div>                             
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Sub Product Name</label>
                                <input name="sub_product_name" value="<?= $data1['sub_product_name'];?>" type="text" class="form-control" readonly/>
                            </div>
                        </div>                             
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Full Name</label>
                                <input name="full_name" value="<?= $data1['full_name'];?>" type="text" class="form-control" readonly/>
                            </div>
                        </div>                             
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Email ID.</label>
                                <input name="email_id" value="<?= $data1['email_id'];?>" type="text" class="form-control" readonly/>
                            </div>
                        </div>                         
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Mobile No.</label>
                                <input name="mobile_no" value="<?= $data1['mobile_no'];?>" type="text" class="form-control" readonly/>
                            </div>
                        </div>                                                     
                        <?php
                            if($course_id!=18 && $course_id!=19 && $course_id!=26 && $course_id!=27 && $course_id!=28 && $course_id!=37 && $course_id!=42 && $pd_id!=9){
                        ?>                   
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Whatsapp No.</label>
                                <input name="whatsapp_no" value="<?= $data1['whatsapp_no'];?>"
                                 type="text" class="validate[custom[phone],maxSize[12],minSize[10]] form-control" readonly/>
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Marital Status <span style="color: red">*</span></label>
                                <br>
                                <input name="maritial_status" value="Married" type="radio" class="validate[required]"/> Married 
                                <input name="maritial_status" value="Single" type="radio" class="validate[required]" /> Single 
                                <input name="maritial_status" value="Divorced" type="radio" class="validate[required]"/> Divorced 
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Select Occupation <span style="color: red">*</span></label>
                                <select class="form-control validate[required]" name="occupation" id="occupation" disabled="">
                                    <option value="">-----Select-----</option>
                                    <?php
                                        if($course_id!=3)
                                        {
                                            if( $course_id!=36)
                                            {
                                    ?>
                                    <option value="Salaried">Salaried</option>
                                    <?php
                                            }
                                        }
                                        if($course_id!=2)
                                        {
                                            if($course_id!=36)
                                            {
                                    ?>
                                    <option value="Self Employed">Self Employed</option>
                                        <?php
                                            }
                                        ?>
                                    <option value="Businessman">Businessman</option>
                                    <?php
                                        }
                                    ?>
                                 </select>
                            </div>
                        </div>     
                        <?php
                            if($course_id!=36)
                            {
                        ?>
                        <div class="col-md-4 salaried">
                            <div class="form-cont">
                                <label>Salary Type <span style="color: red">*</span></label>
                                <select class="form-control salaried_req" name="salary_type" id="salary_type" disabled="">
                                    <option value="">-----Select-----</option>
                                    <?php
                                        if($pd_id!=8)
                                        {
                                    ?>
                                    <option value="Cash">Cash</option>
                                    <option value="Cheque">Cheque</option>
                                    <?php
                                        }
                                    ?>
                                    <option value="In account">In account</option>
                                </select>
                            </div>
                        </div>                         
                        
                        <div class="col-md-4 salaried">
                            <div class="form-cont">
                                <label>Company Name <span style="color: red">*</span></label>
                                <input name="company_name" value="<?= $data1['company_name'];?>" type="text" class="form-control salaried_req" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 in_aaccount" style="display: none">
                            <div class="form-cont">
                                <label>Salary Account(Bank Name) <span style="color: red">*</span></label>
                                <input name="salary_account" value="<?= $data1['salary_account'];?>" type="text" class="form-control in_aaccount_req" readonly>
                            </div>
                        </div>   
                        <?php
                            if($course_id==3)
                            {
                        ?>                      
                        <div class="col-md-4 income_per_month" style="display: none">
                            <div class="form-cont">
                                <label>Latest ITR <span style="color: red">*</span></label>
                                <input name="latest_itr" value="<?= $data1['latest_itr'];?>" type="text" class="form-control income_per_month_req" readonly>
                            </div>
                        </div>   
                        <?php
                            }
                            else
                            {
                        ?>   
                        <div class="col-md-4 income_per_month" style="display: none">
                            <div class="form-cont">
                                <label>Income Per Month <span style="color: red">*</span></label>
                                <input name="income_per_month" value="<?= $data1['income_per_month'];?>" type="text" class="form-control income_per_month_req" readonly>
                            </div>
                        </div>
                        <?php
                            }
                        ?>               
                        <div class="col-md-4 salaried">
                            <div class="form-cont">
                                <label>Gross Salary <span style="color: red">*</span></label>
                                <input name="gross_salary" value="<?= $data1['gross_salary'];?>" type="text" class="form-control val_salaried_req" readonly>
                            </div>
                        </div>   
                        
                        <div class="col-md-4 salaried">
                            <div class="form-cont">
                                <label>Net Salary <span style="color: red">*</span></label>
                                <input name="net_salary" value="<?= $data1['net_salary'];?>" type="text" class="form-control val_salaried_req" readonly>
                            </div>
                        </div> 
                        <?php
                            }
                        ?>
                        <div class="col-md-4 business">
                            <div class="form-cont">
                                <label>Name of Business <span style="color: red">*</span></label>
                                <input name="business_name" value="<?= $data1['business_name'];?>" type="text" class="form-control business_req" readonly>
                            </div>
                        </div> 
                        
                        <div class="col-md-4 business">
                            <div class="form-cont">
                                <label>Registration Year of Business <span style="color: red">*</span></label>
                                <input name="business_year" value="<?= $data1['business_year'];?>" type="text" class="form-control business_req" readonly>
                            </div>
                        </div>
                        
                        <div class="col-md-4 business">
                            <div class="form-cont">
                                <label>Business Vintage <span style="color: red">*</span></label>
                                <input name="business_vintage" value="<?= $data1['business_vintage'];?>" type="text" class="form-control business_req" readonly>
                            </div>
                        </div> 
                        
                        <div class="col-md-4 business">
                            <div class="form-cont">
                                <label>Have in Current Account <span style="color: red">*</span></label>
                                <br>
                                <input name="current_account" value="1" type="radio" class="validate[required]"> Yes
                                <input name="current_account" value="0" type="radio" class="validate[required]"> No
                            </div>
                        </div>  
                        <?php
                            if($course_id==1 || $course_id==11 || $course_id==36)
                            {
                        ?>
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Type of Land <span style="color: red">*</span></label>
                                <select class="form-control property" name="type_land" id="type_land" disabled="">
                                    <option value="">-----Select-----</option>
                                    <option value="Residental">Residental</option>
                                    <option value="Commercial">Commercial</option>
                                    <option value="Agricultural">Agricultural</option>
                                </select>
                            </div>
                        </div>     
                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Size of Land <span style="color: red">*</span></label>
                                <input name="size_land" value="<?= $data1['size_land'];?>" type="text" class="form-control property" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Registered Authority <span style="color: red">*</span></label>
                                <select class="form-control property" name="registered_authority" id="registered_authority" disabled="">
                                    <option value="">-----Select-----</option>
                                    <option value="Muncipal Corporation">Muncipal Corporation</option>
                                    <option value="Gram Panchayat">Gram Panchayat</option>
                                    <option value="Society">Society</option>
                                    <option value="Others">Others</option>
                                 </select>
                            </div>
                        </div>    
                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Loan Type <span style="color: red">*</span></label>
                                <select class="form-control property" name="loan_type" id="loan_type" disabled="">
                                    <option value="">-----Select-----</option>
                                    <option value="Fresh Mortgage Loan">Fresh Mortgage Loan</option>
                                    <option value="Balance Transfer">Balance Transfer</option>
                                    <option value="BT + Top Up">BT + Top Up</option>
                                    <option value="House Purchase">House Purchase</option>
                                    <option value="Construction">Construction</option>
                                    <option value="Plot Purchase">Plot Purchase</option>
                                    <option value="Home Loan Transfer">Home Loan Transfer</option>
                                 </select>
                            </div>
                        </div>   
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Property Purchase Cost <span style="color: red">*</span></label>
                                <input name="property_purchase_cost" value="<?= $data1['property_purchase_cost'];?>" type="text" class="form-control property" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Property Address <span style="color: red">*</span></label>
                                <input name="property_address" value="<?= $data1['property_address'];?>" type="text" class="form-control property">
                            </div>
                        </div>   
                        <?php
                            }
                            if($pd_id!=8)
                            {
                        ?>          
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Loan Amount <span style="color: red">*</span></label>
                                <input name="loan_amount" value="<?= $data1['loan_amount'];?>" type="text" class="form-control loan_amount validate[required]" readonly>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>House Status <span style="color: red">*</span></label><br>
                                <input name="house_status" value="Parental" class="validate[required]" type="radio"/> Parental
                                <input name="house_status" value="Rented" class="validate[required]" type="radio"/> Rented
                                <input name="house_status" value="Owned" class="validate[required]" type="radio"/> Owned
                            </div>
                        </div>                        
                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Residence Address <span style="color: red">*</span></label>
                                <input name="residence_address" value="<?= $data1['residence_address'];?>" type="text" class="form-control validate[required]">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>City <span style="color: red">*</span></label>
                                <input name="city" value="<?= $data1['city'];?>" type="text" class="form-control validate[required]" readonly>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Pincode <span style="color: red">*</span></label>
                                <input name="pincode" value="<?= $data1['pincode'];?>" type="text" class="validate[required,,custom[onlyNumberSp],maxSize[6],minSize[6] form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Pan Card No. <span style="color: red">*</span></label>
                                <input name="pan_card_no" value="<?= $data1['pan_card_no'];?>" type="text" class="validate[required,maxSize[10],minSize[10] form-control" style="text-transform:uppercase"  readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Aadhar Card No. <span style="color: red">*</span></label>
                                <input name="aadhar_card_no" value="<?= $data1['aadhar_card_no'];?>" type="text" class="form-control validate[required]" readonly>
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Pan Card <span style="color: red">*</span></label><br>
                                <?php
                                    $pan_card = $data1['pan_card_img'];
                                    $pan_card = explode(",",$pan_card);
                                    
                                    foreach ($pan_card as $key => $value) 
                                    {
                                        # code...
                                        $extension = get_file_extension($value);
                                        if ($extension == "pdf" || $extension == "docx") 
                                        {
                                ?>
                                    <a class="col-md-6" style="margin-top: 45px;" href="<?= base_url();?>admin_dashboard/uploads/pan_card_img/<?= $value;?>" target="_blank">VIEW PDF</a>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                    <a href="<?= base_url();?>admin_dashboard/uploads/pan_card_img/<?= $value;?>" class="fresco col-md-6" data-fresco-group="example">
                                        <img src="<?= base_url();?>admin_dashboard/uploads/pan_card_img/<?= $value;?>" class="img-responsive" style="width: 200px;height: 100px;">
                                    </a>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Aadhar Card <span style="color: red">*</span></label><br>
                                <?php
                                    $pan_card = $data1['aadhar_card_img'];
                                    $pan_card = explode(",",$pan_card);
                                    
                                    foreach ($pan_card as $key => $value) 
                                    {
                                        # code...
                                        $extension = get_file_extension($value);
                                        if ($extension == "pdf" || $extension == "docx") 
                                        {
                                ?>
                                    <a class="col-md-6" style="margin-top: 45px;" href="<?= base_url();?>admin_dashboard/uploads/aadhar_card_img/<?= $value;?>" target="_blank">VIEW PDF</a>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                    <a href="<?= base_url();?>admin_dashboard/uploads/aadhar_card_img/<?= $value;?>" class="fresco col-md-6" data-fresco-group="example">
                                        <img src="<?= base_url();?>admin_dashboard/uploads/aadhar_card_img/<?= $value;?>" class="img-responsive" style="width: 200px;height: 100px;">
                                    </a>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Bank Statement(Last 3 Months) <span style="color: red">*</span></label><br>
                                <?php
                                    $pan_card = $data1['bank_statement_img'];
                                    $pan_card = explode(",",$pan_card);
                                    
                                    foreach ($pan_card as $key => $value) 
                                    {
                                        # code...
                                        $extension = get_file_extension($value);
                                        if ($extension == "pdf" || $extension == "docx") 
                                        {
                                ?>
                                    <a class="col-md-6" style="margin-top: 45px;" class="col-md-6" href="<?= base_url();?>admin_dashboard/uploads/bank_statement_img/<?= $value;?>" target="_blank">VIEW PDF</a>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                    <a href="<?= base_url();?>admin_dashboard/uploads/bank_statement_img/<?= $value;?>" class="fresco col-md-6" data-fresco-group="example">
                                        <img src="<?= base_url();?>admin_dashboard/uploads/bank_statement_img/<?= $value;?>" class="img-responsive" style="width: 200px;height: 100px;">
                                    </a>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                            if($course_id==1 || $course_id==11 || $course_id==36)
                            {
                        ?>
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Property Site Map <span style="color: red">*</span></label><br>
                                <?php
                                    $pan_card = $data1['property_site_map_img'];
                                    $pan_card = explode(",",$pan_card);
                                    
                                    foreach ($pan_card as $key => $value) 
                                    {
                                        # code...
                                        $extension = get_file_extension($value);
                                        if ($extension == "pdf" || $extension == "docx") 
                                        {
                                ?>
                                    <a class="col-md-6" style="margin-top: 45px;" href="<?= base_url();?>admin_dashboard/uploads/property_site_map_img/<?= $value;?>" target="_blank">VIEW PDF</a>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                    <a href="<?= base_url();?>admin_dashboard/uploads/property_site_map_img/<?= $value;?>" class="fresco col-md-6" data-fresco-group="example">
                                        <img src="<?= base_url();?>admin_dashboard/uploads/property_site_map_img/<?= $value;?>" class="img-responsive" style="width: 200px;height: 100px;">
                                    </a>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>   
                        <?php
                            }
                        ?>                     
                        <div class="col-md-4 salarry_slip" style="display: none;">
                            <div class="form-cont">
                                <label>Salary Slip(Last 3 Months) <span style="color: red">*</span></label><br>
                                <?php
                                    $pan_card = $data1['salary_slip_img'];
                                    $pan_card = explode(",",$pan_card);
                                    
                                    foreach ($pan_card as $key => $value) 
                                    {
                                        # code...
                                        $extension = get_file_extension($value);
                                        if ($extension == "pdf" || $extension == "docx") 
                                        {
                                ?>
                                    <a class="col-md-6" style="margin-top: 45px;" href="<?= base_url();?>admin_dashboard/uploads/salary_slip_img/<?= $value;?>" target="_blank">VIEW PDF</a>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                    <a href="<?= base_url();?>admin_dashboard/uploads/salary_slip_img/<?= $value;?>" class="fresco col-md-6" data-fresco-group="example">
                                        <img src="<?= base_url();?>admin_dashboard/uploads/salary_slip_img/<?= $value;?>" class="img-responsive" style="width: 200px;height: 100px;">
                                    </a>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>                        
                        <div class="col-md-4 income_per_month" style="display: none;">
                            <div class="form-cont">
                                <label>Latest ITR (Last Three Years) <span style="color: red">*</span></label><br>
                                <?php
                                    $pan_card = $data1['latest_itr'];
                                    $pan_card = explode(",",$pan_card);
                                    
                                    foreach ($pan_card as $key => $value) 
                                    {
                                        # code...
                                        $extension = get_file_extension($value);
                                        if ($extension == "pdf" || $extension == "docx") 
                                        {
                                ?>
                                    <a class="col-md-6" style="margin-top: 45px;" href="<?= base_url();?>admin_dashboard/uploads/latest_itr/<?= $value;?>" target="_blank">VIEW PDF</a>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                    <a href="<?= base_url();?>admin_dashboard/uploads/latest_itr/<?= $value;?>" class="fresco col-md-6" data-fresco-group="example">
                                        <img src="<?= base_url();?>admin_dashboard/uploads/latest_itr/<?= $value;?>" class="img-responsive" style="width: 200px;height: 100px;">
                                    </a>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <?php 
                            }
                            if($course_id==18){
                        ?>

                        <!-- Health Insurance -->
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>City <span style="color: red">*</span></label>
                                <input name="city" value="<?= $data1['city'];?>" type="text" class="form-control validate[required]" readonly>
                            </div>
                        </div>
                        <div class="col-md-1 pdr">
                            <div class="form-cont">
                                <label>&nbsp;</label><br>
                                <input name="travel_check" type="checkbox" value="Self" class="check_box validate[required]"/> <span>Self</span>
                            </div>
                        </div>
                        <div class="col-md-1 pdl" style="margin-top: 8px;">
                            <div class="form-cont">
                                <label>&nbsp;</label><br>
                                <select class="property" name="self_age" id="self_age" disabled="">
                                    <option value="">Age</option>
                                    <option value="18">18 yr</option>
                                    <option value="19">19 yr</option><option value="20">20 yr</option><option value="21">21 yr</option><option value="22">22 yr</option><option value="23">23 yr</option><option value="24">24 yr</option><option value="25">25 yr</option><option value="26">26 yr</option><option value="27">27 yr</option><option value="28">28 yr</option><option value="29">29 yr</option><option value="30">30 yr</option><option value="31">31 yr</option><option value="32">32 yr</option><option value="33">33 yr</option><option value="34">34 yr</option><option value="35">35 yr</option><option value="36">36 yr</option><option value="37">37 yr</option><option value="38">38 yr</option><option value="39">39 yr</option><option value="40">40 yr</option><option value="41">41 yr</option><option value="42">42 yr</option><option value="43">43 yr</option><option value="44">44 yr</option><option value="45">45 yr</option><option value="46">46 yr</option><option value="47">47 yr</option><option value="48">48 yr</option><option value="49">49 yr</option><option value="50">50 yr</option><option value="51">51 yr</option><option value="52">52 yr</option><option value="53">53 yr</option><option value="54">54 yr</option><option value="55">55 yr</option><option value="56">56 yr</option><option value="57">57 yr</option><option value="58">58 yr</option><option value="59">59 yr</option><option value="60">60 yr</option><option value="61">61 yr</option><option value="62">62 yr</option><option value="63">63 yr</option><option value="64">64 yr</option><option value="65">65 yr</option><option value="66">66 yr</option><option value="67">67 yr</option><option value="68">68 yr</option><option value="69">69 yr</option><option value="70">70 yr</option><option value="71">71 yr</option><option value="72">72 yr</option><option value="73">73 yr</option><option value="74">74 yr</option><option value="75">75 yr</option><option value="76">76 yr</option><option value="77">77 yr</option><option value="78">78 yr</option><option value="79">79 yr</option><option value="80">80 yr</option><option value="81">81 yr</option><option value="82">82 yr</option><option value="83">83 yr</option><option value="84">84 yr</option><option value="85">85 yr</option><option value="86">86 yr</option><option value="87">87 yr</option><option value="88">88 yr</option><option value="89">89 yr</option><option value="90">90 yr</option><option value="91">91 yr</option><option value="92">92 yr</option><option value="93">93 yr</option><option value="94">94 yr</option><option value="95">95 yr</option><option value="96">96 yr</option><option value="97">97 yr</option><option value="98">98 yr</option><option value="99">99 yr</option><option value="100">100 yr</option>
                                 </select>
                            </div>
                        </div>                         
                        <div class="col-md-1 pdr pdl">
                            <div class="form-cont">
                                <label>&nbsp;</label><br>
                                <input name="travel_check1" type="checkbox" value="Spouse" class="check_box validate[required]"/> <span>Spouse</span>
                            </div>
                        </div>
                        <div class="col-md-1 pdr" style="margin-top: 8px;">
                            <div class="form-cont">
                                <label>&nbsp;</label><br>
                                <select class="property" name="spouse_age" id="spouse_age" disabled="">
                                    <option value="">Age</option>
                                    <option value="18">18 yr</option>
                                    <option value="19">19 yr</option><option value="20">20 yr</option><option value="21">21 yr</option><option value="22">22 yr</option><option value="23">23 yr</option><option value="24">24 yr</option><option value="25">25 yr</option><option value="26">26 yr</option><option value="27">27 yr</option><option value="28">28 yr</option><option value="29">29 yr</option><option value="30">30 yr</option><option value="31">31 yr</option><option value="32">32 yr</option><option value="33">33 yr</option><option value="34">34 yr</option><option value="35">35 yr</option><option value="36">36 yr</option><option value="37">37 yr</option><option value="38">38 yr</option><option value="39">39 yr</option><option value="40">40 yr</option><option value="41">41 yr</option><option value="42">42 yr</option><option value="43">43 yr</option><option value="44">44 yr</option><option value="45">45 yr</option><option value="46">46 yr</option><option value="47">47 yr</option><option value="48">48 yr</option><option value="49">49 yr</option><option value="50">50 yr</option><option value="51">51 yr</option><option value="52">52 yr</option><option value="53">53 yr</option><option value="54">54 yr</option><option value="55">55 yr</option><option value="56">56 yr</option><option value="57">57 yr</option><option value="58">58 yr</option><option value="59">59 yr</option><option value="60">60 yr</option><option value="61">61 yr</option><option value="62">62 yr</option><option value="63">63 yr</option><option value="64">64 yr</option><option value="65">65 yr</option><option value="66">66 yr</option><option value="67">67 yr</option><option value="68">68 yr</option><option value="69">69 yr</option><option value="70">70 yr</option><option value="71">71 yr</option><option value="72">72 yr</option><option value="73">73 yr</option><option value="74">74 yr</option><option value="75">75 yr</option><option value="76">76 yr</option><option value="77">77 yr</option><option value="78">78 yr</option><option value="79">79 yr</option><option value="80">80 yr</option><option value="81">81 yr</option><option value="82">82 yr</option><option value="83">83 yr</option><option value="84">84 yr</option><option value="85">85 yr</option><option value="86">86 yr</option><option value="87">87 yr</option><option value="88">88 yr</option><option value="89">89 yr</option><option value="90">90 yr</option><option value="91">91 yr</option><option value="92">92 yr</option><option value="93">93 yr</option><option value="94">94 yr</option><option value="95">95 yr</option><option value="96">96 yr</option><option value="97">97 yr</option><option value="98">98 yr</option><option value="99">99 yr</option><option value="100">100 yr</option>
                                 </select>
                            </div>
                        </div>                        
                        <div class="col-md-1 pdr">
                            <div class="form-cont">
                                <label>&nbsp;</label><br>
                                <input name="travel_check2" type="checkbox" value="Son" class="check_box validate[required]"/> <span>Son</span>
                            </div>
                        </div>
                        <div class="col-md-1 pdr" style="margin-top: 8px;">
                            <div class="form-cont">
                                <label>&nbsp;</label><br>
                                <select class="property" name="son_age" id="son_age" disabled="">
                                    <option value="">Age</option>
                                    <option value="18">18 yr</option>
                                    <option value="19">19 yr</option><option value="20">20 yr</option><option value="21">21 yr</option><option value="22">22 yr</option><option value="23">23 yr</option><option value="24">24 yr</option><option value="25">25 yr</option><option value="26">26 yr</option><option value="27">27 yr</option><option value="28">28 yr</option><option value="29">29 yr</option><option value="30">30 yr</option><option value="31">31 yr</option><option value="32">32 yr</option><option value="33">33 yr</option><option value="34">34 yr</option><option value="35">35 yr</option><option value="36">36 yr</option><option value="37">37 yr</option><option value="38">38 yr</option><option value="39">39 yr</option><option value="40">40 yr</option><option value="41">41 yr</option><option value="42">42 yr</option><option value="43">43 yr</option><option value="44">44 yr</option><option value="45">45 yr</option><option value="46">46 yr</option><option value="47">47 yr</option><option value="48">48 yr</option><option value="49">49 yr</option><option value="50">50 yr</option><option value="51">51 yr</option><option value="52">52 yr</option><option value="53">53 yr</option><option value="54">54 yr</option><option value="55">55 yr</option><option value="56">56 yr</option><option value="57">57 yr</option><option value="58">58 yr</option><option value="59">59 yr</option><option value="60">60 yr</option><option value="61">61 yr</option><option value="62">62 yr</option><option value="63">63 yr</option><option value="64">64 yr</option><option value="65">65 yr</option><option value="66">66 yr</option><option value="67">67 yr</option><option value="68">68 yr</option><option value="69">69 yr</option><option value="70">70 yr</option><option value="71">71 yr</option><option value="72">72 yr</option><option value="73">73 yr</option><option value="74">74 yr</option><option value="75">75 yr</option><option value="76">76 yr</option><option value="77">77 yr</option><option value="78">78 yr</option><option value="79">79 yr</option><option value="80">80 yr</option><option value="81">81 yr</option><option value="82">82 yr</option><option value="83">83 yr</option><option value="84">84 yr</option><option value="85">85 yr</option><option value="86">86 yr</option><option value="87">87 yr</option><option value="88">88 yr</option><option value="89">89 yr</option><option value="90">90 yr</option><option value="91">91 yr</option><option value="92">92 yr</option><option value="93">93 yr</option><option value="94">94 yr</option><option value="95">95 yr</option><option value="96">96 yr</option><option value="97">97 yr</option><option value="98">98 yr</option><option value="99">99 yr</option><option value="100">100 yr</option>
                                 </select>
                            </div>
                        </div>                        
                        <div class="col-md-2 pdr">
                            <div class="form-cont">
                                <label>&nbsp;</label><br>
                                <input name="travel_check3" type="checkbox" value="Daughter" class="check_box validate[required]"/> <span>Daughter</span>
                            </div>
                        </div>
                        <div class="col-md-1 pdl" style="margin-top: 8px;">
                            <div class="form-cont">
                                <label>&nbsp;</label><br>
                                <select class=" property" name="daughter_age" id="daughter_age" disabled="">
                                    <option value="">Age</option>
                                    <option value="18">18 yr</option>
                                    <option value="19">19 yr</option><option value="20">20 yr</option><option value="21">21 yr</option><option value="22">22 yr</option><option value="23">23 yr</option><option value="24">24 yr</option><option value="25">25 yr</option><option value="26">26 yr</option><option value="27">27 yr</option><option value="28">28 yr</option><option value="29">29 yr</option><option value="30">30 yr</option><option value="31">31 yr</option><option value="32">32 yr</option><option value="33">33 yr</option><option value="34">34 yr</option><option value="35">35 yr</option><option value="36">36 yr</option><option value="37">37 yr</option><option value="38">38 yr</option><option value="39">39 yr</option><option value="40">40 yr</option><option value="41">41 yr</option><option value="42">42 yr</option><option value="43">43 yr</option><option value="44">44 yr</option><option value="45">45 yr</option><option value="46">46 yr</option><option value="47">47 yr</option><option value="48">48 yr</option><option value="49">49 yr</option><option value="50">50 yr</option><option value="51">51 yr</option><option value="52">52 yr</option><option value="53">53 yr</option><option value="54">54 yr</option><option value="55">55 yr</option><option value="56">56 yr</option><option value="57">57 yr</option><option value="58">58 yr</option><option value="59">59 yr</option><option value="60">60 yr</option><option value="61">61 yr</option><option value="62">62 yr</option><option value="63">63 yr</option><option value="64">64 yr</option><option value="65">65 yr</option><option value="66">66 yr</option><option value="67">67 yr</option><option value="68">68 yr</option><option value="69">69 yr</option><option value="70">70 yr</option><option value="71">71 yr</option><option value="72">72 yr</option><option value="73">73 yr</option><option value="74">74 yr</option><option value="75">75 yr</option><option value="76">76 yr</option><option value="77">77 yr</option><option value="78">78 yr</option><option value="79">79 yr</option><option value="80">80 yr</option><option value="81">81 yr</option><option value="82">82 yr</option><option value="83">83 yr</option><option value="84">84 yr</option><option value="85">85 yr</option><option value="86">86 yr</option><option value="87">87 yr</option><option value="88">88 yr</option><option value="89">89 yr</option><option value="90">90 yr</option><option value="91">91 yr</option><option value="92">92 yr</option><option value="93">93 yr</option><option value="94">94 yr</option><option value="95">95 yr</option><option value="96">96 yr</option><option value="97">97 yr</option><option value="98">98 yr</option><option value="99">99 yr</option><option value="100">100 yr</option>
                                 </select>
                            </div>
                        </div>  
                        <div class="col-md-9">
                            <div class="form-cont health_income">
                                <label>Select Income <span style="color: red">*</span></label><br>
                                <input name="select_income" value="Upto 3 Lacs" type="radio" class="validate[required]"/> <span>Upto 3 Lacs</span>
                                <input name="select_income" value="3 to 5 Lacs" type="radio" class="validate[required]"/> <span>3 to 5 Lacs</span>
                                <input name="select_income" value="5 to 7 Lacs" type="radio" class="validate[required]"/> <span>5 to 7 Lacs</span>
                                <input name="select_income" value="7 to 10 Lacs" type="radio" class="validate[required]"/> <span>7 to 10 Lacs</span>
                                <input name="select_income" value="10 to 15 Lacs" type="radio" class="validate[required]"/> <span>10 to 15 Lacs</span>
                                <input name="select_income" value="15 Lacs+" type="radio" class="validate[required]"/> <span>15 Lacs+</span>
                            </div>
                        </div>                        
                        <div class="col-md-3">
                            <div class="form-cont">
                                <label>Any Medical Conditions <span style="color: red">*</span></label><br>
                                <input name="medical" value="1" type="radio" class="medical validate[required]"/> Yes
                                <input name="medical" value="0" type="radio" class="medical validate[required]"/> No
                            </div>
                        </div>
                        <div class="col-md-4 medical_yes" style="display: none;">
                            <p><b>Match Family Member to Disease Suffered</b></p>
                            <div class="form-cont" style="border: 1px solid #d2c9c9;">
                                <table class="table-style">
                                    <th></th>
                                    <th>Self</th>
                                    <th>Spouse</th>
                                    <tr>
                                        <td>Asthma</td>
                                        <td><input name="self_asthma" type="checkbox" value="Asthma" class="check_box"></td>
                                        <td><input name="spouse_asthma" type="checkbox" value="Asthma" class="check_box"></td>
                                    </tr>
                                    <tr>
                                        <td>Diabetes</td>
                                        <td><input name="self_diabetes" type="checkbox" value="Diabetes" class="check_box"></td>
                                        <td><input name="spouse_diabetes" type="checkbox" value="Diabetes" class="check_box"></td>
                                    </tr>
                                    <tr>
                                        <td>Heart Aliments</td>
                                        <td><input name="self_heart" type="checkbox" value="Heart Aliments" class="check_box"></td>
                                        <td><input name="spouse_heart" type="checkbox" value="Heart Aliments" class="check_box"></td>
                                    </tr>
                                    <tr>
                                        <td>Hypertension</td>
                                        <td><input name="self_hyper" type="checkbox" value="Hypertension" class="check_box"></td>
                                        <td><input name="spouse_hyper" type="checkbox" value="Hypertension" class="check_box"></td>
                                    </tr>
                                    <tr>
                                        <td>Thyroid</td>
                                        <td><input name="self_thyroid" type="checkbox" value="Thyroid" class="check_box"></td>
                                        <td><input name="spouse_thyroid" type="checkbox" value="Thyroid" class="check_box"></td>
                                    </tr>
                                </table>
                            </div>
                        </div> 
                        <!-- End Health Insurance -->
                        <?php
                            }
                            if($course_id==19){
                        ?>
                        <!-- Terms Insurance -->
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Date of Birth <span style="color: red">*</span></label>
                                <input name="term_dob" value="<?= $data1['term_dob'];?>" id="datepicker" type="text" class="form-control validate[required]" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Smoker <span style="color: red">*</span></label>
                                <input name="smoker" value="1" type="radio" class="validate[required]"/> Yes
                                <input name="smoker" value="0" type="radio" class="validate[required]" checked="" /> No
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Annual Income <span style="color: red">*</span></label>
                                <input name="annual_income" value="<?= $data1['annual_income'];?>" type="text" class="form-control validate[required]" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Occupation <span style="color: red">*</span></label>
                                <select class="form-control validate[required]" name="terms_occupation" disabled="">
                                    <option value="">-----Select-----</option>
                                    <option value="House Purchase">House Purchase</option>
                                    <option value="Construction">Construction</option>
                                    <option value="Plot Purchase">Plot Purchase</option>
                                    <option value="Home Loan Transfer">Home Loan Transfer</option>
                                 </select>
                            </div>
                        </div>
                        <!-- End Terms Insurance -->
                        <?php
                            }
                            if($course_id==26){
                        ?>
                        <!-- Travel Insurance -->
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Going With <span style="color: red">*</span></label>
                                <input name="going_with" value="Group" type="radio" class="validate[required]"/> Group
                                <input name="going_with" value="Family" type="radio" class="validate[required]" /> Family
                                <input name="going_with" value="Others" type="radio" class="validate[required]" /> Others
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Destination <span style="color: red">*</span></label>
                                <input name="destination" value="<?= $data1['destination'];?>" type="text" class="form-control validate[required]" readonly>
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Date of Travelling <span style="color: red">*</span></label>
                                <input name="travelling" value="<?= $data1['travelling'];?>" type="text" class="form-control validate[required]" placeholder="dd/mm/yyyy" readonly>
                            </div>
                        </div>
                        <!-- End Travel Insurance -->
                        <?php
                            }
                            if($course_id==27){
                        ?>
                        <!-- Corporate Insurance -->
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Company Name <span style="color: red">*</span></label>
                                <input name="corporate_company_name" value="<?= $data1['corporate_company_name'];?>" type="text" class="form-control validate[required]" readonly>
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>City <span style="color: red">*</span></label>
                                <input name="city" value="<?= $data1['city'];?>" type="text" class="form-control validate[required]" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Insurance Policy <span style="color: red">*</span></label>
                                <select name="insurance_policy" id="healthsmeOption" class="form-control validate[required]" disabled="">
                                    <option value="">Select your option</option>
                                    <option value="Group Health Insurance">Group Health Insurance</option>
                                    <option value="Group Personal Accident">Group Personal Accident</option>
                                    <option value="Workman Compensation">Workmen Compensation</option>
                                    <option value="Marine">Marine Insurance</option>
                                    <option value="Fire &amp; Burglary Insurance">Fire &amp; Burglary Insurance</option>
                                    <option value="Shop Owners Insurance">Shop Owners Insurance</option>                                                
                                    <option value="Office Package Policy">Office Package Policy</option>
                                    <option value="Construction All Risk">Construction All Risk</option>
                                    <option value="Erection All Risk">Erection All Risk</option>                                                
                                    <option value="Plant Machinery">Contractor's Plant &amp; Machinery</option>                                                
                                    <option value="Group Term Life">Group Term Life</option>
                                </select>
                            </div>
                        </div> 
                        <!-- End Corporate Insurance -->
                        <?php
                            }
                            if($course_id==28){
                        ?>
                        <!-- Home Insurance -->

                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Property Type <span style="color: red">*</span></label>
                                <select name="home_property_type" id="healthsmeOption" class="form-control validate[required]" disabled="">
                                    <option value="">Select</option>
                                    <option value="Flat">Flat</option>
                                    <option value="Individual House">Individual House</option>
                                </select>
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Value of Building <span style="color: red">*</span></label>
                                <input name="value_building" value="<?= $data1['value_building'];?>" type="text" class="form-control validate[required]" readonly>
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Value of Content <span style="color: red">*</span></label>
                                <input name="value_content" value="<?= $data1['value_content'];?>" type="text" class="form-control validate[required]" readonly>
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Age of Property <span style="color: red">*</span></label>
                                <input name="age_property" value="<?= $data1['age_property'];?>" type="text" class="form-control validate[required]" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Ownership <span style="color: red">*</span></label>
                                <input name="ownership" type="radio" class="validate[required]"> Own
                                <input name="ownership" type="radio" class="validate[required]"> Rented
                           </div>
                        </div> 
                        <!-- End Home Insurance -->
                        <?php
                            }
                            if($course_id==37){
                        ?>
                        <!-- Motor Insurance -->
                        <div class="col-md-5">
                            <div class="form-cont">
                                <label>Vechile <span style="color: red">*</span></label>
                                <input name="vechile" value="Two Wheeler" type="radio" class="validate[required]"/> Two Wheeler
                                <input name="vechile" value="Four Wheeler" type="radio" class="validate[required]" /> Four Wheeler
                                <input name="vechile" value="Commercial" type="radio" class="validate[required]" /> Commercial
                           </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-cont">
                                <label>RC Upload <span style="color: red">*</span></label><br>
                                <?php
                                    $pan_card = $data1['rc_upload_img'];
                                    $pan_card = explode(",",$pan_card);
                                    
                                    foreach ($pan_card as $key => $value) 
                                    {
                                        # code...
                                        $extension = get_file_extension($value);
                                        if ($extension == "pdf" || $extension == "docx") 
                                        {
                                ?>
                                    <a class="col-md-6" style="margin-top: 45px;" href="<?= base_url();?>admin_dashboard/uploads/rc_upload_img/<?= $value;?>" target="_blank">VIEW PDF</a>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                    <a href="<?= base_url();?>admin_dashboard/uploads/rc_upload_img/<?= $value;?>" class="fresco col-md-6" data-fresco-group="example">
                                        <img src="<?= base_url();?>admin_dashboard/uploads/rc_upload_img/<?= $value;?>" class="img-responsive" style="width: 200px;height: 100px;">
                                    </a>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Current Policy Upload <span style="color: red">*</span></label><br>
                                <?php
                                    $pan_card = $data1['current_policy_img'];
                                    $pan_card = explode(",",$pan_card);
                                    
                                    foreach ($pan_card as $key => $value) 
                                    {
                                        # code...
                                        $extension = get_file_extension($value);
                                        if ($extension == "pdf" || $extension == "docx") 
                                        {
                                ?>
                                    <a class="col-md-6" style="margin-top: 45px;" href="<?= base_url();?>admin_dashboard/uploads/current_policy_img/<?= $value;?>" target="_blank">VIEW PDF</a>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                    <a href="<?= base_url();?>admin_dashboard/uploads/current_policy_img/<?= $value;?>" class="fresco col-md-6" data-fresco-group="example">
                                        <img src="<?= base_url();?>admin_dashboard/uploads/current_policy_img/<?= $value;?>" class="img-responsive" style="width: 200px;height: 100px;">
                                    </a>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>                        
                        <!-- End Motor Insurance -->
                        <?php
                            }
                            if($course_id==42){
                        ?>
                        <!-- CARD to CARD -->

                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Having Card of Number <span style="color: red">*</span></label>
                                <input name="card_number" value="<?= $data1['card_number'];?>" type="text" class="form-control validate[required]" placeholder="eg:2" readonly>
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Total Credit Limit <span style="color: red">*</span></label>
                                <input name="credit_limit" value="<?= $data1['credit_limit'];?>" type="text" class="form-control validate[required,custom[onlyNumberSp]]" readonly>
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Available Credit Limit <span style="color: red">*</span></label>
                                <input name="available_credit_limit" value="<?= $data1['available_credit_limit'];?>" type="text" class="form-control validate[required,custom[onlyNumberSp]]" readonly>
                            </div>
                        </div>                         
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Bank Name <span style="color: red">*</span></label>
                                <input name="bank_name" value="<?= $data1['bank_name'];?>" type="text" class="form-control validate[required]" readonly>
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Apply For <span style="color: red">*</span></label>
                                <input name="apply_for_bank" value="<?= $data1['apply_for_bank'];?>" type="text" class="form-control validate[required]" placeholder="eg:HDFC Bank" readonly>
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Latest Card Statement <span style="color: red">*</span></label><br>
                                <?php
                                    $pan_card = $data1['latest_card_statement_img'];
                                    $pan_card = explode(",",$pan_card);
                                    
                                    foreach ($pan_card as $key => $value) 
                                    {
                                        # code...
                                        $extension = get_file_extension($value);
                                        if ($extension == "pdf" || $extension == "docx") 
                                        {
                                ?>
                                    <a class="col-md-6" style="margin-top: 45px;" href="<?= base_url();?>admin_dashboard/uploads/latest_card_statement_img/<?= $value;?>" target="_blank">VIEW PDF</a>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                    <a href="<?= base_url();?>admin_dashboard/uploads/latest_card_statement_img/<?= $value;?>" class="fresco col-md-6" data-fresco-group="example">
                                        <img src="<?= base_url();?>admin_dashboard/uploads/latest_card_statement_img/<?= $value;?>" class="img-responsive" style="width: 200px;height: 100px;">
                                    </a>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>                        
                        <!-- End Motor Insurance -->
                        <?php
                            }
                        ?> 
                        <!-- <div class="col-md-12">
                            <div class="form-cont">
                                <button class="btn btn-danger" type="button" name="register" style="margin-top: 10px;">Cancel</button>
                            </div>
                        </div> -->
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