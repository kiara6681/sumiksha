<?php include('connection/config.php');?>
<?php
    $urlset='https://sumikshaservices.com/';
    header("Content-Type: application/xml; charset=utf-8");
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
  <loc><?= $urlset;?></loc>
  <lastmod>2018-10-10T05:49:08+00:00</lastmod>
  <priority>1.00</priority>
</url>
<url>
  <loc><?= $urlset;?>aboutus</loc>
  <lastmod>2018-10-10T05:49:08+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc><?= $urlset;?>contactus</loc>
  <lastmod>2018-10-10T05:49:08+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc><?= $urlset;?>blog</loc>
  <lastmod>2018-10-10T05:49:08+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc><?= $urlset;?>job</loc>
  <lastmod>2018-10-10T05:49:08+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc><?= $urlset;?>channel_partner</loc>
  <lastmod>2018-10-10T05:49:08+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc><?= $urlset;?>franchise</loc>
  <lastmod>2018-10-10T05:49:08+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc><?= $urlset;?>login</loc>
  <lastmod>2018-10-10T05:49:08+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc><?= $urlset;?>register</loc>
  <lastmod>2018-10-10T05:49:08+00:00</lastmod>
  <priority>0.80</priority>
</url>
<?php
    $sql=$conn->query("select * from courses");
    while($row=mysqli_fetch_array($sql))
    {   
        $id = $row['id'];
        $sql1=$conn->query("select * from course1 where course_id=$id");
        while($row1=mysqli_fetch_array($sql1))
        {
?>
<url>
  <loc><?= $urlset;?>product/<?= $row1['metatitle'];?></loc>
  <lastmod>2018-10-10T05:49:08+00:00</lastmod>
  <priority>0.80</priority>
</url>
<?php
        }
    }
?>
<?php
    $sql=$conn->query("select * from news_events");
    while($row=mysqli_fetch_array($sql))
    {                   
?>
<url>
  <loc><?= $urlset;?>blog/<?= $row['metatitle'];?></loc>
  <lastmod>2018-10-10T05:49:08+00:00</lastmod>
  <priority>0.80</priority>
</url>
<?php
    }
?>
</urlset>