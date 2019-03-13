<?php include('../includes/header.php');?>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">Monthly</span>
                    <h5>Income</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">40 886,200</h1>
                    <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                    <small>Total income</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">Annual</span>
                    <h5>Orders</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">275,800</h1>
                    <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                    <small>New orders</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">Today</span>
                    <h5>visits</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">106,120</h1>
                    <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                    <small>New visits</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right">Low value</span>
                    <h5>User activity</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">80,600</h1>
                    <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                    <small>In first month</small>
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
<?php //include('../includes/footer.php');?>