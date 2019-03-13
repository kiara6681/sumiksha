<?php include('header.php');?>
<section>
    <div class="header-inner two">      
        <img src="<?= $urlset;?>images/blog/header-img-01.jpg" alt="" class="img-responsive"> 
    </div>
</section>
<section class="section-side-image clearfix">
    <div class="container">
      <div class="row">
       <div class="col-xs-12 text-center">
          <h2 class="uppercase section-title">  </h2>
            <p class="sub-title"></p>
        </div>
        <div class="col-md-2 col-sm-12 col-xs-12 bmargin">
          <div class="col-md-12 col-sm-12 col-xs-12 nopadding bmargin">
            <h3>About Us</h3>        
            <ul class="category-links orange-2">
            
                <li> <a href="<?= $urlset;?>aboutus">About Us</a> </li>
                <li> <a class="active"href="<?= $urlset;?>why-us">Why Us</a> </li>
            </ul>
          </div>                
        </div>
        <!--end left column-->
        <?php 
            $row1=$conn->query("select * from aboutus limit 1,1");
            $sql1=mysqli_fetch_array($row1);
        ?>
        <div class="col-md-10 col-sm-12 col-xs-12 bmargin"> 
          
            <!-- <img src="<?= $urlset;?>manage/uploads/products/<?= $sql1['image'];?>" alt="" class="img-responsive"> <br> -->
            <h3>Why Us</h3>
            <?= $sql1['about_content'];?>

        </div>
        <!--end right column--> 
        
      </div>
    </div>
  </section>
<?php include('footer.php');?>