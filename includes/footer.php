<div class="footer">
    <div>
        <strong>Copyright</strong> &copy; 2017 Designed by <a href="http://dexusmedia.com/" target="_blank">Sumiksha Services</a>
    </div>
</div>
  <!-- Mainly scripts -->
    <script src="<?= base_url();?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Data Table -->
 	<script src="<?= base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>
    <script src='https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js'></script>
    <!-- Flot -->
    <script src="<?= base_url();?>assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="<?= base_url();?>assets/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?= base_url();?>assets/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= base_url();?>assets/js/inspinia.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?= base_url();?>assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="<?= base_url();?>assets/js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="<?= base_url();?>assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?= base_url();?>assets/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="<?= base_url();?>assets/js/plugins/chartJs/Chart.min.js"></script>
    
    <!-- Data picker -->
    <script src="<?= base_url();?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- Toastr -->
    <script src="<?= base_url();?>assets/js/plugins/toastr/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <?php 
        $chart_data='';
        $sql_cmp = $conn->query("SELECT SUM(CASE WHEN product_id = '4' THEN 1 ELSE 0 END) AS G_loan, product_id,DATE(created_at) as start_year from refer_earn where user_id='".$_SESSION['user']."' && status='1' && MONTH(created_at)>0 GROUP by MONTH(created_at)");
        while($row = mysqli_fetch_array($sql_cmp))
        {
            $start_year = $row["start_year"];
           
            $chart_data .= "{ Month:'".$start_year."', Total:".$row["G_loan"]."}, ";
        }
            //$chart_data = substr($chart_data, 0, -2);
    ?>
    <script>
        $(document).ready(function(){
            $("#morris-line-chart").css("height","200");
            $("#morris-line-chart1").css("height","200");
            $("#morris-line-chart3").css("height","200");
            $("#morris-line-chart4").css("height","200");
        });
        $(function() {
            Morris.Line({
                element: 'morris-line-chart',
                    data: [<?= $chart_data;?>],
                xkey: 'Month',
                ykeys: ['Total'],
                resize: true,
                lineWidth:2,
                labels: ['Value'],
                lineColors: ['#fff'],
                pointSize:5,
            });
        });
    </script>  
    <?php 
        $chart_data='';
        $sql_cmp = $conn->query("SELECT SUM(CASE WHEN product_id = '5' THEN 1 ELSE 0 END) AS G_insurance, product_id,DATE(created_at) as start_year from refer_earn where user_id='".$_SESSION['user']."' && status='1' && MONTH(created_at)>0 GROUP by MONTH(created_at)");
        while($row = mysqli_fetch_array($sql_cmp))
        {
            $start_year = $row["start_year"];
           
            $chart_data .= "{ Month:'".$start_year."', Total:".$row["G_insurance"]."}, ";
        }
            //$chart_data = substr($chart_data, 0, -2);
    ?>  
    <script>
        $(function() {
            Morris.Line({
                element: 'morris-line-chart1',
                    data: [<?= $chart_data;?>],
                xkey: 'Month',
                ykeys: ['Total'],
                resize: true,
                lineWidth:2,
                labels: ['Value'],
                lineColors: ['#fff'],
                pointSize:5,
            });
        });
    </script>    
    <?php 
        $chart_data='';
        $sql_cmp = $conn->query("SELECT SUM(CASE WHEN product_id = '8' THEN 1 ELSE 0 END) AS G_credit, product_id,DATE(created_at) as start_year from refer_earn where user_id='".$_SESSION['user']."' && status='1' && MONTH(created_at)>0 GROUP by MONTH(created_at)");
        while($row = mysqli_fetch_array($sql_cmp))
        {
            $start_year = $row["start_year"];
           
            $chart_data .= "{ Month:'".$start_year."', Total:".$row["G_credit"]."}, ";
        }
            //$chart_data = substr($chart_data, 0, -2);
    ?>
    <script>
        $(function() {
            Morris.Line({
                element: 'morris-line-chart3',
                    data: [<?= $chart_data;?>],
                xkey: 'Month',
                ykeys: ['Total'],
                resize: true,
                lineWidth:2,
                labels: ['Value'],
                lineColors: ['#fff'],
                pointSize:5,
            });
        });
    </script>   
    <?php 
        $chart_data='';
        $sql_cmp = $conn->query("SELECT SUM(CASE WHEN product_id = '9' THEN 1 ELSE 0 END) AS G_investment, product_id,DATE(created_at) as start_year from refer_earn where user_id='".$_SESSION['user']."' && status='1' && MONTH(created_at)>0 GROUP by MONTH(created_at)");
        while($row = mysqli_fetch_array($sql_cmp))
        {
            $start_year = $row["start_year"];
           
            $chart_data .= "{ Month:'".$start_year."', Total:".$row["G_investment"]."}, ";
        }
            //$chart_data = substr($chart_data, 0, -2);
    ?> 
    <script>
        $(function() {
            Morris.Line({
                element: 'morris-line-chart4',
                    data: [<?= $chart_data;?>],
                xkey: 'Month',
                ykeys: ['Total'],
                resize: true,
                lineWidth:2,
                labels: ['Value'],
                lineColors: ['#fff'],
                pointSize:5,
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var data1 = [
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
            ];
            var data2 = [
                [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
            ];
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#d5d5d5",
                            borderWidth: 1,
                            color: '#d5d5d5'
                        },
                        colors: ["#1ab394", "#1C84C6"],
                        xaxis:{
                        },
                        yaxis: {
                            ticks: 4
                        },
                        tooltip: false
                    }
            );

            var doughnutData = {
                labels: ["App","Software","Laptop" ],
                datasets: [{
                    data: [300,50,100],
                    backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            var ctx4 = document.getElementById("doughnutChart").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

            var doughnutData = {
                labels: ["App","Software","Laptop" ],
                datasets: [{
                    data: [70,27,85],
                    backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

        });
    </script>
    <script>
        $(document).ready(function() {

            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "Example dataset",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label: "Example dataset",
                        backgroundColor: "rgba(220,220,220,0.5)",
                        borderColor: "rgba(220,220,220,1)",
                        pointBackgroundColor: "rgba(220,220,220,1)",
                        pointBorderColor: "#fff",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    }
                ]
            };

            var lineOptions = {
                responsive: true
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});

        });
    </script>
    <script>
        $(document).ready(function(){
            /*$(document).on('click','.data_check', function(){
                $(this).closest('.gradeX').addClass("selected");
            });*/
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv',
                        exportOptions: {
                                rows:{selected:true}
                            }
                    },
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>
    <script>
        $(document).ready(function(){
            var mem = $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
        });
    </script>
        <!-- Validation Jquery -->
    <link rel="stylesheet" href="<?= base_url();?>frontend_assets/css/validationEngine.jquery.css" type="text/css"/>
    <script src="<?= base_url();?>frontend_assets/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?= base_url();?>frontend_assets/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
    <script>
        $(document).ready(function(){
            // binds form submission and fields to the validation engine
            $(".Register_form").validationEngine();
        });
    </script>    
    <script>
        $(document).ready(function(){
            // binds form submission and fields to the validation engine
            $('#search_register').on('click', function(e){
                e.preventDefault();
                var valid = $("#Search_form").validationEngine("validate", {promptPosition : "topLeft"});
                if(valid==true)
                {
                    var user_start_date = $(".user_start_date").val();
                    var user_end_date = $(".user_end_date").val();
                    var user_id = "<?= $_SESSION['user']?>";
                    //alert(user_id);
                    $.ajax({
                        url : "<?= base_url(); ?>ajaxPages/searchUserProductDateWise",
                        type : "POST",
                        data : {start_date:user_start_date, end_date:user_end_date, user_id:user_id},
                        success : function(data)
                        {
                            if(data != 0)
                            {
                                //alert(data);
                                $("#date_wise_search_result").html(data);
                                $("#date_search_result").hide();
                            }
                            else
                            {
                                $("#date_wise_search_result").hide();
                                $("#date_search_result").show();
                            }
                            
                        }
                    });    
                }
            });

            $('.dis_appr').on('click',function(){
                var id = $(this).attr("id");
                $("#refer_earn_"+id+"").val(2);
                $('.reject').show();
                $('.reject').attr("required", "required");
                $('.reject_hide').hide();
            });            
            $('.login').on('click',function(){
                var id = $(this).attr("id");
                var product_id = $(this).attr("data-id");
                $("#refer_earn_"+id+"").val(3);
                if(product_id==4 || product_id==8){
                    $('.login_show').show();
                    $('.login_req').attr("required", "required");
                    $('.reject_hide').hide();                    
                }
                else
                {
                    $('.reject').show();
                    $('.reject').attr("required", "required");
                    $('.reject_hide').hide();
                }
            });            
            $('.Inprocess').on('click',function(){
                var id = $(this).attr("id");
                $("#refer_earn_"+id+"").val(4);
                $('.reject').show();
                $('.reject').attr("required", "required");
                $('.reject_hide').hide();
            });            
            $('.file_pending').on('click',function(){
                var id = $(this).attr("id");
                $("#refer_earn_"+id+"").val(5);
                $('.reject').show();
                $('.reject').attr("required", "required");
                $('.reject_hide').hide();
            });            
            $('.approve').on('click',function(){
                var id = $(this).attr("id");
                $("#refer_earn_"+id+"").val(1);
                $('.approve_tab').show();
                $('.approve_req').attr("required", "required");
                $('.reject_hide').hide();
            });
        });
    </script>
    
</body>
</html>
