<?php include('header.php');?>
<section class="gredientPattern container-fluid" style="padding-top: 110px;">
    <div class="pageSection row magic-3">      
        <img src="<?= base_url();?>assets/img/ABOUT-US.jpg" alt="" class="img-responsive"> 
    </div>
</section>
<section class="section-side-image clearfix">
    <div class="container">
        <div class="row">
            <!--end left column-->
            <?php 
                $row1=$conn->query("select * from aboutus limit 0,1");
                $sql1=mysqli_fetch_array($row1);
            ?>
            <div class="col-md-12 col-sm-12 col-xs-12 bmargin"> 
              
                <h3 class="text-left" style="color: #000;font-weight: 600;">About Us</h3>
                <?= $sql1['about_content'];?>

            </div>
            <!--end right column--> 
        </div>
    </div>
</section>
<?php include('footer.php');?>