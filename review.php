<?php include('header.php');?>
<?php
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $actual_link1 = explode("/", $actual_link);

    $id=$actual_link1[4];
   // $id=$_REQUEST['metatitle'];
    $amit=$conn->query("select * from facilities where metatitle='$id'");
    $sql1=mysqli_fetch_array($amit);
?>
<style>
    .bmargin {
        margin-bottom: 20px;
    }
    .blog li{
        list-style-type: disc;
        margin-left: 15px;
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

        <div class="col-md-4 col-sm-4 col-xs-12 bmargin"> 
          
            <div class="cbp-item-wrapper"> 
                <div class="cbp-caption-defaultWrap"> 
                    <img src="<?= $urlset;?>manage/uploads/facilities/<?php echo $sql1['image'];?>" alt="" class="img-responsive" style="width: 100%;height: 250px;"> 
                </div>
            </div>

        </div>
        <!--end left column-->

        <div class="col-md-8 col-sm-12 col-xs-12 bmargin blog"> 
          
            <h3><?= $sql1['name'];?></h3>
            <?= $sql1['description'];?>

        </div>
        <!--end right column--> 
        
      </div>
    </div>
</section>

<?php include('footer.php');?>