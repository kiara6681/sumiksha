<?php include('../includes/header.php');?>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-left"><h5>Users</h5></span>
                </div>
                <div class="ibox-content">
                    <?php
                        $sql = $conn->query("SELECT count(*) as total_user FROM `login`");
                        $row = mysqli_fetch_array($sql);
                    ?>
                    <h1 class="no-margins"><?= $row['total_user'];?></h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-left"><h5>Business Enquiry</h5></span>
                </div>
                <div class="ibox-content">
                    <?php
                        $sql = $conn->query("SELECT count(*) as total_enquiry FROM `business_enquiry`");
                        $row = mysqli_fetch_array($sql);
                    ?>
                    <h1 class="no-margins"><?= $row['total_enquiry'];?></h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-left"><h5>Lead Generation</h5></span>
                </div>
                <div class="ibox-content">
                    <?php
                        $sql = $conn->query("SELECT count(*) as total_lead FROM `refer_earn`");
                        $row = mysqli_fetch_array($sql);
                    ?>
                    <h1 class="no-margins"><?= $row['total_lead'];?></h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-left"><h5>Visitors</h5></span>
                </div>
                <div class="ibox-content">
                    <?php
                        $sql = $conn->query("SELECT count('status') as total_visitors from `ip_address` group by ip_address");
                        $total_visitors = mysqli_num_rows($sql);
                    ?>
                    <h1 class="no-margins"><?= $total_visitors;?></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
			<div class="ibox float-e-margins">
                <div class="ibox-content">
                        <div>
                            <span class="pull-right text-right">
                            <small>Average value of visitors in the past month in: <strong>India</strong></small>
                                <br>
                                All visitors: 162,862
                            </span>
                            <h1 class="m-b-xs">50,992</h1>
                            <h3 class="font-bold no-margins">
                                Half-year revenue margin
                            </h3>
                            <small>Sales marketing.</small>
                        </div>

                    <div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                        <canvas id="lineChart" height="191" style="display: block; width: 819px; height: 191px;" width="819"></canvas>
                    </div>
<!-- 
                    <div class="m-t-md">
                        <small class="pull-right">
                            <i class="fa fa-clock-o"> </i>
                            Update on 16.07.2015
                        </small>
                       <small>
                           <strong>Analysis of sales:</strong> The value has been changed over time, and last month reached a level over $50,000.
                       </small>
                    </div>

               -->  </div>
            </div>
        </div>
<!--             <div class="col-md-4">
            <div class="statistic-box">
            <h4>
                Project Beta progress
            </h4>
            <p>
                You have two project with not compleated task.
            </p>
            <div class="row text-center">
                <div class="col-lg-6"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                    <canvas id="doughnutChart2" width="80" height="80" style="margin: 18px auto 0px; display: block; width: 80px; height: 80px;"></canvas>
                    <h5>Kolter</h5>
                </div>
                <div class="col-lg-6"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                    <canvas id="doughnutChart" width="80" height="80" style="margin: 18px auto 0px; display: block; width: 80px; height: 80px;"></canvas>
                    <h5>Maxtor</h5>
                </div>
            </div>
           
            </div>
        </div> -->
    </div>
<?php include('../includes/footer.php');?>