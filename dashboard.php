<?php include('header.php');

    // if session is not set this will redirect to login page
    if( !isset($_SESSION['kU7s']) ) {
        header("Location: index.php");
        exit;
    }
?>
<style>
    .contact{
        background: #003399;
        padding: 40px;
    }
    .contact h4{
        color:#fff!important;
    }    
    .contact p{
        color:#fff!important;
    }   
     .contact span{
        color:#fff!important;
    }    
    .contact a{
        color:#fff!important;
    }
    .smart-forms .btn-primary.orange-2{
        background: linear-gradient(to left, rgb(255, 102, 0) 0%, rgb(0, 51, 153) 80%)
    }
</style>
<section class="gredientPattern container-fluid" style="padding-top: 110px;">
<!-- <div class="bgtrans"></div> -->
    <div class="pageSection row magic-3">
        <img src="<?= $urlset;?>images/contact-us.jpg" class="img-responsive">
    </div>
</section>
<?php include('footer.php');?>