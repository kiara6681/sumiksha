<?php include('header.php');?>
<?php 
    $row=$conn->query("select * from course1 where course_id='8'");
    $sql=mysqli_fetch_array($row);
?>
<section class="gredientPattern container-fluid" style="padding-top: 110px;">
    <div class="pageSection row magic-3">      
        <img src="<?= base_url();?>admin_dashboard/uploads/courses/<?= $sql['image'];?>" alt="" class="img-responsive"> 
    </div>
</section>
<section class="section-side-image clearfix">
    <div class="container">
        <?php 
            $row1=$conn->query("select * from course1 where course_id='8'");
            while($sql1=mysqli_fetch_array($row1))
            {
        ?>
        <div class="row">
            <!--end left column-->
            <div class="col-md-12 col-sm-12 col-xs-12 bmargin"> 
              
                <h4 class="text-left" style="color: #000;font-weight: 600;"><?= $sql1['name'];?></h4>
                <div style="min-height: 100px;overflow: hidden;"><?= $sql1['description'];?></div>
                <a href="<?= base_url();?>product/<?= $sql1['metatitle'];?>" class="btn darkGreyBtn red-bg-btn back_color" style="color: #fff;">Ream More</a>
            </div>
            <!--end right column--> 
        </div>
        <hr>
        <?php
            }
        ?>
    </div>
</section>
<?php include('footer.php');?>