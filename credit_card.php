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
<br>
<section class="section-side-image clearfix">
    <div class="container">
        <div class="row">
            <!--end left column-->
        <?php 
            $row1=$conn->query("select * from course1 where course_id='8'");
            while($sql1=mysqli_fetch_array($row1))
            {
        ?>
            <div class="col-md-2 col-sm-6 col-xs-6 bmargin"> 
                <a href="<?= base_url();?>product/<?= $sql1['metatitle'];?>">
                    <div style="border: 1px solid #eaeaea;text-align: -webkit-center;margin-bottom: 20px;">
                        <img src="<?= base_url();?>admin_dashboard/uploads/icon/<?= $sql1['icon'];?>" class="img-responsive" style="width:100px;">
                        <h5 style="color: #000;font-weight: 600;"><?= $sql1['name'];?></h5>
                    </div>
                </a>
            </div>
        <?php
            }
        ?>
            <!--end right column--> 
        </div>
        <hr>
    </div>
</section>
<?php include('footer.php');?>