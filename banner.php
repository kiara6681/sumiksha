<script>
    $(document).ready(function(){
        $("#1").addClass('active');
    });
</script>>
<div class="container-full">
    <header class="header-image home-banner-height">
 
    <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel"> 
        <ol class="carousel-indicators">
           <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
           <li data-target="#carousel-example-generic" data-slide-to="1"></li>
           <li data-target="#carousel-example-generic" data-slide-to="2"></li>
           <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <?php 
                $i=1;
                $row1=$conn->query("select * from banner");
                while($sql1=mysqli_fetch_array($row1))
                {
            ?>
                <div class="item" id="<?= $i;?>"> 
                   <img alt="Housing Finance Company" src="<?= $urlset;?>manage/slider/<?= $sql1['image'];?>" width="100%" />
                    <div class="headline col-md-12 col-sm-12 hidden-xs">
                        <div class="container">
                            <h1><?= $sql1['name'];?></h1>
                        </div>
                    </div>
                </div>
            <?php
                $i++;}
            ?>
        </div>
 
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> 
            <span class="glyphicon glyphicon-chevron-left"></span> 
        </a> 
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> 
            <span class="glyphicon glyphicon-chevron-right"></span> 
        </a>
    </div> 

</header> 
 <br/> <br/>