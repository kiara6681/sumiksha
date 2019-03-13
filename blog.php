<?php include('header.php');?>
<?php
    if(isset($_REQUEST['metatitle']))
    {
        $id = $_REQUEST['metatitle'];
    }

    $sql1=$conn->query("select * from news_events where metatitle='$id'");
    $row1=mysqli_fetch_array($sql1);

    $course_id = $row1['id'];
?>
<style>
    .bmargin {
        margin-bottom: 20px;
    }
</style>
<section class="gredientPattern container-fluid" style="padding-top: 110px;margin-bottom: 30px;">
<!-- <div class="bgtrans"></div> -->
    <div class="pageSection row magic-3">
        <img src="<?= base_url();?>assets/img/BLOGS.jpg" alt="" class="img-responsive"> 
    </div>
</section>
<?php
    if(!empty($course_id))
    {
?>
<section class="section-side-image clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12 bmargin"> 

                <article>
                    <a href="javascript:;" title="<?php echo $row1['name'];?>">
                        <img src="<?= base_url();?>admin_dashboard/uploads/news_events/<?php echo $row1['image'];?>" alt="" class="img-responsive"> 
                        <h4><?php echo $row1['name'];?></h4>
                    </a> 
                    <span class="date" style="margin-right: 10px;color: #f0630a;"><i class="fa fa-clock-o"></i>
                        <a href="javascript:;" title="11:10 am" rel="bookmark" style="color: #f0630a;">
                            <?php
                                $dat=$row1['start_date'];
                                $datt=explode("-",$dat);
                                $yrdata= strtotime($dat);
                                $date = date('M, Y', $yrdata);
                            ?>
                            <time itemprop="datePublished" datetime="2018-06-02T11:10:50+00:00"><?= $datt[2];?> <?= $date;?></time>
                        </a>
                    </span>
                    <span itemprop="author" style="margin-right: 10px;color: #f0630a;"><i class="fa fa-user"></i>
                        <span class="author">
                            <a href="javascript:;" title="View all posts by Mani" style="color: #f0630a;">
                                <?php
                                    if($row1['owner'])
                                    {
                                ?>
                                    <?= $row1['owner'];?>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                    Admin
                                <?php
                                    }
                                ?>                           
                            </a>
                        </span>
                    </span>
                    <span class="comments" itemprop="interactionCount" style="margin-right: 10px;color: #f0630a;"> <i class="fa fa-comment"></i>
                        <a href="javascript:;" title="0 Comments" rel="comments" style="color: #f0630a;">0 Comments</a>
                    </span>

                    <div style="text-align: justify">
                        <?php echo $row1['description'];?>
                    </div>

                </article>

            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 bmargin"> 
                <aside id="recent-posts-2" class="widget widget_recent_entries">                            
                    <h3 class="widget-title heading" itemprop="about" style="margin-top: 0px;">Recent Posts</h3>     
                    <ul>
                    <?php
                        $i=1;
                        $sql=$conn->query("select * from news_events order by id desc");
                        while($row=mysqli_fetch_array($sql))
                        {                   
                    ?>
                        <li>
                            <a href="<?= $urlset;?>blog/<?= $row['metatitle'];?>">
                               <i class="fa fa-arrow-right"></i> <?= $row['name'];?>
                            </a>
                        </li>
                    <?php
                        }
                    ?>
                    </ul>
                </aside> 
            </div>
            <!--end right column--> 
        </div>
    </div>
</section>
<?php
    }
    else
    {
?>
<section class="section-side-image clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12 bmargin"> 
                <?php 
                    $row1=$conn->query("select * from news_events order by id desc");
                    while($sql1=mysqli_fetch_array($row1))
                    {
                ?>
                <article>
                    <a href="<?= base_url();?>blog/<?= $sql1['metatitle'];?>" title="<?php echo $sql1['name'];?>">
                        <img src="<?= base_url();?>admin_dashboard/uploads/news_events/<?php echo $sql1['image'];?>" alt="" class="img-responsive"> 
                        <h4><?php echo $sql1['name'];?></h4>
                    </a> 
                    <span class="date" style="margin-right: 10px;color: #f0630a;"><i class="fa fa-clock-o"></i>
                        <a href="<?= base_url();?>blog/<?= $sql1['metatitle'];?>" title="11:10 am" rel="bookmark" style="color: #f0630a;">
                            <?php
                                $dat=$sql1['start_date'];
                                $datt=explode("-",$dat);
                                $yrdata= strtotime($dat);
                                $date = date('M, Y', $yrdata);
                            ?>
                            <time itemprop="datePublished" datetime="2018-06-02T11:10:50+00:00"><?= $datt[2];?> <?= $date;?></time>
                        </a>
                    </span>
                    <span itemprop="author" style="margin-right: 10px;color: #f0630a;"><i class="fa fa-user"></i>
                        <span class="author">
                            <a href="<?= base_url();?>blog/<?= $sql1['metatitle'];?>" title="View all posts by Mani" style="color: #f0630a;">
                                <?php
                                    if($sql1['owner'])
                                    {
                                ?>
                                    <?= $sql1['owner'];?>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                    Admin
                                <?php
                                    }
                                ?>                           
                            </a>
                        </span>
                    </span>
                    <span class="comments" itemprop="interactionCount" style="margin-right: 10px;color: #f0630a;"> <i class="fa fa-comment"></i>
                        <a href="<?= base_url();?>blog/<?= $sql1['metatitle'];?>" title="0 Comments" rel="comments" style="color: #f0630a;">0 Comments</a>
                    </span>

                    <div style="overflow: hidden;max-height: 150px;text-align: justify">
                        <?php echo $sql1['description'];?>
                    </div>
                    <br>
                    <div class="text-right">
                        <a href="<?= base_url();?>blog/<?= $sql1['metatitle'];?>" class="btn darkGreyBtn red-bg-btn back_color" style="color: #fff;">Read More</a>
                    </div>
                </article>
                <hr>
                <?php
                    }
                ?>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 bmargin"> 
                <aside id="recent-posts-2" class="widget widget_recent_entries">                            
                    <h3 class="widget-title heading" itemprop="about" style="margin-top: 0px;">Recent Posts</h3>     
                    <ul>
                    <?php
                        $i=1;
                        $sql=$conn->query("select * from news_events order by id desc");
                        while($row=mysqli_fetch_array($sql))
                        {                   
                    ?>
                        <li>
                            <a href="<?= base_url();?>blog/<?= $row['metatitle'];?>">
                               <i class="fa fa-arrow-right"></i> <?= $row['name'];?>
                            </a>
                        </li>
                    <?php
                        }
                    ?>
                    </ul>
                </aside> 
            </div>
            <!--end right column--> 
        </div>
    </div>
</section>
<?php
    }
?>
<?php include('footer.php');?>