<?php
include('../connection/config.php'); 
    
if(isset($_POST))
{
    $user_id = $_POST['user_id'];
    $start_date = $_POST['start_date'];
    $start_date = date('Y-m-d', strtotime($start_date));
    $end_date = $_POST['end_date'];
    $end_date = date('Y-m-d', strtotime($end_date));

        $loan='';
        $sql_cmp = $conn->query("SELECT 
            SUM(CASE WHEN product_id = '4' THEN 1 ELSE 0 END) AS loan, 
            SUM(CASE WHEN product_id = '5' THEN 1 ELSE 0 END) AS insurance, 
            SUM(CASE WHEN product_id = '8' THEN 1 ELSE 0 END) AS credit, 
            SUM(CASE WHEN product_id = '9' THEN 1 ELSE 0 END) AS investment,
            SUM(CASE WHEN sub_product_id = '1' THEN 1 ELSE 0 END) AS home_loan, 
            SUM(CASE WHEN sub_product_id = '2' THEN 1 ELSE 0 END) AS personal_loan, 
            SUM(CASE WHEN sub_product_id = '3' THEN 1 ELSE 0 END) AS business_loan,
            SUM(CASE WHEN sub_product_id = '11' THEN 1 ELSE 0 END) AS lap,
            SUM(CASE WHEN sub_product_id = '18' THEN 1 ELSE 0 END) AS health_insurance,
            SUM(CASE WHEN sub_product_id = '19' THEN 1 ELSE 0 END) AS life_insurance,
            SUM(CASE WHEN sub_product_id = '26' THEN 1 ELSE 0 END) AS travel_insurance,
            SUM(CASE WHEN sub_product_id = '27' THEN 1 ELSE 0 END) AS corporate_insurance, 
            SUM(CASE WHEN sub_product_id = '28' THEN 1 ELSE 0 END) AS home_insurance,
            SUM(CASE WHEN sub_product_id = '29' THEN 1 ELSE 0 END) AS mutual_fund,
            SUM(CASE WHEN sub_product_id = '31' THEN 1 ELSE 0 END) AS ipo,
            SUM(CASE WHEN sub_product_id = '32' THEN 1 ELSE 0 END) AS icici_bank, 
            SUM(CASE WHEN sub_product_id = '33' THEN 1 ELSE 0 END) AS hdfc_bank,
            SUM(CASE WHEN sub_product_id = '34' THEN 1 ELSE 0 END) AS yes_bank,
            SUM(CASE WHEN sub_product_id = '35' THEN 1 ELSE 0 END) AS rbl_bank,
            SUM(CASE WHEN sub_product_id = '36' THEN 1 ELSE 0 END) AS project_loan, 
            SUM(CASE WHEN sub_product_id = '37' THEN 1 ELSE 0 END) AS motor_insurance, 
            SUM(CASE WHEN sub_product_id = '39' THEN 1 ELSE 0 END) AS child_plan,
            SUM(CASE WHEN sub_product_id = '40' THEN 1 ELSE 0 END) AS citi_bank,
            SUM(CASE WHEN sub_product_id = '41' THEN 1 ELSE 0 END) AS indusind_bank, 
            SUM(CASE WHEN sub_product_id = '42' THEN 1 ELSE 0 END) AS card_to_card,
            SUM(CASE WHEN sub_product_id = '43' THEN 1 ELSE 0 END) AS pension_plan,
            SUM(CASE WHEN sub_product_id = '44' THEN 1 ELSE 0 END) AS ulips,
            SUM(CASE WHEN sub_product_id = '45' THEN 1 ELSE 0 END) AS money_back_policy, 
            SUM(CASE WHEN sub_product_id = '46' THEN 1 ELSE 0 END) AS open_an_demat,
            SUM(CASE WHEN sub_product_id = '47' THEN 1 ELSE 0 END) AS equities,
            SUM(CASE WHEN sub_product_id = '48' THEN 1 ELSE 0 END) AS derivaties, 
            SUM(CASE WHEN sub_product_id = '49' THEN 1 ELSE 0 END) AS currency_future, 
            SUM(CASE WHEN sub_product_id = '50' THEN 1 ELSE 0 END) AS fixed_income 
            from refer_earn where DATE(created_at) between '$start_date' and '$end_date' and user_id = '$user_id' and status = '1'");
            $data_cmp=mysqli_fetch_array($sql_cmp);
            
            if($sql_cmp->num_rows>0)
            {
?>
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-title" style="background:#003399;color: #fff;">
                    <h4>Total Loan</h4>
                    <h5><?= $data_cmp['loan'];?></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="background:#003399;color: #fff;">
                    <table class="insurance">
                        <th>Home</th>
                        <th>Personal</th>
                        <th>Business</th>
                        <tr>
                            <td><?= $data_cmp['home_loan'];?></td>
                            <td><?= $data_cmp['personal_loan'];?></td>
                            <td><?= $data_cmp['business_loan'];?></td>
                        </tr>             
                        <th>LAP</th>
                        <th>PL</th>
                        <tr>
                            <td><?= $data_cmp['lap'];?></td>
                            <td><?= $data_cmp['project_loan'];?></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>        
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title" style="background:#003399;color: #fff;">
                    <h4>Total Insurance</h4>
                    <h5><?= $data_cmp['insurance'];?></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="background:#003399;color: #fff;">
                    <table class="insurance">
                        <th>Health</th>
                        <th>Life</th>
                        <th>Travel</th>
                        <tr>
                            <td><?= $data_cmp['health_insurance'];?></td>
                            <td><?= $data_cmp['life_insurance'];?></td>
                            <td><?= $data_cmp['travel_insurance'];?></td>
                        </tr>             
                        <th>Corporate</th>
                        <th>Home</th>
                        <th>Motor</th>
                        <tr>
                            <td><?= $data_cmp['corporate_insurance'];?></td>
                            <td><?= $data_cmp['home_insurance'];?></td>
                            <td><?= $data_cmp['motor_insurance'];?></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>        
        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-title" style="background:#003399;color: #fff;">
                    <h4>Total Credit Card</h4>
                    <h5><?= $data_cmp['credit'];?></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="background:#003399;color: #fff;">
                    <table class="insurance">
                        <th>ICICI</th>
                        <th>HDFC</th>
                        <th>YES</th>
                        <tr>
                            <td><?= $data_cmp['icici_bank'];?></td>
                            <td><?= $data_cmp['hdfc_bank'];?></td>
                            <td><?= $data_cmp['yes_bank'];?></td>
                        </tr>             
                        <th>RBL</th>
                        <th>CITI</th>
                        <th>INDUSIND</th>
                        <tr>
                            <td><?= $data_cmp['rbl_bank'];?></td>
                            <td><?= $data_cmp['citi_bank'];?></td>
                            <td><?= $data_cmp['indusind_bank'];?></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>        
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title" style="background:#003399;color: #fff;">
                    <h4>Total Mutual Funds</h4>
                    <h5><?= $data_cmp['investment'];?></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="background:#003399;color: #fff;">
                    <table class="insurance">
                        <th>MF</th>
                        <th>IPO</th>
                        <th>OD</th>
                        <tr>
                            <td><?= $data_cmp['mutual_fund'];?></td>
                            <td><?= $data_cmp['ipo'];?></td>
                            <td><?= $data_cmp['open_an_demat'];?></td>
                        </tr>             
                        <th>Child Plan</th>
                        <tr>
                            <td><?= $data_cmp['child_plan'];?></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>
<?php
    }
    else
    {
        echo 0;
    }
    exit();
}
?>