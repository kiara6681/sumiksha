<?php include('urlset.php'); 
    $ipaddress = $_SERVER['REMOTE_ADDR'];
?>
<!DOCTYPE html>

<html lang="en">

<head>
 
<meta charset="utf-8">
 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
 
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<title>Sumiksha Services Jaipur</title>

<meta name="keywords" content="free  advice, free  help, best  lawyer in  Jaipur, free legal advice, free legal help, online legal helpline, lawyer online, free law advice, find legal help, find a lawyer, free legal answers, talk to lawyer free">
<meta name="description" content="Consult top notch lawyers & legal advisors in  Jaipur to solve all your legal issues related to ✓divorce, ✓crime, ✓property, ✓immigration, ✓cheque bounce etc.Consult Now ">
<meta http-equiv="Content-type" value="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
<!-- Bootstrap Core CSS -->
  
<link href="<?= base_url();?>frontend_assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url();?>frontend_assets/fonts/custom/fonts.css" rel="stylesheet">
<link href="<?= base_url();?>frontend_assets/css/owl.carousel.css" rel="stylesheet">
<link href="<?= base_url();?>frontend_assets/css/owl.theme.default.min.css" rel="stylesheet">
<link href="<?= base_url();?>frontend_assets/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">                              
<link href="<?= base_url();?>frontend_assets/css/jquery.bxslider.css" rel="stylesheet">
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<link href="<?= base_url();?>frontend_assets/css/custom.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url();?>frontend_assets/css/jquery.mCustomScrollbar.css">
<link rel="shortcut icon" href="<?= base_url();?>frontend_assets/images/icon.png">
 
<link rel="stylesheet" href="<?= base_url();?>frontend_assets/css/default.css" type="text/css" />
<link rel="stylesheet" href="<?= base_url();?>frontend_assets/css/layouts.css" type="text/css" />
<link rel="stylesheet" href="<?= base_url();?>frontend_assets/css/shortcodes.css" type="text/css" />
<link rel="stylesheet" media="screen" href="<?= base_url();?>frontend_assets/css/responsive-leyouts.css" type="text/css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url();?>frontend_assets/css/Simple-Line-Icons-Webfont/simple-line-icons.css" media="screen" />
<link rel="stylesheet" href="<?= base_url();?>frontend_assets/css/et-line-font/et-line-font.css">
<!-- <link href="<?= base_url();?>frontend_assets/js/animations/css/animations.min.css" rel="stylesheet" type="text/css" media="all" /> -->
<link rel="stylesheet" type="text/css" href="<?= base_url();?>frontend_assets/js/cubeportfolio/cubeportfolio.min.css">
<link href="<?= base_url();?>frontend_assets/js/owl-carousel/owl.carousel.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url();?>frontend_assets/js/custom-scrollbar/jquery.mCustomScrollbar.css">
<link rel="stylesheet" type="text/css" href="<?= base_url();?>frontend_assets/js/smart-forms/smart-forms.css">
<link rel="stylesheet" href="<?= base_url();?>frontend_assets/css/animate.min.css" type="text/css" />
<link rel="stylesheet" href="<?= base_url();?>frontend_assets/js/tabs/assets/css/responsive-tabs.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">

<!-- Validation Jquery -->
<link rel="stylesheet" href="<?= base_url();?>frontend_assets/css/validationEngine.jquery.css" type="text/css"/>
<script src="<?= base_url();?>frontend_assets/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url();?>frontend_assets/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script>
    $(document).ready(function(){
        // binds form submission and fields to the validation engine
        $("#formID").validationEngine();
    });
</script>
<script>
    $(document).ready(function(){
        // binds form submission and fields to the validation engine
        $("#Register_form").validationEngine();
    });
</script>
<script>
    $(document).ready(function(){
        // binds form submission and fields to the validation engine
        $(".Job_form").validationEngine();
        var ipaddress = "<?= $ipaddress; ?>";
        //alert(ipaddress);
        $.ajax({
            url : "<?= base_url();?>ajaxPages/getIPaddress.php",
            type : "POST",
            data : {ipaddress:ipaddress},
            success : function(data)
            {
                //alert(data);
                //$("#subcategory").html(data);
            }
        });
    });
</script>

<style type="text/css">
 
    .carousel-inner {
     
        position: relative;
     
        width: 100%;
      
        overflow: hidden;
     
        height: auto;
     
    }
     
    .error_blank{
     
        display:none;
      
    }
     
    .modal-dialog {margin-top: 100px;}
    .modal {background: #000c;}

    ol li{
        list-style-type: decimal!important;
    }

    #mySidenav{
        position: fixed;
        top: 18%;
        right: 0;
        z-index: 9999;
    }
    #mySidenav a {
        position: absolute;
        right: -120px;
        transition: 0.3s;
        padding: 10px;
        width: 150px;
        text-decoration: none;
        font-size: 15px;
        color: white;
        border-radius: 5px 0px 0px 5px;
    }
    #mySidenav a .fa {
        font-size: 20px;
        margin-right: 5px;
    }

    #mySidenav a:hover {
        right: 0;
    }

    #facebook {
        top: 20px;
        background-color: #4267b2;
    }

    #twitter {
        top: 70px;
        background-color: #2196F3;
    }

    #google {
        top: 120px;
        background-color: #f44336;
    }

    #linkedin {
        top: 170px;
        background-color: #0077B5;
    }

    #whatsapp {
        top: 220px;
        background-color: green;
    }

    a.btn.darkGreyBtn.red-bg-btn { padding:5px 15px; font-size: 14px;}
     
    .darkGreyBtn span.applyBtn.whatupBtn{ background: url("<?= base_url();?>frontend_assets/images/whatupp.png") no-repeat top left !important;}
      
    .darkGreyBtn:hover>span.whatupBtn { background: url("<?= base_url();?>frontend_assets/images/whatupp-hover.png") no-repeat top left !important; }
     
    .darkGreyBtn:hover> p span.tollfreeText{ color:#fff !important;} 
     
    .darkGreyBtn:hover> p span.tollfreeNumber{  color:#fff !important;} 
      
    .lightGreyBtn:hover>span.tollfreeBtn { background: url(images/tollfree-icon-hover.png) no-repeat top left !important; }
     
    .lightGreyBtn:hover> p span.tollfreeText{ color:#fff !important;} 
     
    .lightGreyBtn:hover> p span.tollfreeNumber{  color:#fff !important;} 
     
    .captcha_container .help-block{top:77px;}
     
    .has-error{ position:relative;}
    p {
        margin: 0 0 10px;
        font-family: 'Open Sans', sans-serif;
        color: #000;
    }
    .back_color{
        background: linear-gradient(to left, #ff6600 0%, #003399 80%);
    }
    .footer-social-icons .fa {
        padding: 10px;
        background: #fff;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        text-align: center;
    }
    .padding{
        padding: 5px 10px;
    }
    .sumiksha_ul{
        display: inline-flex;
        margin-bottom: 0;
    }
    .sumiksha_ul li{
        margin-right: 10px;
        color: #fff;
        padding-top: 5px;
    }    
    .sumiksha_ul li a{
        color: #fff;
    }
    .compy img{
        height: 45px;
    }
    .navbar-nav>li>a{
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .modal-open .modal{
        z-index: 999999;
    }
        .AlwasysBottom {
        height: 35px;
        position: relative;
        bottom: 0;
        width: 100%;
        padding: 5px;
        text-align: center;
        vertical-align: top;
        z-index: 99;
        margin: 0 auto;
    }
    .AlwasysBottom b {
        width: auto;
        float: left;
        color: #F9AF29;
    }
    .AlwasysBottom marquee {
        width: 100%;
        float: right;
        color: #000;
        padding-top: 20px;
        font-size: 20px;
    }    
    .AlwasysBottom p {
        width: 100%;
        float: right;
        color: #000;
        padding-top: 20px;
        font-size: 20px;
        font-family: 'montserratregular';
    }
    .navbar-left{
        margin-left: 150px;
    }
    .navbar-fixed-top{
        top: 98px;
    }
    .section{
        padding: 50px 0px;
    }
    .choose .fa{
        font-size: 50px;
        margin-bottom: 20px;
        color: #fff;
    }
    .choose .col-lg-4{
        padding-top: 50px;
    }
    .choose h5{
        color: #fff;
    }
    .testimonial{
        text-align: center;
        margin: 0 15px;
    }
    .testimonial .description{
        padding: 15px;
        margin: 0;
        border-bottom: 1px solid #ccc;
        font-size: 18px;
        color: #fff;
        line-height: 30px;
        position: relative;
        height: 140px;
        overflow: hidden;
    }
    .testimonial .description:after{
        content: "";
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #fff;
        margin: 0 auto;
        position: absolute;
        bottom: -5px;
        left: 0;
        right: 0;
    }
    .testimonial .pic{
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        margin: 20px auto;
    }
    .testimonial .pic img{
        width: 100%;
        height: 100%;
    }
    .testimonial .title{
        font-size: 18px;
        font-weight: bold;
        color: #fff;
        margin: 0 0 10px 0;
    }
    .testimonial .post{
        display: block;
        font-size: 14px;
        color: #fff;
    }
    .owl-theme .owl-controls{
        margin-top: 30px;
    }
    .owl-theme .owl-controls .owl-page span{
        background: #ccc;
        opacity: 1;
        transition: all 0.4s ease 0s;
    }
    .owl-theme .owl-controls .owl-page.active span,
    .owl-theme .owl-controls.clickable .owl-page:hover span{
        background: #73438f;
    }
    .dropdown {
        position: relative;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 220px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {background-color: #ddd;}

    .dropdown:hover .dropdown-content {display: block;}

    .dropdown:hover .dropbtn {background-color: #3e8e41;}
    .carousel-inner p{
        color:#fff;
    }    
    .carousel-inner small{
        color:#fff;
    }

    #quote-carousel {
        padding: 0 10px 30px 10px;
        margin-top: 30px;
        /* Control buttons  */
        /* Previous button  */
        /* Next button  */
        /* Changes the position of the indicators */
        /* Changes the color of the indicators */
    }
    #quote-carousel .carousel-control {
        background: none;
        color: #CACACA;
        font-size: 2.3em;
        text-shadow: none;
        margin-top: 30px;
    }
    #quote-carousel .carousel-control.left {
        left: -60px;
    }
    #quote-carousel .carousel-control.right {
        right: -60px;
    }
    #quote-carousel .carousel-indicators {
        right: 50%;
        top: auto;
        bottom: 0px;
        margin-right: -19px;
    }
    #quote-carousel .carousel-indicators li {
        width: 50px;
        height: 50px;
        margin: 5px;
        cursor: pointer;
        border: 4px solid #CCC;
        border-radius: 50px;
        opacity: 0.4;
        overflow: hidden;
        transition: all 0.4s;
    }
    #quote-carousel .carousel-indicators .active {
        background: #333333;
        width: 128px;
        height: 128px;
        border-radius: 100px;
        border-color: #f33;
        opacity: 1;
        overflow: hidden;
    }
    .carousel-inner {
        min-height: 300px;
    }
    .item blockquote {
        border-left: none;
        margin: 0;
    }
    .item blockquote p:before {
        content: "\f10d";
        font-family: 'Fontawesome';
        float: left;
        margin-right: 10px;
    }
</style>
<script>
    $(function(){
        $('#datepicker').datepicker({
            onSelect: function(value, ui) {
                var today = new Date(), 
                    age = today.getFullYear() - ui.selectedYear;
                $('#age').val(age+" Years");
            },
            maxDate: '+0d',
            changeMonth: true,
            changeYear: true,
            defaultDate: '-18yr',
        });
    });
</script> 
</head>
 
<body onLoad="showModal();">
    <div id="mySidenav" class="sidenav">
        <a href="https://www.facebook.com/" target="_blank" id="facebook"><i class="fa fa-facebook"></i> <span class="hidden-xs">Facebook</span></a>
        <a href="https://twitter.com/" target="_blank" id="twitter"><i class="fa fa-twitter"></i> <span class="hidden-xs">Twitter</span></a>
        <a href="https://plus.google.com/" target="_blank" id="google"><i class="fa fa-google-plus"></i> <span class="hidden-xs">Google Plus</span></a>
        <a href="https://www.linkedin.com/" target="_blank" id="linkedin"><i class="fa fa-linkedin"></i> <span class="hidden-xs">Linkedin</span></a>
        <a href="javascript:;" target="_blank" id="whatsapp"><i class="fa fa-whatsapp"></i> <span class="hidden-xs">Whatsapp</span></a>
    </div>

    <?php
        $sql1=$conn->query("select * from text");
        $row1=mysqli_fetch_array($sql1);

        $email = $row1['email'];
        $phone = $row1['phone'];

        $phone = explode(',',$phone);
        $email = explode(',',$email);
    ?>
    <div class="headerLogo">
        <div class="container">
            <div class="row hidden-xs">
                <div class="col-md-2 col-xs-6 col-sm-4"> 
        
                    <a class="Logo" href="<?= base_url();?>"><img alt="logo" src="<?= base_url();?>frontend_assets/images/logo.png"></a> 
        
                </div>
        
                <?php
                    if(isset($_SESSION['user']))
                    {
                    // select loggedin users detail
                    $res=$conn->query("SELECT * FROM login WHERE id=".$_SESSION['user']);
                    $userRow=mysqli_fetch_array($res);
                ?>
                    <div class="col-md-8 col-xs-12 col-sm-4 text-center"> 
            
                        <div class="AlwasysBottom">
                           <marquee class="MarqueeId" onload="this.start();" onmouseover="this.stop();" onmouseout="this.start();" truespeed="truespeed" scrollamount="1" class="ticker_txt1" scrolldelay="20" direction="left" loop="repeat">Economically Broken!! Financially Tensed?? Come to us...</marquee>
                           <p class="ticker_txt1 Marquee">Economically Broken!! Financially Tensed?? Come to us...</p>
                        </div>
            
                    </div>
                    <div class="col-md-2 col-xs-5 col-sm-8">
            
                        <div class="dropdown buttonPanel text-left"> 
                            <a href="javascript:void(0)" class="dropbtn btn darkGreyBtn red-bg-btn back_color">
                                My Account
                            </a> 
                            <div class="dropdown-content">
                                <!-- <a href="#">My Profile</a> -->
                                <a href="javascript:void(0)">
                                    <i class="fa fa-user"></i> <?= $userRow['name'];?>
                                </a>
                                <?php
                                    if($_SESSION['user']==1)
                                    {
                                ?>
                                <a href="<?= base_url();?>includes/admin_home"><i class="fa fa-dashboard"></i> Dashboard</a>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                <a href="<?= base_url();?>includes/user_home"><i class="fa fa-dashboard"></i> Dashboard</a>
                                <?php
                                    }
                                ?>
                                <a href="<?= base_url();?>logout.php?logout"><i class="fa fa-sign-out"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                    else
                    {
                ?>
                    <div class="col-md-7 col-xs-12 col-sm-4 text-center"> 
            
                        <div class="AlwasysBottom">
                           <marquee class="MarqueeId" onload="this.start();" onmouseover="this.stop();" onmouseout="this.start();" truespeed="truespeed" scrollamount="1" class="ticker_txt1" scrolldelay="20" direction="left" loop="repeat">Economically Broken!! Financially Tensed?? Come to us...</marquee>
                           <p class="ticker_txt1 Marquee">Economically Broken!! Financially Tensed?? Come to us...</p>
                        </div>
            
                    </div>

                    <div class="col-md-3 col-xs-5 col-sm-8">
            
                        <div class="buttonPanel text-right"> 
            
                            <a href="<?= base_url();?>login" class="btn darkGreyBtn red-bg-btn back_color">
                                <i class="fa fa-sign-in"></i> LOGIN
                            </a> 
                     
                            <a href="<?= base_url();?>register" class="btn darkGreyBtn red-bg-btn back_color">
                                <i class="fa fa-user"></i> REGISTER
                            </a>
            
                        </div>
                    </div>
                <?php
                    }
                ?>        
            </div>
            <!-- hidden lg -->
            <div class="row hidden-lg">

                <?php
                    if(isset($_SESSION['user']))
                    {
                    // select loggedin users detail
                    $res=$conn->query("SELECT * FROM login WHERE id=".$_SESSION['user']);
                    $userRow=mysqli_fetch_array($res);
                ?>
                    <div class="col-md-8 col-xs-12 col-sm-4 text-center"> 
            
                        <div class="AlwasysBottom">
                           <marquee onload="this.start();" onmouseover="this.stop();" onmouseout="this.start();" truespeed="truespeed" scrollamount="1" class="ticker_txt1" scrolldelay="20" direction="left" loop="repeat">Economically Broken!! Financially Tensed?? Come to us...</marquee>
                        </div>
            
                    </div>
                    <?php
                        }
                        else
                        {
                    ?>

                    <div class="col-md-7 col-xs-12 col-sm-4 text-center"> 
            
                        <div class="AlwasysBottom">
                            <marquee onload="this.start();" onmouseover="this.stop();" onmouseout="this.start();" truespeed="truespeed" scrollamount="1" class="ticker_txt1" scrolldelay="20" direction="left" loop="repeat">Economically Broken!! Financially Tensed?? Come to us...</marquee>
                        </div>
            
                    </div>
                <?php
                    }
                ?>  
                <div class="col-md-2 col-xs-6 col-sm-4"> 
        
                    <a class="Logo" href="<?= base_url();?>">
                        <img alt="logo" src="<?= base_url();?>frontend_assets/images/logo.png">
                    </a> 
        
                </div>      
            </div>
        </div>
    </div>
  
<div class="container"> 
    <!-- Static navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top logo_back" role="navigation">
       <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <?php
                    if(isset($_SESSION['user']))
                    {
                    // select loggedin users detail
                    $res=$conn->query("SELECT * FROM login WHERE id=".$_SESSION['user']);
                    $userRow=mysqli_fetch_array($res);
                ?>
                <div class="dropdown buttonPanel text-left  hidden-lg" style="margin-top: 0px!important;float: left;"> 
                    <a href="javascript:void(0)" class="dropbtn btn darkGreyBtn red-bg-btn back_color">
                        My Account
                    </a> 
                    <div class="dropdown-content">
                        <!-- <a href="#">My Profile</a> -->
                        <a href="javascript:void(0)">
                            <i class="fa fa-user"></i> <?= $userRow['name'];?>
                        </a>
                        <?php
                            if($_SESSION['user']==1)
                            {
                        ?>
                        <a href="<?= base_url();?>includes/admin_home"><i class="fa fa-dashboard"></i> Dashboard</a>
                        <?php
                            }
                            else
                            {
                        ?>
                        <a href="<?= base_url();?>includes/user_home"><i class="fa fa-dashboard"></i> Dashboard</a>
                        <?php
                            }
                        ?>
                        <a href="<?= base_url();?>logout.php?logout"><i class="fa fa-sign-out"></i> Logout</a>
                    </div>
                </div>
                <?php
                    }
                    else
                    {
                ?>
                <div class="buttonPanel text-left  hidden-lg" style="margin-top: 0px!important;float: left;"> 
    
                    <a href="<?= base_url();?>login" class="btn darkGreyBtn red-bg-btn back_color">
                        <i class="fa fa-sign-in"></i> LOGIN
                    </a> 
             
                    <a href="<?= base_url();?>register" class="btn darkGreyBtn red-bg-btn back_color">
                        <i class="fa fa-user"></i> REGISTER
                    </a>
    
                </div>
                <?php
                    }
                ?>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
                    <span class="sr-only">Toggle navigation</span> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> 
                </button>
            </div>

     
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="<?= base_url();?>">Home</a></li>
                    
                    <?php 
                        $sql=$conn->query("select * from courses limit 0,5");
                        while($row=mysqli_fetch_array($sql))
                        {
                        $id = $row['id'];
                            
                    ?>
                        <li>

                            <a href="javascript:;"><?= $row['name'];?> <span class="caret"></span></a>
 
                            <ul class="dropdown-menu">
                                <?php 
                                    $sql1=$conn->query("select * from course1 where course_id=$id");
                                    while($row1=mysqli_fetch_array($sql1))
                                    {
                                ?>
                                
                                    <li> 
                                    <?php
                                        if($row1['id']==18){
                                    ?>
                                        <a href="https://health.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                                            <?= $row1['name'];?>
                                        </a>
                                    <?php
                                        }
                                        elseif($row1['id']==19){
                                    ?>
                                        <a href="https://termlife.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                                            <?= $row1['name'];?>
                                        </a>
                                    <?php
                                        }
                                        elseif($row1['id']==26){
                                    ?>
                                        <a href="https://travel.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                                            <?= $row1['name'];?>
                                        </a>
                                    <?php
                                        }
                                        elseif($row1['id']==27){
                                    ?>
                                        <a href="http://sme.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                                            <?= $row1['name'];?>
                                        </a>    
                                    <?php
                                        }
                                        if($row1['id']==28){
                                    ?>
                                        <a href="http://home.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                                            <?= $row1['name'];?>
                                        </a> 
 
                                    <?php
                                        }
                                        elseif($row1['id']==51){
                                    ?>
                                        <a href="https://twowheeler.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                                            <?= $row1['name'];?>
                                        </a>
                                    <?php
                                        }
                                        elseif($row1['id']==53){
                                    ?>
                                        <a href="https://ci.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                                            <?= $row1['name'];?>
                                        </a>
                                    <?php
                                        }
                                        elseif($row1['id']==54){
                                    ?>
                                        <a href="http://cancerinsurance.policybazaar.com/ci?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                                            <?= $row1['name'];?>
                                        </a>
                                    <?php
                                        }
                                        elseif($row1['id']!=18 && $row1['id']!=19 && $row1['id']!=26 && $row1['id']!=27 && $row1['id']!=28 && $row1['id']!=51 && $row1['id']!=53 && $row1['id']!=54)
                                        {
                                    ?>
                                        <a href="<?= base_url();?>product/<?= $row1['metatitle'];?>">
                                            <?= $row1['name'];?>
                                        </a>
                                    <?php
                                        }
                                    ?>

                                    <!--    <ul class="dropdown-menu">
                                        <?php 
                                            $sql_course=$conn->query("select * from sub_course where sub_course_id=$course_id");
                                            while($row_course=mysqli_fetch_array($sql_course))
                                            {
                                        ?>
                                            <li style="background: #fff;"> 
                                                <a href="javascript:;"><?= $row_course['name'];?></a> 
                                            </li>
                                        <?php
                                            }
                                        ?>
                                        </ul> -->

                                    </li>
                                <?php
                                    }
                                ?>   
                            </ul>
                        </li>
                    <?php
                        }
                    ?>
                    <li><a href="#">Career <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <li><a href="<?= base_url();?>job">Jobs</a></li>
                            <li><a href="<?= base_url();?>channel_partner">Channel Partner</a></li>
                            <li><a href="<?= base_url();?>franchise">Franchise</a></li>
                        
                        </ul>
                    </li>
                       
                    <li><a href="<?= base_url();?>blog">Blogs</a></li>

                    <li><a href="<?= base_url();?>aboutus">About Us</a></li>

                    <li><a href="<?= base_url();?>contactus">Contact Us</a></li>
                </ul>
           </div>
     
          <!--/.nav-collapse --> 
     
        </div>
    </nav>

</div>
  <!-- /.container --> 