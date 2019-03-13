<?php include('header.php');?>
<?php //include('banner.php');?>

<style>
    .pd_name{
        color: #fff;
    }
    .gredientPattern .bgtrans {
        background: #4786d2;
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: .5;
    }
    .fa-trademark:before {
        content: "\f25c";
    }
    .col-xs-5ths,
    .col-sm-5ths,
    .col-md-5ths,
    .col-lg-5ths {
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }

    .col-xs-5ths {
        width: 20%;
        float: left;
    }

    @media (max-width: 768px) {
        .col-sm-5ths {
            width: 20%;
            float: left;
        }
        .carousel-indicators{
            left: 30%!important;
            width: 100%!important;
            position: relative;
        }
        .modal-dialog{
            width: 300px;
        }
    }

    @media (min-width: 992px) {
        .col-md-5ths {
            width: 20%;
            float: left;
        }

    }

    @media (min-width: 1200px) {
        .col-lg-5ths {
            width: 20%;
            float: left;
        }
    }
    .card {
        position: relative;
        display: block;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        border-radius: .25rem;
    }
    .mbr-plan {
        background: none;
        border-radius: 0;
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #fff;
        margin-bottom: 0;
        padding: 0.625rem;
    }
    .bg-primary {
        background-color: #c0a375 !important;
    }
    .text-xs-center {
        text-align: center!important;
    }

    .mbr-plan-header {
        padding-bottom: 3.4375rem;
        padding-top: 2.1875rem;
        position: relative;
    }
    .mbr-plan-header, .mbr-plan-body {
        background: rgba(33, 150, 243, 0.45);
    }
    .card-block {
        padding: 2rem;
    }
    .mbr-plan .card-title {
        margin-bottom: 1.5625rem;
    }
    .mbr-plan-title {
        font-size: 1.9375rem;
        font-weight: 700;
        line-height: 1.28;
        margin-bottom: 0;
        color: #fff;
    }
    .mbr-plan-subtitle, .mbr-plan-price-desc {
        font-family: 'Lora', serif;
    }
    .mbr-plan .card-title {
        margin-bottom: 2.5625rem;
    }
    .mbr-price-figure {
        font-size: 30px;
    }
    .mbr-plan-price-desc {
        display: block;
        padding-top: 1.25rem;
    }
    .mbr-plan-subtitle, .mbr-plan-price-desc {
        color: #a0a0a0;
        font-family: "Lora";
        font-size: 1.675rem;
        font-style: italic;
        font-weight: 400;
        line-height: 1.79;
    }
    .mbr-plan-header.bg-primary .mbr-plan-subtitle, .mbr-plan-header.bg-primary .mbr-plan-price-desc {
        color: #e8ddcd;
    }
    .mbr-plan-body {
        margin-top: 2px;
        padding-bottom: 0;
        padding-top: 2.5rem;
    }
    .mbr-plan-list {
        padding-bottom: 4.0625rem;
        padding-top: 1.5625rem;
    }
    .list-group {
        padding-left: 0;
        margin-bottom: 0;
    }
    .mbr-plan .list-group-item {
        background: none;
        border-bottom: 0;
        border-top: 1px dotted rgba(255, 255, 255, 0.2);
        font-size: 1.275rem;
        line-height: 3.125rem;
        padding-bottom: 0;
        padding-top: 0;
    }
    .list-group-flush .list-group-item {
        border-width: 1px 0;
        border-radius: 0;
    }
    .list-group-item {
        position: relative;
        display: block;
        padding: .75rem 1.25rem;
        margin-bottom: -1px;
        background-color: #fff;
        border: 1px solid #ddd;
    }
    .mbr-price-value {
        font-size: 1.875rem;
        line-height: 1;
        position: relative;
        top: -1.25rem;
    }
    .mbr-plan-label {
        background: #28262b;
        color: #fff;
        display: block;
        font-size: 1.1875rem;
        font-weight: 400;
        height: 3.125rem;
        line-height: 3.125rem;
        min-width: 3.125rem;
        padding: 0 0.75rem;
        position: absolute;
        right: 0;
        top: 0;
    }
    .compy{
        border: 1px solid #afabab;
        text-align: -webkit-center;
        background: #fff;
    }
.modal-header{
    min-height: 0.43px;
}
#newsletter 
{
    opacity:1;
    z-index:99999;
    background: rgba(6, 6, 6, 0.64);
}
#newsletter  h3
{
    text-align:center;
    padding:0px 15px;
}
#newsletter  p
{
    text-align:center;
    padding:0px 15px;
}
#newsletter  button
{
    padding:8px 20px;
    background:#000000;
    border:1px solid #000000;
    color:#ffffff;
}
#newsletter .form-group
{
    margin-top:15px;
    padding:0px 15px;
}
#newsletter .form-group label
{
    width:100%;
}
#newsletter .form-group .form-control
{
    width:80%;
    height:42px;
    border-radius:0px;
    font-size:15px;
    margin-bottom:10px;
    
}
#newsletter .modal-dialog {
    -webkit-transition: -webkit-transform .3s ease-out;
    -o-transition: -o-transform .3s ease-out;
    transition: transform .3s ease-out;
    -webkit-transform: translate(0,5%);
    -ms-transform: translate(0,5%);
    -o-transform: translate(0,5%);
    transform: translate(0,5%);
}
#newsletter .modal-header
{
    padding:0px 10px;
    border:0px;
}
.modal-header .close 
{
    margin-top: -2px;
    margin-right: -8px;
    font-size: 30px;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    filter: alpha(opacity=20);
    opacity: .5;
    position: absolute;
    right:10px;
    cursor:pointer;
    z-index:9999;
}
.modal-header .close:hover 
{
    opacity: 1;
}
#newsletter .modal-body
{
    padding: 0px;
}
</style>
<?php 
    $date = date('m/d/Y');
    $sql_cmp = $conn->query("SELECT * FROM offers WHERE start_date <= '$date' AND end_date >= '$date' order by id desc limit 0,1");
    $data_cmp=mysqli_fetch_array($sql_cmp);
    if(!empty($data_cmp))
    {
?>
<script type="text/javascript">
    function showModal()
    {
        $("#newsletter").show();
    }
    function hideModal()
    {
        $("#newsletter").hide();
    }
</script>
<?php
    }
?>
<div id="newsletter" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content">

            <div class="modal-header">
                <a  class="close" data-dismiss="modal" onClick="hideModal();">&times;</a>
            </div>

            <div class="modal-body">

                <img src="<?= base_url();?>frontend_assets/images/offer.jpg" class="img-responsive">
                <h4 class="text-center"><span style="color: red"><?= $data_cmp['offer_name'];?></span></h4>
                <p><?= $data_cmp['offer_des'];?></p>
            </div>

        </div>

    </div>

</div>  

<script src="<?= base_url();?>frontend_assets/js/jquery.smooth-scroll.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url();?>frontend_assets/css/ohover.css"/>
<!-- <link rel="stylesheet" type="text/css" href="css/main.css"/> -->
<section class="gredientPattern container-fluid">
<!-- <div class="bgtrans"></div> -->
    <div class="pageSection linePattern row magic-3">
    
        <div class="container text-center">

            <div class="row loanEmiForm">
                <?php 
                    $i=10;
                    $sql=$conn->query("select * from course1 where sort_by != '' order by sort_by + 0 ASC limit 0,9");
                    while($row=mysqli_fetch_array($sql))
                    {
               ?>

                    <div class="col-xs-5ths col-lg-5ths col-md-5ths col-sm-5ths testimonialMobilelBlk item-hover circle colored effect6 scale_down_up">
                        <?php
                            if($row['id']==19){
                        ?>
                        <a href="https://termlife.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                            <div class="img">
                                <img src="<?= base_url();?>admin_dashboard/uploads/icon/<?= $row['icon'];?>" style="width: 75px;height: 75px;margin-top: 30px;">
                                <!-- <i class="" id="fa_<?= $i;?>" style="font-size: 70px;padding-top: 20px;color: #fff;" aria-hidden="true"></i> -->
                            </div>
                            <div class="info">
                                <h3><?= $row['name'];?></h3>
                            </div>
                        </a>
                        <?php
                            }
                            elseif($row['id']==18){
                        ?>
                        <a href="https://health.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                            <div class="img">
                                <img src="<?= base_url();?>admin_dashboard/uploads/icon/<?= $row['icon'];?>" style="width: 75px;height: 75px;margin-top: 30px;">
                                <!-- <i class="" id="fa_<?= $i;?>" style="font-size: 70px;padding-top: 20px;color: #fff;" aria-hidden="true"></i> -->
                            </div>
                            <div class="info">
                                <h3><?= $row['name'];?></h3>
                            </div>
                        </a>
                        <?php
                            }
                            elseif($row['id']==53){
                        ?>
                        <a href="https://ci.policybazaar.com/?utm_source=OfflineAffiliate&utm_term=ADCA10942&utm_medium=ADCA10942&utm_campaign=ADRM264">
                            <div class="img">
                                <img src="<?= base_url();?>admin_dashboard/uploads/icon/<?= $row['icon'];?>" style="width: 75px;height: 75px;margin-top: 30px;">
                                <!-- <i class="" id="fa_<?= $i;?>" style="font-size: 70px;padding-top: 20px;color: #fff;" aria-hidden="true"></i> -->
                            </div>
                            <div class="info">
                                <h3><?= $row['name'];?></h3>
                            </div>
                        </a>
                        <?php
                            }
                            else{
                        ?>
                        <a href="<?= base_url();?>product/<?= $row['metatitle'];?>">
                            <div class="img">
                                <img src="<?= base_url();?>admin_dashboard/uploads/icon/<?= $row['icon'];?>" style="width: 75px;height: 75px;margin-top: 30px;">
                                <!-- <i class="" id="fa_<?= $i;?>" style="font-size: 70px;padding-top: 20px;color: #fff;" aria-hidden="true"></i> -->
                            </div>
                            <div class="info">
                                <h3><?= $row['name'];?></h3>
                            </div>
                        </a>
                        <?php
                            }
                        ?>
                        
                    </div>

                <?php
                    $i++;
                }
                ?>
                <div class="col-xs-5ths col-lg-5ths col-md-5ths col-sm-5ths testimonialMobilelBlk item-hover circle colored effect6 scale_down_up">
                    <a href="<?= base_url();?>credit_card">
                        <div class="img">
                            <img src="<?= base_url();?>frontend_assets/images/credit-card.png" style="width: 75px;height: 75px;margin-top: 30px;">
                        </div>
                        <div class="info">
                            <h3>Credit Card</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
 
    </div>
 
</section>
<section class="magic-1 section" style="background: linear-gradient(#B24592,#F15F79);">
    <?php 
        $row1=$conn->query("select * from aboutus limit 0,1");
        $sql1=mysqli_fetch_array($row1);
    ?>
    <div class="container aboutUs" id="">
        <h2 class="text-center" style="color:#fff;"><?= $sql1['name'];?></h2>
        <div style="color:#fff;"><?= $sql1['about_content'];?></div>
    </div>
 
</section>
<section class="clearfix text-center section" style="background: linear-gradient(to right, rgb(19, 106, 138), rgb(38, 120, 113));">
    <h2 style="color:#fff;">How to Get Loan</h2>
    <!-- <h5>Sumiksha makes entire borrowing process simple and user friendly<br> You can get your loan funded in as little as 48 hours</h5> -->
    <div class="container aboutUs">
        <img src="<?= base_url();?>frontend_assets/images/blue.png" style="margin: 50px 0px;">
    </div>
 
</section>
<section class="clearfix text-center section" style="background: linear-gradient(to right, rgb(211, 131, 18), rgb(168, 50, 121));">
    <h2 style="color:#fff;">How to Get Credit Card</h2>
    <!-- <h5>Sumiksha makes entire borrowing process simple and user friendly<br> You can get your loan funded in as little as 48 hours</h5> -->
    <div class="container aboutUs">
        <img src="<?= base_url();?>frontend_assets/images/orange.png" style="margin: 50px 0px;">
    </div>
 
</section>
<section class="clearfix text-center section" style="background: linear-gradient(to right, rgb(157, 80, 187), rgb(110, 72, 170));">
    <h2 style="color:#fff;">How to Get Insurance</h2>
    <!-- <h5>Sumiksha makes entire borrowing process simple and user friendly<br> You can get your loan funded in as little as 48 hours</h5> -->
    <div class="container aboutUs">
        <img src="<?= base_url();?>frontend_assets/images/blue.png" style="margin: 50px 0px;">
    </div>
 
</section>
<section class="clearfix text-center section" style="background-image: linear-gradient(145deg,#f4a22b,#f34b6b);">
    <h3 class="" style="color: #fff;font-weight: 600;">Bored with old type Investment plans?? Choose us</h3>
    <div class="container aboutUs choose">
        <div class="col-lg-4">
            <i class="fa fa-creative-commons" aria-hidden="true"></i>
            <h5>To making better wealth creation.</h5>
        </div>        
        <div class="col-lg-4">
            <i class="fa fa-file-image-o" aria-hidden="true"></i>
            <h5>To make your portfolio stronger.</h5>
        </div>        
        <div class="col-lg-4">
            <i class="fa fa-star-o" aria-hidden="true"></i>
            <h5>Be a smart Investment achiever.</h5>
        </div>
    </div>
 
</section>
<section class="clearfix text-center section" style="background: linear-gradient(to right, rgb(0, 210, 255), rgb(58, 123, 213));">
    <h3 class="" style="color: #fff;font-weight: 600;">Customer Reviews</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-12" data-wow-delay="0.2s">
                <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                    <!-- Bottom Carousel Indicators -->
                    <ol class="carousel-indicators">
                        <?php
                            $i=0;
                            $row1=$conn->query("select * from facilities order by id desc");
                            while($sql1=mysqli_fetch_array($row1))
                            {
                                if($i==0)
                                {
                        ?>
                        <li data-target="#quote-carousel" data-slide-to="<?= $i;?>" class="active">
                            <img class="img-responsive " src="<?= base_url();?>admin_dashboard/uploads/facilities/<?= $sql1['image'];?>" alt="">
                        </li>
                        <?php
                                }
                                else
                                {
                        ?>
                        <li data-target="#quote-carousel" data-slide-to="<?= $i;?>">
                            <img class="img-responsive" src="<?= base_url();?>admin_dashboard/uploads/facilities/<?= $sql1['image'];?>" alt="">
                        </li>
                        <?php
                                }
                            $i++;}
                        ?>
                    </ol>

                    <!-- Carousel Slides / Quotes -->
                    <div class="carousel-inner text-center">
                        <?php
                            $i=0;
                            $row1=$conn->query("select * from facilities order by id desc");
                            while($sql1=mysqli_fetch_array($row1))
                            {
                                if($i==0)
                                {
                        ?>
                        <!-- Quote 1 -->
                        <div class="item active">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <p><?= $sql1['description'];?></p>
                                        <small><?= $sql1['name'];?></small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <?php
                                }
                                else
                                {
                        ?>
                        <!-- Quote 1 -->
                        <div class="item">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">

                                        <p><?= $sql1['description'];?></p>
                                        <small><?= $sql1['name'];?></small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <?php
                                }
                            $i++;}
                        ?>
                    </div>

                    <!-- Carousel Buttons Next/Prev -->
                    <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                    <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="clearfix section" style="background: linear-gradient(to right, rgb(248, 87, 166), rgb(255, 88, 88));">

    <h3 class="text-center" style="color: #fff;font-weight: 600;">Our Partners</h3>

    <div class="magic-4">
        <?php 
            $row1=$conn->query("select * from gallery1");
            while($sql1=mysqli_fetch_array($row1))
            {
        ?>
        <div class="pageSection branchPage col-md-2 col-xs-6">
            <div class="compy">
                <img src="<?= base_url();?>admin_dashboard/uploads/gallery/<?= $sql1['image'];?>">
            </div>
        </div> 
        <?php
            }
        ?>       
    </div>
 </section>

<?php include('footer.php');?>