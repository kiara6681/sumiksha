<?php 
error_reporting(0);
if(isset($_POST['submit_redemption']))
{

    $user_id = $_REQUEST['user_id'];
    $name = $_REQUEST['name'];
    
    $start_date = date("Y-m-d H:i:s");
//exit;
    if(mysqli_query($conn, "INSERT INTO `redem_statement_request` (`user_id`, `name`, `created_at`) VALUES ('$user_id', '$name', '$start_date')"))
    {
        echo "<script language='javascript'>alert('Successfully Submited !');window.location ='".base_url()."includes/user_home';</script>";
    }
}

if(isset($_POST['submit_statement_request']))
{

    $user_id = $_REQUEST['user_id'];
    $name = $_REQUEST['name'];
    
    $start_date = date("Y-m-d H:i:s");
//exit;
    if(mysqli_query($conn, "INSERT INTO `redem_statement_request` (`user_id`, `name`, `created_at`) VALUES ('$user_id', '$name', '$start_date')"))
    {
        echo "<script language='javascript'>alert('Successfully Submited !');window.location ='".base_url()."includes/user_home';</script>";
    }
}

?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header" style="text-align:-webkit-center">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="<?= base_url();?>assets/img/man.png" style="background: #fff;width: 100px;"/>
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?= $userRow['name'];?></strong>
                     <b class="caret"></b> </span>  </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="<?= base_url();?>user_dashboard/profile">Profile</a></li>
                        <li><a href="<?= base_url();?>user_dashboard/changepassword">Change Password</a></li>
                        <li><a href="<?= base_url();?>logout.php?logout">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    SS
                </div>
            </li>

            <li class="active">
                <a href="<?= base_url();?>"><i class="fa fa-globe"></i> <span class="nav-label">Go to Website</span></a>
            </li>

            <li>
                <a href="<?= base_url();?>includes/user_home"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>

            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Buy Now</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <?php 
                        $sql=$conn->query("select * from courses limit 0,5");
                        while($row=mysqli_fetch_array($sql))
                        {
                        $id = $row['id'];
                            
                    ?>
                    <li>
                        <a href="javascript:;">
                            <span class="nav-label"><?= $row['name'];?></span><span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <?php 
                                $sql1=$conn->query("select * from course1 where course_id=$id");
                                while($row1=mysqli_fetch_array($sql1))
                                {
                            ?>
                            <li>
                                <li> 
                                    <?php
                                        if($row1['id']==18){
                                    ?>
                                        <a href="https://health.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                                    <?php
                                        }
                                        elseif($row1['id']==19){
                                    ?>
                                        <a href="https://termlife.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                                    <?php
                                        }
                                        elseif($row1['id']==26){
                                    ?>
                                        <a href="https://travel.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                                    <?php
                                        }
                                        elseif($row1['id']==27){
                                    ?>
                                        <a href="http://sme.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                                    <?php
                                        }
                                        if($row1['id']==28){
                                    ?>
                                        <a href="http://home.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                                    <?php
                                        }
                                        elseif($row1['id']==51){
                                    ?>
                                        <a href="https://twowheeler.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                                    <?php
                                        }
                                        elseif($row1['id']==53){
                                    ?>
                                        <a href="https://ci.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                                    <?php
                                        }
                                        elseif($row1['id']==54){
                                    ?>
                                        <a href="http://cancerinsurance.policybazaar.com/ci?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                                    <?php
                                        }
                                        elseif($row1['id']!=18 && $row1['id']!=19 && $row1['id']!=26 && $row1['id']!=27 && $row1['id']!=28 && $row1['id']!=51 && $row1['id']!=53 && $row1['id']!=54)
                                        {
                                    ?>
                                    <a href="<?= base_url();?>product/<?= $row1['metatitle'];?>">
                                    <?php
                                        }
                                    ?>
                                    <span class="nav-label"><?= $row1['name'];?></span>
                                </a>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </li>

            <li><a href="<?= base_url();?>user_dashboard/download-list.php"><i class="fa fa-users"></i> <span class="nav-label">Downloads</span></a></li>

            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Mutual Funds</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">

                    <li>
                        <a href="<?= base_url();?>user_dashboard/mutual-funds-list.php">
                            <span class="nav-label">Mutual Fund List</span></span>
                        </a>
                    </li>
                    <li>
                        <a href="#redemption" data-toggle="modal">
                            <span class="nav-label">Redemption</span></span>
                        </a>
                    </li>
                    <li>
                        <a href="#statement_request" data-toggle="modal">
                            <span class="nav-label">Statement Request</span></span>
                        </a>
                    </li>

                </ul>
            </li>
            <li><a href="<?= base_url();?>user_dashboard/notification-list.php"><i class="fa fa-users"></i> <span class="nav-label">Notifications</span></a></li>
            <li><a href="<?= base_url();?>user_dashboard/offers-list.php"><i class="fa fa-users"></i> <span class="nav-label">Offers</span></a></li>
            <li><a href="<?= base_url();?>user_dashboard/refer-and-earn.php"><i class="fa fa-users"></i> <span class="nav-label">Lead Generation</span></a></li>
            <li><a href="<?= base_url();?>user_dashboard/help_support.php"><i class="fa fa-users"></i> <span class="nav-label">Help and Support</span></a></li>
        </ul>
    </div>
</nav>

<!-- redemption -->
<div id="redemption" class="modal fade animated shake" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-info"></i> Redemption</h4>
            </div>
            <form method="post">
                <div class="modal-body">
                    <p>Are you sure you want to redemption ?</p>

                    <input type="hidden" name="user_id" value="<?= $_SESSION['user'];?>"> 
                    <input type="hidden" name="name" value="redemption"> 
                </div>
                <div class="modal-footer">
                
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit" name="submit_redemption">Submit</button>
                
              </div>
            </form>
        </div>

    </div>
</div>

<!-- statement_request -->
<div id="statement_request" class="modal fade animated shake" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-info"></i> Statement Request</h4>
            </div> 
            <form method="post">
                <div class="modal-body">
                    <p>Are you sure you want to statement ?</p>
                    <input type="hidden" name="user_id" value="<?= $_SESSION['user'];?>"> 
                    <input type="hidden" name="name" value="statement"> 
                </div>
                <div class="modal-footer">
               
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit" name="submit_statement_request">Submit</button>
                
                </div>
            </form>
        </div>

    </div>
</div>
