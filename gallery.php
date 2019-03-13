<?php include('header.php');?>
<style>
    .bmargin {
        margin-bottom: 20px;
    }
</style>
<section class="gredientPattern container-fluid" style="padding-top: 110px;margin-bottom: 30px;">
<!-- <div class="bgtrans"></div> -->
    <div class="pageSection row magic-3">
        <img src="<?= $urlset;?>images/gallery.jpg" class="img-responsive">
    </div>
</section>
<section class="section-side-image clearfix">
    <div class="container">
        <div class="row">
        <?php 
            $row1=$conn->query("select * from gallery1 where gallery_id='16'");
            while($sql1=mysqli_fetch_array($row1))
            {
        ?>
            <div class="col-md-3 col-sm-3 col-xs-12 bmargin"> 
              
                <div class="cbp-item-wrapper"> 
                    <a href="<?= $urlset;?>manage/uploads/gallery/<?php echo $sql1['image'];?>" class="cbp-caption cbp-lightbox" data-title="APTUS Star Awards - 2017 ">
                        <div class="cbp-caption-defaultWrap"> 
                            <img src="<?= $urlset;?>manage/uploads/gallery/<?php echo $sql1['image'];?>" alt="" class="img-responsive"> 
                        </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignLeft">
                                <div class="cbp-l-caption-body">
                                    <div class="cbp-l-caption-title"><?php echo $sql1['name'];?></div>
                                </div>
                            </div>
                        </div>
                    </a> 
                </div>

            </div>
        <?php
            }
        ?>
            <!--end right column--> 
        </div>
    </div>
</section>
<?php include('footer.php');?>