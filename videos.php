<?php include('header.php');?>
<style>
    .bmargin {
        margin-bottom: 20px;
    }
</style>
<section>
    <div class="header-inner two">      
        <img src="<?= $urlset;?>images/blog/header-img-01.jpg" alt="" class="img-responsive"> 
    </div>
</section>
<section class="section-side-image clearfix">
    <div class="container">
        <div class="row">
        <?php 
            $row1=$conn->query("select * from gallery1 where gallery_id='20'");
            while($sql1=mysqli_fetch_array($row1))
            {
        ?>
            <div class="col-md-3 col-sm-3 col-xs-12 bmargin"> 
              
                <div class="cbp-item-wrapper"> 
                    <div class="cbp-caption-defaultWrap"> 
                         <iframe width="100%" height="200" src="<?= $sql1['image']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> 
                    </div>
                    <div class="cbp-caption-activeWrap">
                        <div class="cbp-l-caption-alignLeft">
                            <div class="cbp-l-caption-body">
                                <div class="cbp-l-caption-title"><?php echo $sql1['name'];?></div>
                            </div>
                        </div>
                    </div>
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