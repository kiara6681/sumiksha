<?php include('header.php');?>

<?php
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $actual_link1 = explode("/", $actual_link);

    $real_url = $actual_link1[0].'//'.$actual_link1[2];
    if($real_url=='http://localhost' || $real_url=='http://dexus.in')
    {
        $id=$actual_link1[5];
    }
    else
    {
        $id=$actual_link1[4];
    }
    //$id=$_REQUEST['metatitle'];
    $amit1=$conn->query("select * from courses where metatitle='$id'");
    $sql=mysqli_fetch_array($amit1);
    $pd_id=$sql['id'];

    if(empty($pd_id))
    {
        $amit=$conn->query("select * from course1 where metatitle='$id'");
        $sql1=mysqli_fetch_array($amit);
        $course_id=$sql1['id'];
        $pd_id=$sql1['course_id'];
        //exit;
    }

    if(!empty($_SESSION['user']))
    {
        $user_id=$conn->query("select * from login where id='".$_SESSION['user']."'");
        $users=mysqli_fetch_array($user_id);
    }
?>

<!-- Business Register Query-->
<?php
    error_reporting(0);
    if($_REQUEST['business_register'])
    {

        // pan card img
        $structure = "admin_dashboard/uploads/pan_card_img/";
        
        if(!file_exists($structure))
        {
            mkdir($structure, 0777, true);
        }
        
        $pan_card_img = '';
        
        if ($_FILES['pan_card_img']['type'] != "image/gif" && $_FILES['pan_card_img']['type'] != "image/jpeg" 
        && $_FILES['pan_card_img']['type'] != "image/jpg" && $_FILES['pan_card_img']['type'] != "image/png" && $_FILES['pan_card_img']['type'] != "application/pdf") 
        { 
            $err = "This file type is not allowed";
        }
        else 
        {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $filename = substr( str_shuffle( $chars ), 0, 10 );
              
            $ext = pathinfo($_FILES['pan_card_img']['name'], PATHINFO_EXTENSION);
            
            $path=$structure."/".$filename.'.'.$ext;
            
            move_uploaded_file($_FILES['pan_card_img']['tmp_name'], $path );            
            $pan_card_img = $filename.'.'.$ext;
        }    

        // aadhar card img
        $structure = "admin_dashboard/uploads/aadhar_card_img/";
        
        if(!file_exists($structure))
        {
            mkdir($structure, 0777, true);
        }
        
        $aadhar_card_img = '';
        
        if ($_FILES['aadhar_card_img']['type'] != "image/gif" && $_FILES['aadhar_card_img']['type'] != "image/jpeg" 
        && $_FILES['aadhar_card_img']['type'] != "image/jpg" && $_FILES['aadhar_card_img']['type'] != "image/png" && $_FILES['aadhar_card_img']['type'] != "application/pdf") 
        { 
            $err = "This file type is not allowed";
        }
        else 
        {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $filename = substr( str_shuffle( $chars ), 0, 10 );
              
            $ext = pathinfo($_FILES['aadhar_card_img']['name'], PATHINFO_EXTENSION);
            
            $path=$structure."/".$filename.'.'.$ext;
            
            move_uploaded_file($_FILES['aadhar_card_img']['tmp_name'], $path );            
            $aadhar_card_img = $filename.'.'.$ext;
        }   
        
        // bank statement img
        $structure = "admin_dashboard/uploads/bank_statement_img/";
        
        if(!file_exists($structure))
        {
            mkdir($structure, 0777, true);
        }
            
        $bank_statement_img = '';
        
        if ($_FILES['bank_statement_img']['type'] != "image/gif" && $_FILES['bank_statement_img']['type'] != "image/jpeg" 
        && $_FILES['bank_statement_img']['type'] != "image/jpg" && $_FILES['bank_statement_img']['type'] != "image/png" && $_FILES['bank_statement_img']['type'] != "application/pdf") 
        { 
            $err = "This file type is not allowed";
        }
        else 
        {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $filename = substr( str_shuffle( $chars ), 0, 10 );
              
            $ext = pathinfo($_FILES['bank_statement_img']['name'], PATHINFO_EXTENSION);
            
            $path=$structure."/".$filename.'.'.$ext;
            
            move_uploaded_file($_FILES['bank_statement_img']['tmp_name'], $path );            
            $bank_statement_img = $filename.'.'.$ext;
        }   
        
        // property site map img
        $structure = "admin_dashboard/uploads/property_site_map_img/";
        
        if(!file_exists($structure))
        {
            mkdir($structure, 0777, true);
        }
                  
        $property_site_map_img = '';
        
        if ($_FILES['property_site_map_img']['type'] != "image/gif" && $_FILES['property_site_map_img']['type'] != "image/jpeg" 
        && $_FILES['property_site_map_img']['type'] != "image/jpg" && $_FILES['property_site_map_img']['type'] != "image/png" && $_FILES['property_site_map_img']['type'] != "application/pdf") 
        { 
            $err = "This file type is not allowed";
        }
        else 
        {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $filename = substr( str_shuffle( $chars ), 0, 10 );
              
            $ext = pathinfo($_FILES['property_site_map_img']['name'], PATHINFO_EXTENSION);
            
            $path=$structure."/".$filename.'.'.$ext;
            
            move_uploaded_file($_FILES['property_site_map_img']['tmp_name'], $path );            
            $property_site_map_img = $filename.'.'.$ext;
        }    

        // salary slip img
        $structure = "admin_dashboard/uploads/salary_slip_img/";
        
        if(!file_exists($structure))
        {
            mkdir($structure, 0777, true);
        }
        
        $salary_slip_img = '';
        
        if ($_FILES['salary_slip_img']['type'] != "image/gif" && $_FILES['salary_slip_img']['type'] != "image/jpeg" 
        && $_FILES['salary_slip_img']['type'] != "image/jpg" && $_FILES['salary_slip_img']['type'] != "image/png" && $_FILES['salary_slip_img']['type'] != "application/pdf") 
        { 
            $err = "This file type is not allowed";
        }
        else 
        {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $filename = substr( str_shuffle( $chars ), 0, 10 );
              
            $ext = pathinfo($_FILES['salary_slip_img']['name'], PATHINFO_EXTENSION);
            
            $path=$structure."/".$filename.'.'.$ext;
            
            move_uploaded_file($_FILES['salary_slip_img']['tmp_name'], $path );            
            $salary_slip_img = $filename.'.'.$ext;
        }

        // latest card statement img
        $structure = "admin_dashboard/uploads/latest_card_statement_img/";
        
        if(!file_exists($structure))
        {
            mkdir($structure, 0777, true);
        }
        
        $latest_card_statement_img = '';
        
        if ($_FILES['latest_card_statement_img']['type'] != "image/gif" && $_FILES['latest_card_statement_img']['type'] != "image/jpeg" 
        && $_FILES['latest_card_statement_img']['type'] != "image/jpg" && $_FILES['latest_card_statement_img']['type'] != "image/png" && $_FILES['latest_card_statement_img']['type'] != "application/pdf") 
        { 
            $err = "This file type is not allowed";
        }
        else 
        {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $filename = substr( str_shuffle( $chars ), 0, 10 );
              
            $ext = pathinfo($_FILES['latest_card_statement_img']['name'], PATHINFO_EXTENSION);
            
            $path=$structure."/".$filename.'.'.$ext;
            
            move_uploaded_file($_FILES['latest_card_statement_img']['tmp_name'], $path );            
            $latest_card_statement_img = $filename.'.'.$ext;
        }

        // rc upload img
        $structure = "admin_dashboard/uploads/rc_upload_img/";
        
        if(!file_exists($structure))
        {
            mkdir($structure, 0777, true);
        }
        
        $rc_upload_img = '';
        
        if ($_FILES['rc_upload_img']['type'] != "image/gif" && $_FILES['rc_upload_img']['type'] != "image/jpeg" 
        && $_FILES['rc_upload_img']['type'] != "image/jpg" && $_FILES['rc_upload_img']['type'] != "image/png" && $_FILES['rc_upload_img']['type'] != "application/pdf") 
        { 
            $err = "This file type is not allowed";
        }
        else 
        {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $filename = substr( str_shuffle( $chars ), 0, 10 );
              
            $ext = pathinfo($_FILES['rc_upload_img']['name'], PATHINFO_EXTENSION);
            
            $path=$structure."/".$filename.'.'.$ext;
            
            move_uploaded_file($_FILES['rc_upload_img']['tmp_name'], $path );            
            $rc_upload_img = $filename.'.'.$ext;
        }

        // current policy img
        $structure = "admin_dashboard/uploads/current_policy_img/";
        
        if(!file_exists($structure))
        {
            mkdir($structure, 0777, true);
        }
        
        $current_policy_img = '';
        
        if ($_FILES['current_policy_img']['type'] != "image/gif" && $_FILES['current_policy_img']['type'] != "image/jpeg" 
        && $_FILES['current_policy_img']['type'] != "image/jpg" && $_FILES['current_policy_img']['type'] != "image/png" && $_FILES['current_policy_img']['type'] != "application/pdf") 
        { 
            $err = "This file type is not allowed";
        }
        else 
        {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $filename = substr( str_shuffle( $chars ), 0, 10 );
              
            $ext = pathinfo($_FILES['current_policy_img']['name'], PATHINFO_EXTENSION);
            
            $path=$structure."/".$filename.'.'.$ext;
            
            move_uploaded_file($_FILES['current_policy_img']['tmp_name'], $path );            
            $current_policy_img = $filename.'.'.$ext;
        }

        // ITR Last three year img
        $structure = "admin_dashboard/uploads/latest_itr/";
        
        if(!file_exists($structure))
        {
            mkdir($structure, 0777, true);
        }
        
        $current_policy_img = '';
        
        if ($_FILES['latest_itr']['type'] != "image/gif" && $_FILES['latest_itr']['type'] != "image/jpeg" 
        && $_FILES['latest_itr']['type'] != "image/jpg" && $_FILES['latest_itr']['type'] != "image/png" && $_FILES['latest_itr']['type'] != "application/pdf") 
        { 
            $err = "This file type is not allowed";
        }
        else 
        {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $filename = substr( str_shuffle( $chars ), 0, 10 );
              
            $ext = pathinfo($_FILES['latest_itr']['name'], PATHINFO_EXTENSION);
            
            $path=$structure."/".$filename.'.'.$ext;
            
            move_uploaded_file($_FILES['latest_itr']['tmp_name'], $path );            
            $latest_itr = $filename.'.'.$ext;
        }

        $user_id=$_REQUEST['user_id'];
        $product_id=$_REQUEST['product_id'];
        $sub_product_id=$_REQUEST['sub_product_id'];
        $full_name=$_REQUEST['full_name'];
        $email_id=$_REQUEST['email_id'];
        $mobile_no=$_REQUEST['mobile_no'];
        $whatsapp_no=$_REQUEST['whatsapp_no'];
        $maritial_status=$_REQUEST['maritial_status'];
        $occupation=$_REQUEST['occupation'];
        $salary_type=$_REQUEST['salary_type'];
        $company_name=$_REQUEST['company_name'];
        $salary_account=$_REQUEST['salary_account'];
        //$latest_itr=$_REQUEST['latest_itr'];
        $income_per_month=$_REQUEST['income_per_month'];
        $gross_salary=$_REQUEST['gross_salary'];
        $net_salary=$_REQUEST['net_salary'];
        $business_name=$_REQUEST['business_name'];
        $business_year=$_REQUEST['business_year'];
        $business_vintage=$_REQUEST['business_vintage'];
        $current_account=$_REQUEST['current_account'];
        $type_land=$_REQUEST['type_land'];
        $size_land=$_REQUEST['size_land'];
        $registered_authority=$_REQUEST['registered_authority'];
        $loan_type=$_REQUEST['loan_type'];
        $property_purchase_cost=$_REQUEST['property_purchase_cost'];
        $property_address=$_REQUEST['property_address'];
        $loan_amount=$_REQUEST['loan_amount'];
        $house_status=$_REQUEST['house_status'];
        $residence_address=$_REQUEST['residence_address'];
        $city=$_REQUEST['city'];
        $pincode=$_REQUEST['pincode'];
        $pan_card_no=$_REQUEST['pan_card_no'];
        $aadhar_card_no=$_REQUEST['aadhar_card_no'];
        //$pan_card_img=$_REQUEST['pan_card_img'];
        //$aadhar_card_img=$_REQUEST['aadhar_card_img'];
        //$bank_statement_img=$_REQUEST['bank_statement_img'];
        //$property_site_map_img=$_REQUEST['property_site_map_img'];
        //$salary_slip_img=$_REQUEST['salary_slip_img'];
        $travel_check=$_REQUEST['travel_check'];
        $self_age=$_REQUEST['self_age'];
        $travel_check1=$_REQUEST['travel_check1'];
        $spouse_age=$_REQUEST['spouse_age'];
        $travel_check2=$_REQUEST['travel_check2'];
        $son_age=$_REQUEST['son_age'];
        $travel_check3=$_REQUEST['travel_check3'];
        $daughter_age=$_REQUEST['daughter_age'];
        $select_income=$_REQUEST['select_income'];
        $medical=$_REQUEST['medical'];
        $self_asthma=$_REQUEST['self_asthma'];
        $spouse_asthma=$_REQUEST['spouse_asthma'];
        $self_diabetes=$_REQUEST['self_diabetes'];
        $spouse_diabetes=$_REQUEST['spouse_diabetes'];
        $self_heart=$_REQUEST['self_heart'];
        $spouse_heart=$_REQUEST['spouse_heart'];
        $self_hyper=$_REQUEST['self_hyper'];
        $spouse_hyper=$_REQUEST['spouse_hyper'];
        $self_thyroid=$_REQUEST['self_thyroid'];
        $spouse_thyroid=$_REQUEST['spouse_thyroid'];
        $term_dob=$_REQUEST['term_dob'];
        $smoker=$_REQUEST['smoker'];
        $annual_income=$_REQUEST['annual_income'];
        $terms_occupation=$_REQUEST['terms_occupation'];
        $going_with=$_REQUEST['going_with'];
        $travelling=$_REQUEST['travelling'];
        $corporate_company_name=$_REQUEST['corporate_company_name'];
        $insurance_policy=$_REQUEST['insurance_policy'];
        $home_property_type=$_REQUEST['home_property_type'];
        $value_building=$_REQUEST['value_building'];
        $value_content=$_REQUEST['value_content'];
        $age_property=$_REQUEST['age_property'];
        $ownership=$_REQUEST['ownership'];
        $vechile=$_REQUEST['vechile'];
        //$rc_upload_img=$_REQUEST['rc_upload_img'];
        //$current_policy_img=$_REQUEST['current_policy_img'];
        $card_number=$_REQUEST['card_number'];
        $credit_limit=$_REQUEST['credit_limit'];
        $available_credit_limit=$_REQUEST['available_credit_limit'];
        $max_card_limit=$_REQUEST['max_card_limit'];
        $bank_name=$_REQUEST['bank_name'];
        $apply_for_bank=$_REQUEST['apply_for_bank'];
        //$latest_card_statement_img=$_REQUEST['latest_card_statement_img'];
        
        $date=date("Y-m-d H:i:s");

        if(mysqli_query($conn, "INSERT INTO `business_enquiry` (`user_id`,`product_id`,`sub_product_id`,`full_name`,`email_id`,`mobile_no`,`whatsapp_no`,`maritial_status`,`occupation`,`salary_type`,`company_name`,`salary_account`,`latest_itr`,`income_per_month`,`gross_salary`,`net_salary`,`business_name`,`business_year`,`business_vintage`,`current_account`,`type_land`,`size_land`,`registered_authority`,`loan_type`,`property_purchase_cost`,`property_address`,`loan_amount`,`house_status`,`residence_address`,`city`,`pincode`,`pan_card_no`,`aadhar_card_no`,`pan_card_img`,`aadhar_card_img`,`bank_statement_img`,`property_site_map_img`,`salary_slip_img`,`travel_check`,`self_age`,`travel_check1`,`spouse_age`,`travel_check2`,`son_age`,`travel_check3`,`daughter_age`,`select_income`,`medical`,`self_asthma`,`spouse_asthma`,`self_diabetes`,`spouse_diabetes`,`self_heart`,`spouse_heart`,`self_hyper`,`spouse_hyper`,`self_thyroid`,`spouse_thyroid`,`term_dob`,`smoker`,`annual_income`,`terms_occupation`,`going_with`,`travelling`,`corporate_company_name`,`insurance_policy`,`home_property_type`,`value_building`,`value_content`,`age_property`,`ownership`,`vechile`,`rc_upload_img`,`current_policy_img`,`card_number`,`credit_limit`,`available_credit_limit`,`max_card_limit`,`bank_name`,`apply_for_bank`,`latest_card_statement_img`,`created_at`) 

            VALUES ('$user_id','$product_id','$sub_product_id','$full_name','$email_id','$mobile_no','$whatsapp_no','$maritial_status','$occupation','$salary_type','$company_name','$salary_account','$latest_itr','$income_per_month','$gross_salary','$net_salary','$business_name','$business_year','$business_vintage','$current_account','$type_land','$size_land','$registered_authority','$loan_type','$property_purchase_cost','$property_address','$loan_amount','$house_status','$residence_address','$city','$pincode','$pan_card_no','$aadhar_card_no','$pan_card_img','$aadhar_card_img','$bank_statement_img','$property_site_map_img','$salary_slip_img','$travel_check','$self_age','$travel_check1','$spouse_age','$travel_check2','$son_age','$travel_check3','$daughter_age','$select_income','$medical','$self_asthma','$spouse_asthma','$self_diabetes','$spouse_diabetes','$self_heart','$spouse_heart','$self_hyper','$spouse_hyper','$self_thyroid','$spouse_thyroid','$term_dob','$smoker','$annual_income','$terms_occupation','$going_with','$travelling','$corporate_company_name','$insurance_policy','$home_property_type','$value_building','$value_content','$age_property','$ownership','$vechile','$rc_upload_img','$current_policy_img','$card_number','$credit_limit','$available_credit_limit','$max_card_limit','$bank_name','$apply_for_bank','$latest_card_statement_img','$date')"))
        {

            $succMSG = "Successfully Submitted";      
        }
        else{
            $errorMSG = "Not Submitted ! Try Again";
        }
    }
?>
<style>
    input[type=checkbox], input[type=radio]{
        margin: 4px 0px 27px;
    }
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
        margin-right: 20px;
    }
    .table-style th{
        padding: 0px;
    }    
    .table-style td{
        padding: 5px 20px;
    }
    .table-style-2 td, th{
        text-align: left;
    }
    td{
        color: #000;
    }
    .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover{
        background: #073394;
        color: #fff;
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $("#occupation").on('change', function(){
            var occupation = $("#occupation").val();
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
        });        
        $("#salary_type").on('change', function(){
            var salary_type = $("#salary_type").val();
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
                $(".salarry_slip").hide();
                $(".salarry_slip_req").removeClass("validate[required]");
            }
        });
        <?php
            if($course_id==1 || $course_id==11 || $course_id==36)
            {
        ?>
            $(".property").addClass("validate[required]");
            $(".property_land").addClass("validate[required,custom[onlyNumberSp]]");
        <?php
            }
            else
            {
        ?>
            $(".property").removeClass("validate[required]");
            $(".property_land").removeClass("validate[required,custom[onlyNumberSp]]");
        <?php
            }
            if($pd_id!=8)
            {
        ?> 
            $(".loan_amount").removeClass("validate[required,custom[onlyNumberSp]]");
        <?php
            }
        ?>
        $(".self_check_box").click(function(){
            if($(this).is(':checked'))
            {
                $(".self_age").show();
            }
            else{
                $(".self_age").hide();
            }
        });        
        $(".spouse_check_box").click(function(){
            if($(this).is(':checked'))
            {
                $(".spouse_age").show();
            }
            else{
                $(".spouse_age").hide();
            }
        });        
        $(".son_check_box").click(function(){
            if($(this).is(':checked'))
            {
                $(".son_age").show();
            }
            else{
                $(".son_age").hide();
            }
        });        
        $(".daughter_check_box").click(function(){
            if($(this).is(':checked'))
            {
                $(".daughter_age").show();
            }
            else{
                $(".daughter_age").hide();
            }
        });
        $(".medical").on('click', function(){
            var medical_val = $(this).val();
            if(medical_val==1){
                $(".medical_yes").show();
            }
            else{
                $(".medical_yes").hide();
            }
        });
    });
</script>
<section class="gredientPattern container-fluid" style="padding-top: 110px;">
    <div class="pageSection row magic-3">
        <?php
            if($pd_id==8 && $course_id!=42)
            {
                $row=$conn->query("select * from course1 where course_id='8'");
                $sql=mysqli_fetch_array($row);
        ?>
        <img src="<?= base_url();?>admin_dashboard/uploads/courses/<?= $sql['image'];?>" class="img-responsive">
        <?php
            }
            else{
        ?>
        <img src="<?= base_url();?>admin_dashboard/uploads/courses/<?= $sql1['image'];?>" class="img-responsive">
        <?php
            }
        ?>
    </div>
 </section>

<section class="section-side-image clearfix amit">

    <div class="container">

        <div class="row">
            
            <div class="col-md-12 col-sm-12 col-xs-12 bmargin"> 
                <?php
                    if (isset($succMSG) ) 
                    {
                ?>
                    <div class="form-group">
                        <br>
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
                        <br>
                        <div class="alert alert-danger">
                            <i class="fa fa-info"></i> <?php echo $errorMSG; ?>
                        </div>
                    </div>
                <?php
                    }
                ?>
                <h3 class="text-left" style="color: #000;font-weight: 600;">
                    <?= $sql1['name'];?>
                </h3> 
                <?php
                    if($course_id==29):
                ?>
                <div class="table-responsive">          
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Scheme Name</th>
                                <th>NAV (<i class="fa fa-inr"></i>)</th>
                                <th>3M</th>
                                <th>6M</th>
                                <th>1 Yr</th>
                                <th>3 Yrs</th>
                                <th>5 Yrs</th>
                                <th>YTD</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql_cmp = $conn->query("select * from mutual_funds order by id desc limit 0,10");
                                $count=1;
                                while($data_cmp=mysqli_fetch_array($sql_cmp))
                                {
                            ?>
                            <tr>
                                <td><?= $data_cmp['scheme_name']; ?></td>
                                <td><?= $data_cmp['nav']; ?></td>
                                <td><?= $data_cmp['3M']; ?></td>
                                <td><?= $data_cmp['6M']; ?></td>
                                <td><?= $data_cmp['1yr']; ?></td>
                                <td><?= $data_cmp['3yrs']; ?></td>
                                <td><?= $data_cmp['5yrs']; ?></td>
                                <td><?= $data_cmp['ytd']; ?></td>
                            </tr>
                            <?php
                                $count++;}
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php
                    elseif($course_id==31):
                ?>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Open Issue</a></li>
                    <li><a data-toggle="tab" href="#menu1">New Listing</a></li>
                </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="table-responsive">          
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Company</th>
                                        <th>Open Date</th>
                                        <th>Close Date</th>
                                        <th>Face Value (<i class="fa fa-inr"></i>)</th>
                                        <th>Price Band (<i class="fa fa-inr"></i>)</th>
                                        <th>Issue Size (<i class="fa fa-inr"></i>)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sql_cmp = $conn->query("select * from ipo where ipo_type='1' order by id desc limit 0,10");
                                        $count=1;
                                        while($data_cmp=mysqli_fetch_array($sql_cmp))
                                        {
                                    ?>
                                    <tr>
                                        <td><?= $data_cmp['company']; ?></td>
                                        <td><?= $data_cmp['open_date']; ?></td>
                                        <td><?= $data_cmp['close_date']; ?></td>
                                        <td><?= $data_cmp['face_value']; ?></td>
                                        <td><?= $data_cmp['price_brand']; ?></td>
                                        <td><?= $data_cmp['issue_size']; ?></td>
                                    </tr>
                                    <?php
                                        $count++;}
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div class="table-responsive">          
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Company</th>
                                        <th>Listing Date</th>
                                        <th>Listing Price (<i class="fa fa-inr"></i>)</th>
                                        <th>Issue Price (<i class="fa fa-inr"></i>)</th>
                                        <th>LTP (<i class="fa fa-inr"></i>)</th>
                                        <th>Chg (%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $sql_cmp = $conn->query("select * from ipo where ipo_type='2' order by id desc limit 0,10");
                                    $count=1;
                                    while($data_cmp=mysqli_fetch_array($sql_cmp))
                                    {
                                ?>
                                    <tr>
                                        <td><?php echo $data_cmp['company']; ?></td>
                                        <td><?php echo $data_cmp['open_date']; ?></td>
                                        <td><?php echo $data_cmp['close_date']; ?></td>
                                        <td><?php echo $data_cmp['face_value']; ?></td>
                                        <td><?php echo $data_cmp['price_brand']; ?></td>
                                        <td><?php echo $data_cmp['issue_size']; ?></td>
                                    </tr>
                                <?php
                                    $count++;}
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
                    else:
                ?>
                <?= $sql1['description'];?>
                <?php
                    endif;
                ?>
            </div>
        </div>

        <div class="row">
            <hr>
            <?php
                if($pd_id!=9)
                {
            ?>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <a href="#myModal4" data-toggle="modal" class="btn darkGreyBtn red-bg-btn back_color" style="color: #fff;">Apply Now</a> 
            </div>
            <?php
                }
                else
                {
            ?>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <a href="#myModal4" data-toggle="modal" class="btn darkGreyBtn red-bg-btn back_color" style="color: #fff;">Get a Call from advisor</a> 
            </div>
            <?php
                }
            ?>
        </div>

    </div>
</section> 
<br>
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Apply Form</h4>
            </div>
            <div class="modal-body">
                <form id="formID" class="job-form" action="" method="post" enctype="multipart/form-data">
                 
                    <input name="user_id" value="<?= $users['id'];?>" type="hidden">
                    <input name="product_id" value="<?= $pd_id;?>" type="hidden">
                    <input name="sub_product_id" value="<?= $course_id;?>" type="hidden">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Full Name <span style="color: red">*</span></label>

                                <input name="full_name" type="text" class="validate[required] form-control"/>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Email Id <span style="color: red">*</span></label>

                                <input name="email_id" type="email" class="validate[required,custom[email]] form-control"/>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Mobile No. <span style="color: red">*</span></label>

                                <input name="mobile_no" type="text" class="validate[required,custom[phone],maxSize[12],minSize[10]] form-control"/>

                            </div>
                        </div>      
                        <?php
                            if($course_id!=18 && $course_id!=19 && $course_id!=26 && $course_id!=27 && $course_id!=28 && $course_id!=37 && $course_id!=42 && $pd_id!=9){
                        ?>                   
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Whatsapp No.</label>
                                <input name="whatsapp_no" type="text" class="validate[custom[phone],maxSize[12],minSize[10]] form-control">
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Marital Status <span style="color: red">*</span></label>
                                <input name="maritial_status" value="Married" type="radio" class="validate[required]"> Married 
                                <input name="maritial_status" value="Single" type="radio" class="validate[required]" > Single 
                                <input name="maritial_status" value="Divorced" type="radio" class="validate[required]"> Divorced 
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Select Occupation <span style="color: red">*</span></label>
                                <select class="form-control validate[required]" name="occupation" id="occupation">
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
                                <select class="form-control salaried_req" name="salary_type" id="salary_type">
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
                                <input name="company_name" type="text" class="form-control salaried_req">
                            </div>
                        </div>
                        <div class="col-md-4 in_aaccount" style="display: none">
                            <div class="form-cont">
                                <label>Salary Account(Bank Name) <span style="color: red">*</span></label>
                                <input name="salary_account" type="text" class="form-control in_aaccount_req">
                            </div>
                        </div>   
  
  
                            <div class="col-md-4 income_per_month" style="display: none">
                                <div class="form-cont">
                                    <label>Income Per Month <span style="color: red">*</span></label>
                                    <input name="income_per_month" type="text" class="form-control income_per_month_req">
                                </div>
                            </div>
              
                        <div class="col-md-4 salaried">
                            <div class="form-cont">
                                <label>Gross Salary <span style="color: red">*</span></label>
                                <input name="gross_salary" type="text" class="form-control val_salaried_req">
                            </div>
                        </div>   
                        
                        <div class="col-md-4 salaried">
                            <div class="form-cont">
                                <label>Net Salary <span style="color: red">*</span></label>
                                <input name="net_salary" type="text" class="form-control val_salaried_req">
                            </div>
                        </div> 
                        <?php
                            }
                        ?>
                        <div class="col-md-4 business">
                            <div class="form-cont">
                                <label>Name of Business <span style="color: red">*</span></label>
                                <input name="business_name" type="text" class="form-control business_req">
                            </div>
                        </div> 
                        
                        <div class="col-md-4 business">
                            <div class="form-cont">
                                <label>Registration Year of Business <span style="color: red">*</span></label>
                                <input name="business_year" type="text" class="form-control business_req">
                            </div>
                        </div>
                        
                        <div class="col-md-4 business">
                            <div class="form-cont">
                                <label>Business Vintage <span style="color: red">*</span></label>
                                <input name="business_vintage" type="text" class="form-control business_req">
                            </div>
                        </div> 
                        
                        <div class="col-md-4 business">
                            <div class="form-cont">
                                <label>Have in Current Account <span style="color: red">*</span></label>
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
                                    <select class="form-control property" name="type_land">
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
                                    <input name="size_land" type="text" class="form-control property_land">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-cont">
                                    <label>Registered Authority <span style="color: red">*</span></label>
                                    <select class="form-control property" name="registered_authority">
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
                                    <select class="form-control property" name="loan_type">
                                        <option value="">-----Select-----</option>
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
                                    <input name="property_purchase_cost" type="text" class="form-control property_land">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-cont">
                                    <label>Property Address <span style="color: red">*</span></label>
                                    <input name="property_address" type="text" class="form-control property">
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
                                    <input name="loan_amount" type="text" class="form-control validate[required,custom[onlyNumberSp]]">
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                            <div class="col-md-4">
                                <div class="form-cont">
                                    <label>House Status <span style="color: red">*</span></label>
                                    <input name="house_status" value="Parental" class="validate[required]" type="radio"> Parental
                                    <input name="house_status" value="Rented" class="validate[required]" type="radio"> Rented
                                    <input name="house_status" value="Owned" class="validate[required]" type="radio"> Owned
                                </div>
                            </div>                        
                            
                            <div class="col-md-4">
                                <div class="form-cont">
                                    <label>Residence Address <span style="color: red">*</span></label>
                                    <input name="residence_address" type="text" class="form-control validate[required]">
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-cont">
                                    <label>City <span style="color: red">*</span></label>
                                    <input name="city" type="text" class="form-control validate[required]">
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-cont">
                                    <label>Pincode <span style="color: red">*</span></label>
                            <input name="pincode" type="text" class="validate[required,,custom[onlyNumberSp],maxSize[6],minSize[6] form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-cont">
                                    <label>Pan Card No. <span style="color: red">*</span></label>
                                    <input name="pan_card_no" type="text" class="validate[required,maxSize[10],minSize[10] form-control" style="text-transform:uppercase">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-cont">
                                    <label>Aadhar Card No. <span style="color: red">*</span></label>
                                    <input name="aadhar_card_no" type="text" class="form-control validate[required,maxSize[12],minSize[12]">
                                </div>
                            </div>                        
                            <div class="col-md-4">
                                <div class="form-cont">
                                    <label>Pan Card <span style="color: red">*</span></label>
                                    <input name="pan_card_img" type="file" class="form-control validate[required]" multiple="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-cont">
                                    <label>Aadhar Card <span style="color: red">*</span></label>
                                    <input name="aadhar_card_img" type="file" class="form-control validate[required]" multiple="">
                                </div>
                            </div>                        
                            <div class="col-md-4">
                                <div class="form-cont">
                                    <label>Bank Statement(Last 3 Months) <span style="color: red">*</span></label>
                                    <input name="bank_statement_img" type="file" class="form-control validate[required]" multiple="">
                                </div>
                            </div>
                            <div class="col-md-4 income_per_month" style="display: none;">
                                <div class="form-cont">
                                    <label>Latest ITR (Last Three Years)<span style="color: red">*</span></label>
                                    <input name="latest_itr" type="file" class="form-control income_per_month_req validate[required]" multiple="">
                                </div>
                            </div> 
                            <?php
                                if($course_id==1 || $course_id==11 || $course_id==36)
                                {
                            ?>
                            <div class="col-md-4">
                                <div class="form-cont">
                                    <label>Property Site Map <span style="color: red">*</span></label>
                                    <input name="property_site_map_img" type="file" class="form-control property" multiple="">
                                </div>
                            </div>   
                            <?php
                                }
                            ?>                     
                        <div class="col-md-4 salarry_slip" style="display: none;">
                            <div class="form-cont">
                                <label>Salary Slip(Last 3 Months) <span style="color: red">*</span></label>
                                <input name="salary_slip_img" type="file" class="form-control salarry_slip_req" multiple="">
                            </div>
                        </div>
                        <?php 
                            }
                            if($course_id==18){
                        ?>

                        <!-- Health Insurance -->
                        <div class="col-md-3">
                            <div class="form-cont">
                                <label>City <span style="color: red">*</span></label>
                                <input name="city" type="text" class="form-control validate[required]">
                            </div>
                        </div>
                        <div class="col-md-1 pdr">
                            <div class="form-cont">
                                <label>&nbsp;</label>
                                <input name="travel_check" type="checkbox" value="Self" class="check_box self_check_box" checked="checked"/> <span>Self</span>
                            </div>
                        </div>
                        <div class="col-md-1 pdl" style="margin-top: 8px;">
                            <div class="form-cont">
                                <label>&nbsp;</label>
                                <select class="self_age validate[required]" name="self_age">
                                    <option value="">Age</option>
                                    <option value="18">18 yr</option>
                                    <option value="19">19 yr</option><option value="20">20 yr</option><option value="21">21 yr</option><option value="22">22 yr</option><option value="23">23 yr</option><option value="24">24 yr</option><option value="25">25 yr</option><option value="26">26 yr</option><option value="27">27 yr</option><option value="28">28 yr</option><option value="29">29 yr</option><option value="30">30 yr</option><option value="31">31 yr</option><option value="32">32 yr</option><option value="33">33 yr</option><option value="34">34 yr</option><option value="35">35 yr</option><option value="36">36 yr</option><option value="37">37 yr</option><option value="38">38 yr</option><option value="39">39 yr</option><option value="40">40 yr</option><option value="41">41 yr</option><option value="42">42 yr</option><option value="43">43 yr</option><option value="44">44 yr</option><option value="45">45 yr</option><option value="46">46 yr</option><option value="47">47 yr</option><option value="48">48 yr</option><option value="49">49 yr</option><option value="50">50 yr</option><option value="51">51 yr</option><option value="52">52 yr</option><option value="53">53 yr</option><option value="54">54 yr</option><option value="55">55 yr</option><option value="56">56 yr</option><option value="57">57 yr</option><option value="58">58 yr</option><option value="59">59 yr</option><option value="60">60 yr</option><option value="61">61 yr</option><option value="62">62 yr</option><option value="63">63 yr</option><option value="64">64 yr</option><option value="65">65 yr</option><option value="66">66 yr</option><option value="67">67 yr</option><option value="68">68 yr</option><option value="69">69 yr</option><option value="70">70 yr</option><option value="71">71 yr</option><option value="72">72 yr</option><option value="73">73 yr</option><option value="74">74 yr</option><option value="75">75 yr</option><option value="76">76 yr</option><option value="77">77 yr</option><option value="78">78 yr</option><option value="79">79 yr</option><option value="80">80 yr</option><option value="81">81 yr</option><option value="82">82 yr</option><option value="83">83 yr</option><option value="84">84 yr</option><option value="85">85 yr</option><option value="86">86 yr</option><option value="87">87 yr</option><option value="88">88 yr</option><option value="89">89 yr</option><option value="90">90 yr</option><option value="91">91 yr</option><option value="92">92 yr</option><option value="93">93 yr</option><option value="94">94 yr</option><option value="95">95 yr</option><option value="96">96 yr</option><option value="97">97 yr</option><option value="98">98 yr</option><option value="99">99 yr</option><option value="100">100 yr</option>
                                 </select>
                            </div>
                        </div>                         
                        <div class="col-md-1 pdr pdl">
                            <div class="form-cont">
                                <label>&nbsp;</label>
                                <input name="travel_check1" type="checkbox" value="Spouse" class="check_box spouse_check_box"> <span>Spouse</span>
                            </div>
                        </div>
                        <div class="col-md-1 pdr" style="margin-top: 8px;">
                            <div class="form-cont">
                                <label>&nbsp;</label>
                                <select class="spouse_age" name="spouse_age" style="display: none;">
                                    <option value="">Age</option>
                                    <option value="18">18 yr</option>
                                    <option value="19">19 yr</option><option value="20">20 yr</option><option value="21">21 yr</option><option value="22">22 yr</option><option value="23">23 yr</option><option value="24">24 yr</option><option value="25">25 yr</option><option value="26">26 yr</option><option value="27">27 yr</option><option value="28">28 yr</option><option value="29">29 yr</option><option value="30">30 yr</option><option value="31">31 yr</option><option value="32">32 yr</option><option value="33">33 yr</option><option value="34">34 yr</option><option value="35">35 yr</option><option value="36">36 yr</option><option value="37">37 yr</option><option value="38">38 yr</option><option value="39">39 yr</option><option value="40">40 yr</option><option value="41">41 yr</option><option value="42">42 yr</option><option value="43">43 yr</option><option value="44">44 yr</option><option value="45">45 yr</option><option value="46">46 yr</option><option value="47">47 yr</option><option value="48">48 yr</option><option value="49">49 yr</option><option value="50">50 yr</option><option value="51">51 yr</option><option value="52">52 yr</option><option value="53">53 yr</option><option value="54">54 yr</option><option value="55">55 yr</option><option value="56">56 yr</option><option value="57">57 yr</option><option value="58">58 yr</option><option value="59">59 yr</option><option value="60">60 yr</option><option value="61">61 yr</option><option value="62">62 yr</option><option value="63">63 yr</option><option value="64">64 yr</option><option value="65">65 yr</option><option value="66">66 yr</option><option value="67">67 yr</option><option value="68">68 yr</option><option value="69">69 yr</option><option value="70">70 yr</option><option value="71">71 yr</option><option value="72">72 yr</option><option value="73">73 yr</option><option value="74">74 yr</option><option value="75">75 yr</option><option value="76">76 yr</option><option value="77">77 yr</option><option value="78">78 yr</option><option value="79">79 yr</option><option value="80">80 yr</option><option value="81">81 yr</option><option value="82">82 yr</option><option value="83">83 yr</option><option value="84">84 yr</option><option value="85">85 yr</option><option value="86">86 yr</option><option value="87">87 yr</option><option value="88">88 yr</option><option value="89">89 yr</option><option value="90">90 yr</option><option value="91">91 yr</option><option value="92">92 yr</option><option value="93">93 yr</option><option value="94">94 yr</option><option value="95">95 yr</option><option value="96">96 yr</option><option value="97">97 yr</option><option value="98">98 yr</option><option value="99">99 yr</option><option value="100">100 yr</option>
                                 </select>
                            </div>
                        </div>                        
                        <div class="col-md-1 pdr">
                            <div class="form-cont">
                                <label>&nbsp;</label>
                                <input name="travel_check2" type="checkbox" value="Son" class="check_box son_check_box"><span>Son</span>
                            </div>
                        </div>
                        <div class="col-md-1 pdr" style="margin-top: 8px;">
                            <div class="form-cont">
                                <label>&nbsp;</label>
                                <select class="son_age" name="son_age" style="display: none;">
                                    <option value="">Age</option>
                                    <option value="18">18 yr</option>
                                    <option value="19">19 yr</option><option value="20">20 yr</option><option value="21">21 yr</option><option value="22">22 yr</option><option value="23">23 yr</option><option value="24">24 yr</option><option value="25">25 yr</option><option value="26">26 yr</option><option value="27">27 yr</option><option value="28">28 yr</option><option value="29">29 yr</option><option value="30">30 yr</option><option value="31">31 yr</option><option value="32">32 yr</option><option value="33">33 yr</option><option value="34">34 yr</option><option value="35">35 yr</option><option value="36">36 yr</option><option value="37">37 yr</option><option value="38">38 yr</option><option value="39">39 yr</option><option value="40">40 yr</option><option value="41">41 yr</option><option value="42">42 yr</option><option value="43">43 yr</option><option value="44">44 yr</option><option value="45">45 yr</option><option value="46">46 yr</option><option value="47">47 yr</option><option value="48">48 yr</option><option value="49">49 yr</option><option value="50">50 yr</option><option value="51">51 yr</option><option value="52">52 yr</option><option value="53">53 yr</option><option value="54">54 yr</option><option value="55">55 yr</option><option value="56">56 yr</option><option value="57">57 yr</option><option value="58">58 yr</option><option value="59">59 yr</option><option value="60">60 yr</option><option value="61">61 yr</option><option value="62">62 yr</option><option value="63">63 yr</option><option value="64">64 yr</option><option value="65">65 yr</option><option value="66">66 yr</option><option value="67">67 yr</option><option value="68">68 yr</option><option value="69">69 yr</option><option value="70">70 yr</option><option value="71">71 yr</option><option value="72">72 yr</option><option value="73">73 yr</option><option value="74">74 yr</option><option value="75">75 yr</option><option value="76">76 yr</option><option value="77">77 yr</option><option value="78">78 yr</option><option value="79">79 yr</option><option value="80">80 yr</option><option value="81">81 yr</option><option value="82">82 yr</option><option value="83">83 yr</option><option value="84">84 yr</option><option value="85">85 yr</option><option value="86">86 yr</option><option value="87">87 yr</option><option value="88">88 yr</option><option value="89">89 yr</option><option value="90">90 yr</option><option value="91">91 yr</option><option value="92">92 yr</option><option value="93">93 yr</option><option value="94">94 yr</option><option value="95">95 yr</option><option value="96">96 yr</option><option value="97">97 yr</option><option value="98">98 yr</option><option value="99">99 yr</option><option value="100">100 yr</option>
                                 </select>
                            </div>
                        </div>                        
                        <div class="col-md-2 pdr">
                            <div class="form-cont">
                                <label>&nbsp;</label>
                                <input name="travel_check3" type="checkbox" value="Daughter" class="check_box daughter_check_box"> <span>Daughter</span>
                            </div>
                        </div>
                        <div class="col-md-1 pdl" style="margin-top: 8px;">
                            <div class="form-cont">
                                <label>&nbsp;</label>
                                <select class="daughter_age" name="daughter_age" style="display: none;">
                                    <option value="">Age</option>
                                    <option value="18">18 yr</option>
                                    <option value="19">19 yr</option><option value="20">20 yr</option><option value="21">21 yr</option><option value="22">22 yr</option><option value="23">23 yr</option><option value="24">24 yr</option><option value="25">25 yr</option><option value="26">26 yr</option><option value="27">27 yr</option><option value="28">28 yr</option><option value="29">29 yr</option><option value="30">30 yr</option><option value="31">31 yr</option><option value="32">32 yr</option><option value="33">33 yr</option><option value="34">34 yr</option><option value="35">35 yr</option><option value="36">36 yr</option><option value="37">37 yr</option><option value="38">38 yr</option><option value="39">39 yr</option><option value="40">40 yr</option><option value="41">41 yr</option><option value="42">42 yr</option><option value="43">43 yr</option><option value="44">44 yr</option><option value="45">45 yr</option><option value="46">46 yr</option><option value="47">47 yr</option><option value="48">48 yr</option><option value="49">49 yr</option><option value="50">50 yr</option><option value="51">51 yr</option><option value="52">52 yr</option><option value="53">53 yr</option><option value="54">54 yr</option><option value="55">55 yr</option><option value="56">56 yr</option><option value="57">57 yr</option><option value="58">58 yr</option><option value="59">59 yr</option><option value="60">60 yr</option><option value="61">61 yr</option><option value="62">62 yr</option><option value="63">63 yr</option><option value="64">64 yr</option><option value="65">65 yr</option><option value="66">66 yr</option><option value="67">67 yr</option><option value="68">68 yr</option><option value="69">69 yr</option><option value="70">70 yr</option><option value="71">71 yr</option><option value="72">72 yr</option><option value="73">73 yr</option><option value="74">74 yr</option><option value="75">75 yr</option><option value="76">76 yr</option><option value="77">77 yr</option><option value="78">78 yr</option><option value="79">79 yr</option><option value="80">80 yr</option><option value="81">81 yr</option><option value="82">82 yr</option><option value="83">83 yr</option><option value="84">84 yr</option><option value="85">85 yr</option><option value="86">86 yr</option><option value="87">87 yr</option><option value="88">88 yr</option><option value="89">89 yr</option><option value="90">90 yr</option><option value="91">91 yr</option><option value="92">92 yr</option><option value="93">93 yr</option><option value="94">94 yr</option><option value="95">95 yr</option><option value="96">96 yr</option><option value="97">97 yr</option><option value="98">98 yr</option><option value="99">99 yr</option><option value="100">100 yr</option>
                                 </select>
                            </div>
                        </div>  
                        <div class="col-md-9">
                            <div class="form-cont health_income">
                                <label>Select Income <span style="color: red">*</span></label>
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
                                <label>Any Medical Conditions <span style="color: red">*</span></label>
                                <input name="medical" value="1" type="radio" class="medical validate[required]"/> Yes
                                <input name="medical" value="0" type="radio" class="medical validate[required]" checked="" /> No
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
                                <input name="term_dob" id="datepicker" type="text" class="form-control validate[required]"/>
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
                                <input name="annual_income" type="text" class="form-control validate[required,max[100000000],min[1]custom[onlyNumberSp]]"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Occupation <span style="color: red">*</span></label>
                                <select class="form-control validate[required]" name="terms_occupation">
                                    <option value="">-----Select-----</option>
                                    <option value="Salaried">Salaried</option>
                                    <option value="Self Employed">Self Employed</option>
                                    <option value="Businessman">Businessman</option>
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
                                <input name="destination" type="text" class="form-control validate[required]" />
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Date of Travelling <span style="color: red">*</span></label>
                                <input name="travelling" id="datepicker" type="text" class="form-control validate[required]" placeholder="dd/mm/yyyy"/>
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
                                <input name="corporate_company_name" type="text" class="form-control validate[required]">
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>City <span style="color: red">*</span></label>
                                <input name="city" type="text" class="form-control validate[required]"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Insurance Policy <span style="color: red">*</span></label>
                                <select name="insurance_policy" id="healthsmeOption" class="form-control validate[required]">
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
                                <select name="home_property_type" id="healthsmeOption" class="form-control validate[required]">
                                    <option value="">Select</option>
                                    <option value="Flat">Flat</option>
                                    <option value="Individual House">Individual House</option>
                                </select>
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Value of Building <span style="color: red">*</span></label>
                                <input name="value_building" type="text" class="form-control validate[required,custom[onlyNumberSp]]">
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Value of Content <span style="color: red">*</span></label>
                                <input name="value_content" type="text" class="form-control validate[required,custom[onlyNumberSp]]"/>
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Age of Property <span style="color: red">*</span></label>
                                <input name="age_property" type="text" class="form-control validate[required,custom[onlyNumberSp]]"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Ownership <span style="color: red">*</span></label>
                                <input name="ownership" type="radio" class="validate[required]"/> Own
                                <input name="ownership" type="radio" class="validate[required]" /> Rented
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
                                <label>RC Upload <span style="color: red">*</span></label>
                                <input name="rc_upload_img" type="file" class="form-control validate[required]">
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Current Policy Upload <span style="color: red">*</span></label>
                                <input name="current_policy_img" type="file" class="form-control validate[required]"/>
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
                                <input name="card_number" type="text" class="form-control validate[required]" placeholder="eg:2">
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Total Credit Limit <span style="color: red">*</span></label>
                                <input name="credit_limit" type="text" class="form-control validate[required,custom[onlyNumberSp]]"/>
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Available Credit Limit <span style="color: red">*</span></label>
                                <input name="available_credit_limit" type="text" class="form-control validate[required,custom[onlyNumberSp]]"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Max. Card Limit <span style="color: red">*</span></label>
                                <input name="max_card_limit" type="text" class="form-control validate[required,custom[onlyNumberSp]]" placeholder="max. card limit of card you have" />
                            </div>
                        </div>                         
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Bank Name <span style="color: red">*</span></label>
                                <input name="bank_name" type="text" class="form-control validate[required]"/>
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Apply For <span style="color: red">*</span></label>
                                <input name="apply_for_bank" type="text" class="form-control validate[required]" placeholder="eg:HDFC Bank" />
                            </div>
                        </div>                        
                        <div class="col-md-4">
                            <div class="form-cont">
                                <label>Latest Card Statement <span style="color: red">*</span></label>
                                <input name="latest_card_statement_img" type="file" class="form-control validate[required]">
                            </div>
                        </div>                        
                        <!-- End Motor Insurance -->
                        <?php
                            }
                        ?>       
                    </div> 
                    <div class="clearfix"></div>
                    <div class="row text-center">
                        <input type="submit" name="business_register" value="SUBMIT" class="btn btn-primary sender_submit">
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
<?php include('footer.php');?>