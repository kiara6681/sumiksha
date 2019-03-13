<?php include('header.php');?>
<style type="text/css">
    .channel ul{
        padding-left: 40px;
    }    
    .channel ul li{
        list-style-type: disc;
    }
</style>
<section class="gredientPattern container-fluid" style="padding-top: 110px;">
    <div class="pageSection row magic-3">      
        <img src="<?= base_url();?>assets/img/FRANCHISE.jpg" alt="" class="img-responsive"> 
    </div>
</section>
<section class="section-side-image clearfix">
    <div class="container">
        <div class="row">
            <!--end left column-->
            <?php 
                $row1=$conn->query("select * from aboutus limit 5,1");
                $sql1=mysqli_fetch_array($row1);
            ?>
            <div class="col-md-12 col-sm-12 col-xs-12 bmargin channel"> 
              
                <h3 class="text-left" style="color: #000;font-weight: 600;"><?= $sql1['name'];?></h3>
                <?= $sql1['about_content'];?>

            </div>
            <br>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <a href="<?= base_url();?>register" class="btn darkGreyBtn red-bg-btn back_color" style="margin-bottom: 10px; margin-top: 20px;">Apply Now</a> 
            <br>
            </div>
            <!--end right column--> 
        </div>
    </div>
</section>
<?php include('footer.php');?>