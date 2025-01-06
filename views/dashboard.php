<?php
require_once './others/class/main_funtions.php';
$app = new setting();

$q2 = "SELECT
MONTHNAME (invoice_details.inv_return_date) AS month,
SUM(invoice_details.inv_amount) AS amt
FROM `invoice_details`
WHERE
invoice_details.inv_status = 2
GROUP BY 
       DATE_FORMAT(invoice_details.inv_return_date,'%Y-%m') 
       ORDER BY 
       DATE_FORMAT(invoice_details.inv_return_date,'%Y-%m') DESC 
       LIMIT 12";
$months = "";
$amount = "";
$qunt = 0;
$data2 = $app->basic_Select_Query($q2);
foreach ($data2 AS $x) {
    if ($qunt == 0) {
        $months .= "'" . $x['month'] . "'";
        $amount .= $x['amt'];
    } else {
        $months .= ",'" . $x['month'] . "'";
        $amount .= ',' . $x['amt'];
    }
    $qunt++;
}
?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once './others/sub_pages/all_css.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"> 
        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__wobble" src="images/29.PNG" alt="RON" height="60" width="60">
            </div>

            <!-- Navbar -->
            <?php require_once './others/sub_pages/nav_bar.php'; ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?php require_once './others/sub_pages/side_bar.php'; ?>
            <!-- /Main Sidebar Container -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="background-image: linear-gradient(rgba(31,30,30,0.38), rgba(0, 0, 0, 0.38)),url('images/n1.jpg');background-size: 1750px 1200px">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-12 text-center">
                                <h1 class="m-0" style="color: white">RON Renters & Tailors</h1>
                            </div><!-- /.col -->

                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Info boxes -->
                        <div class="row">

                            <?php if (isset($_SESSION['d999'])) { ?>
                                <!--<img src="./images/23.PNG" st class="text-center">-->
                            <?php } ?>

                            <?php if (isset($_SESSION['d801'])) { ?>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Customers</span>
                                            <span class="info-box-number" id="tot_cus"></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            <?php } ?>
                            <!-- /.col -->
                            <?php if (isset($_SESSION['d802'])) { ?>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-dollar-sign"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Today invoice Amount</span>
                                            <span class="info-box-number" id="today_inv_amot"></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            <?php } ?>
                            <!-- /.col -->

                            <!-- fix for small devices only -->
                            <div class="clearfix hidden-md-up"></div>
                            <?php if (isset($_SESSION['d803'])) { ?>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-coins"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Today Return Amount</span>
                                            <span class="info-box-number" id="today_ret_amot"></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            <?php } ?>
                            <!-- /.col -->
                            <?php if (isset($_SESSION['d804'])) { ?>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-warning elevation-1"><i style="color: white" class="fas fa-dollar-sign"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Balance Amount</span>
                                            <span class="info-box-number" id="total_balance_amt"></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['d805'])) { ?>
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-blue elevation-1"><i class="fas fa-users"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Late Return Invoice Count</span>
                                            <span class="info-box-number" id="late_return_inv_cnt"></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            <?php } ?>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <?php if (isset($_SESSION['d806'])) { ?>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            <h5 class="card-title">Monthly Rent Graph</h5>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <div class="chart">
                                                        <!-- Sales Chart Canvas -->
                                                        <canvas id="myChart" style="height: 100px; background-color: whitesmoke"></canvas>

                                                        <script>
                                                            let myChart = document.getElementById('myChart').getContext('2d');
                                                            let loginChart = new Chart(myChart, {
                                                                type: 'line',
                                                                data: {
                                                                    labels: [<?php echo $months; ?>],
                                                                    datasets: [{
                                                                            label: 'Monthly Rent Graph',
                                                                            borderColor: 'rgb(255, 99, 132)',
                                                                            backgroundColor: 'rgb(255, 248, 208)',
                                                                            borderWidth: 1.5,
                                                                            data: [<?php echo $amount; ?>],
                                                                            fill: false,
                                                                            pointStyle: 'circle'
                                                                                    //                                                                tension: 0.4
                                                                        }]
                                                                },
                                                                options: {
                                                                    //                                                        title: {
                                                                    //                                                            display: false,
                                                                    //                                                            text: '',
                                                                    //                                                            fontSize: 25
                                                                    //                                                        },
                                                                    legend: {
                                                                        position: 'center'
                                                                    },
                                                                    scales: {
                                                                        x: {
                                                                            title: {
                                                                                display: true,
                                                                                text: 'Months',
                                                                                font: {
                                                                                    size: 20
                                                                                }
                                                                            }
                                                                        },
                                                                        y: {
                                                                            beginAtZero: true,
                                                                            title: {
                                                                                display: true,
                                                                                //                                                                            text: 'Monthly Rent Graph',
                                                                                color: 'red',
                                                                                font: {
                                                                                    size: 20
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            });
                                                        </script>

                                                    </div>
                                                    <!-- /.chart-responsive -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card -->
                                </div>
                            <?php } ?>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Main row -->
                        <div class="row">
                            <!-- Left col -->
                            <div class="col-md-12">


                                <!-- PRODUCT LIST -->
                                <div class="row">
                                    <?php if (isset($_SESSION['d807'])) { ?>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title" style="margin-left: 230px">RECENTLY ADDED ITEMS</h3>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="table-responsive">
                                                        <table class="table m-0" id="recent_itms_tbl">
                                                            <thead style="background-color: #51A957">
                                                                <tr style="color: black">
                                                                    <th>Item</th>
                                                                    <th>Price</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.table-responsive -->
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_SESSION['d808'])) { ?>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title" style="margin-left: 245px">LOW ITEMS LIST</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body p-0">
                                                    <div class="table-responsive">
                                                        <table class="table m-0" id="low_itms_tbl">
                                                            <thead style="background-color: #B2B225">
                                                                <tr style="color: black">
                                                                    <th>Item</th>
                                                                    <th>Qty</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.table-responsive -->
                                                </div>
                                                <!-- /.card-footer -->
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div><!--/. container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <?php require_once './others/sub_pages/footer.php'; ?>
        </div>
        <!-- ./wrapper -->

        <?php require_once './others/sub_pages/all_js.php'; ?>
        <script type="text/javascript" src="./controllers/dashboard_controller.js"></script>
    </body>
</html>
