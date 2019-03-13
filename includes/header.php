<?php
    include('../urlset.php');
    $ud=$_SESSION['user'];

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['kU7sDGw65ra8ee65aFasae9Dr6as5d6']) ) {
		header("Location: ".base_url()."");
		exit;
	}
	// select loggedin users detail
	$res=$conn->query("SELECT * FROM login WHERE id=".$_SESSION['user']);
	$userRow=mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Sumiksha Services</title>
    <link rel="icon" href="http://dexusmedia.com/images/favicon.png">

    <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?= base_url();?>assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <link href="<?= base_url();?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

   <!--  data table -->
    <link href="<?= base_url();?>assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <!-- Gritter -->
    <link href="<?= base_url();?>assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <!-- text editor -->
    <link href="<?= base_url();?>assets/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="<?= base_url();?>assets/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

    <link href="<?= base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url();?>assets/css/style.css" rel="stylesheet">
    <!-- morris -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <style type="text/css">
        .input-group[class*=col-]{
            padding-left: 15px;
        }
    </style>

</head>

<body>
    <div id="wrapper">
        <?php
            if($_SESSION['user']==1)
            {
            
                include('../includes/admin_sidebar.php');
        
            }
            else
            {
        
                include('../includes/user_sidebar.php');

            }
        ?>
   	    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <?php
                    if($_SESSION['user']==1)
                    {
                ?>
                <li style="padding: 20px">
                    <span class="m-r-sm text-muted welcome-message">Welcome to <b>Sumiksha Services</b></span>
                </li>
                <?php
                    }
                    else
                    {
                ?>
                <li style="padding: 20px">
                    <span class="m-r-sm text-muted welcome-message">Welcome to <b><?= $userRow['name'];?></b></span>
                </li>
                <?php
                    }
                ?>
            <!--    <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning"></span>
                    </a>
                     <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a7.jpg">
                                </a>
                                <div class="media-body">
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a4.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul> 
                </li>-->
                <li class="dropdown">
                    <a class="count-info" href="<?= base_url();?>user_dashboard/notification-list.php">
                        <i class="fa fa-bell"></i>  
                        <?php
                            if($ud!=1)
                            {
                                $notification = $conn->query("select count(status) as notify from notifications where status='1'");
                                $notif_count = mysqli_fetch_array($notification);
                                if($notif_count['notify']>0)
                                {
                        ?>
                        <span class="label label-primary"><?= $notif_count['notify'];?></span>
                        <?php
                                }
                            }
                        ?>
                    </a>
                   <!-- <ul class="dropdown-menu dropdown-alerts">
                         <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul> -->
                </li>

                <li>
                    <a href="<?= base_url();?>logout.php?logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>

             </ul>

        </nav>
    </div>