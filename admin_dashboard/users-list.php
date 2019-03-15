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

        $email_id=$_REQUEST['email_id'];

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

        if(!empty($unique_code))
        {

            $message="";
            $message .="Your Unique Code is : ".$unique_code."";
            $subject  ="Reset Password"; //like--- Resume From Website
            $headers  ="";
            include("../PHPMailer/PHPMailerAutoload.php"); //Here magic Begen we include PHPMailer Library.
            include("../PHPMailer/class.phpmailer.php");   
            $mail = new PHPMailer;
                                          // Enable verbose debug output
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'mailout.one.com;';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'test@sumikshaservices.com';// SMTP username 
            $mail->Password = '?t@NYp^L.Fay'; // SMTP password 
            $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted
            $mail->Port = 25; 
            $mail->SMTPDebug = 0; // TCP port to connect to
            $mail->setFrom('test@sumikshaservices.com', 'Unique Code'); //You Can add your own From mail
            $mail->addAddress($email_id); // Add a recipient id where you want to send mail 
            
            $mail->addAttachment($_FILES['cv']['tmp_name'],$_FILES['cv']['name']); //This line Use to Keep User Txt,Doc,pdf file ,attachment      
            $mail->addReplyTo('info@sumikshaservices.com'); //where you want reply from user
            $mail->isHTML(true); 
            $mail->Subject=''.$subject;
            $mail->Body=''.$message;
            if(!$mail->send()) 
                {                            
                    echo "Error in Form :- $mail->ErrorInfo!. We will Fix This soon";
                }
            else 
                {    
                    echo "<script language='javascript'>alert('Successfully Submitted!');window.location = 'users-list.php';</script>";              
                }
            return true;    
        }
        else
        {
            if($conn->query($approve))
            {
                echo "<script language='javascript'>alert('Successfully Submitted!');window.location = 'users-list.php';</script>";
            }            
        }
    }

    //delete user
    $rowCount = count($_POST["users"]);
        for($i=0;$i<$rowCount;$i++) {

        $conn->query("DELETE FROM login WHERE id='" . $_POST["users"][$i] . "'");

        header("Location: ".base_url()."admin_dashboard/users-list.php");
    }

?>
<script>
    function setDeleteAction() {
        if(confirm("Are you sure want to delete these rows?")) {
        document.frmUser.action = "users-list.php";
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
                    <a href="user.php" class="btn btn-success"><i class="fa fa-plus"></i> add user</a>
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
                                <th>User Designation</th>
                                <th>Email Id</th>
                                <th>Phone</th>
                                <th>Pincode</th>
                                <th>DOB</th>
                                <th>Refferal Code</th>
                                <th>Unique ID</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql_cmp=$conn->query("select * from login where id != '1' order by id desc");
                                    $count=1;
                                    while($data_cmp=mysqli_fetch_array($sql_cmp))
                                    {
                                        $user_id=$data_cmp['id'];
                                        $users=$conn->query("select * from user_roles where user_id='$user_id'");
                                        $user_row=mysqli_fetch_array($users)

                                ?>
                                <tr class="gradeX">
                                    <td><input type="checkbox" name="users[]" value="<?= $data_cmp["id"]; ?>" ></td>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $data_cmp['name']; ?></td>
                                    <?php
                                        if($user_row['role_id']==3)
                                        { 
                                    ?>
                                    <td><b>Channel Partner</b></td>
                                    <?php
                                        }
                                        elseif($user_row['role_id']==4)
                                        { 
                                    ?>
                                    <td><b>Franchise Partner</b></td>
                                    <?php
                                        }
                                        else
                                        { 
                                    ?>
                                    <td><b>Employee</b></td>
                                    <?php
                                        }
                                    ?>
                                    <td><?php echo $data_cmp['username']; ?></td>
                                    <td><?php echo $data_cmp['phone']; ?></td>
                                    <td><?php echo $data_cmp['pincode']; ?></td>
                                    <td><?php echo $data_cmp['dob']; ?></td>
                                    <td><?php echo $data_cmp['ref_code']; ?></td>
                                    <td style="color:red"><?php echo $data_cmp['unique_id']; ?></td>
                                    <td><?php echo $data_cmp['created_at']; ?></td>
                                    <td class="center">
                                        <a href="user_view.php?id=<?php echo $data_cmp['id']; ?>" class="btn btn-success btn-circle">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <?php
                                            if($data_cmp['status']==1)
                                            {
                                        ?>
                                        <a href="#<?= $data_cmp['id'];?>" data-toggle="modal" class="btn btn-success animation_select" data-animation="shake">
                                            DisApprove
                                        </a>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                        <a href="#<?= $data_cmp['id'];?>" data-toggle="modal" class="btn btn-warning animation_select" data-animation="shake">
                                            Approve
                                        </a>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                </tr>                           
 
                                <div id="<?= $data_cmp['id'];?>" class="modal fade animated shake" role="dialog">
                                    <div class="modal-dialog">
                                        
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <?php
                                                    if($data_cmp['status']==1)
                                                    {
                                                ?>
                                                <h4 class="modal-title"><i class="fa fa-user"></i> DisApprove User</h4>
                                                <?php
                                                    }
                                                    else
                                                    {
                                                ?>
                                                <h4 class="modal-title"><i class="fa fa-user"></i> Approve User</h4>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                            <div class="modal-body">
                                                <?php
                                                    if($data_cmp['status']==1)
                                                    {
                                                ?>
                                                <p>Are you sure you want to DisApprove ?</p>
                                                <?php
                                                    }
                                                    else
                                                    {
                                                ?>
                                                <p>Are you sure you want to Approve ?</p>
                                                <?php
                                                    }
                                                ?>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <form method="post" class="form-horizontal">
                                                    <input type="hidden" name="delt" id="delt" value="<?= $data_cmp['status'];?>"> 
                                                    <?php
                                                        if($user_row['role_id']==3 || $user_row['role_id']==4 || $user_row['role_id']==5)
                                                        {
                                                            if($data_cmp['status']==0)
                                                            {
                                                    ?>
                                                    <div class="col-sm-12">
                                                        <label class="control-label" style="float:left;">Unique Id</label>
                                                        <input type="text" name="unique_code" id="unique_code" class="form-control"> 
                                                        <input type="hidden" name="email_id" value="<?php echo $data_cmp['username']; ?>" class="form-control"> 
                                                    </div>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
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