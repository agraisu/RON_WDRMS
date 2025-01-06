<?php
require_once './others/class/main_funtions.php';
$app = new setting();

$query1 = "SELECT
           supplier_details.sup_id,
           supplier_details.sup_name
           FROM `supplier_details`
           WHERE
           supplier_details.sup_status = 1";
$result1 = $app->basic_Select_Query($query1);

$page_no = 1;
$rowCount = 0;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once './others/sub_pages/all_css.php'; ?>
        <style type="text/css">
            @media Print {
                .displayHide{
                    display: none;
                }
            }

            th{
                padding: 1px;
                text-align: center;
            }

            td{
                text-align: center;
            }

            .tbl_boder{
                border: 1px double black;
                border-collapse: collapse;
            }

            table.tbl_boder td, table.tbl_boder th {
                border: 1px double black;
            }

            .page_brack{
                page-break-after: always;
            }
            .center {
                margin-left: auto;
                margin-right: auto;
            }

        </style>
    </head>
    <body>
        <form method="post" action="">
            <table class="tbl_boder displayHide center" border="" style="width: 100%; font-weight: bold;">
                <thead>
                    <tr>
                        <th class="text-center mr-5">Select Supplier : </th>
                        <th><select class="form-control col-md-5" style="background-color: #D6E9C6" name="supplier">
                                <option value="0">All Supplier</option>
                                <?php
                                foreach ($result1 AS $x) {
                                    echo '<option value="' . $x['sup_id'] . '">' . $x['sup_name'] . '</option> ';
                                }
                                ?>
                            </select></th>
                    </tr>
                    <tr>
                        <th class="text-center">From Date : </th>
                        <th><input type="text" name="from" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" style="background-color: #D9EDF7"></th>
                        <th class="text-center">To Date : </th>
                        <th><input type="text" name="to" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" style="background-color: #D6E9C6"></th>
                    </tr>
                    <tr>
                        <th><a href="./?x=dashboard"><button type="button" style="background-color: #D9EDF7; width: 3cm; height: 1cm;" ><b>Back</b></button></a></th>
                        <th><button type="button" onclick="window.print();" style="background-color: #D6E9C6; width: 3cm; height: 1cm;" ><b>Print</b></button></th>
                        <th><button type="submit" name="gen_report" style="background-color: #01a0e4; width: 5cm; height: 1cm;" ><b>Generate Report</b></button></th>
                    </tr>
                </thead>
            </table>

            <table class="center" style="width: 100%;font-size: 15px; font-weight: bold;" class="">
                <thead>
                    <tr>
                        <td style="text-align: left; width: 70%;"><br>
                            <span style="font-size: 15px;">RON Rentors & Tailors</span><br>
                        </td>
                        <td style="text-align: left;">
                            <span style="font-size: 15px;">Date Range Wise GRN Summary</span><br>
                            <span>PAGE NO. </span><span style="margin-left: 0.65cm;">: <?php echo $page_no; ?></span><br>
                            <span>REPORT CREATE DATE </span><span>: <?php echo date('Y-m-d'); ?></span><br>
                            <span>REPORT CREATE USER </span><span>: <?php echo $_SESSION['name']; ?></span><br>
                            <span>Selected Supplier </span><span>: <?php echo @$_POST['supplier'] ?></span><br>
                            <span>Selected Date : (From)</span><span>: <?php echo @$_POST['from'] ?></span> (To)<span>: <?php echo @$_POST['to'] ?></span>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                </thead>
            </table>
            <table class="center" border="1" style="width: 100%; font-size: 13pt; font-weight: bold;" class="tbl_boder">
                <tr>
                    <th style="width: 1.5cm;">#</th>
                    <th style="width: 5cm;">GRN No</th>
                    <th style="width: 10cm;">GRN Date</th>
                    <th style="width: 8cm;">Supplier</th>
                    <th style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 17px;">Total Amount (Rs) &nbsp;</th>
                    <th style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 17px;">Paid Amount (Rs) &nbsp;</th>
                    <th style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 17px;">Blance Amount (Rs) &nbsp;</th>
                </tr>
                <?php
                if (isset($_POST['gen_report'])) {
                    $total_amot = 0;
                    $total_paid = 0;
                    $total_balance = 0;
                    if ($_POST['supplier'] != 0) {
                        $query = "SELECT
                               grn_details.grn_no,
                               grn_details.grn_date,
                               supplier_details.sup_name,
                               grn_details.total_amount,
                               grn_details.paid_amount,
                               grn_details.balance_amount
                               FROM
                               grn_details
                               INNER JOIN supplier_details ON grn_details.sup_id = supplier_details.sup_id
                               WHERE
                               grn_details.grn_date BETWEEN '{$_POST['from']}' AND '{$_POST['to']}' AND
                               supplier_details.sup_id = '{$_POST['supplier']}'";
                    } else {
                        $query = "SELECT
                               grn_details.grn_no,
                               grn_details.grn_date,
                               supplier_details.sup_name,
                               grn_details.total_amount,
                               grn_details.paid_amount,
                               grn_details.balance_amount
                               FROM
                               grn_details
                               INNER JOIN supplier_details ON grn_details.sup_id = supplier_details.sup_id
                               WHERE
                               grn_details.grn_date BETWEEN '{$_POST['from']}' AND '{$_POST['to']}'";
                    }
                    
                    $result = $app->basic_Select_Query($query);

                    $no = 1;
                    $amount = 0;
                    foreach ($result AS $aa) {
                        echo '<tr>'
                        . '<td>' . $no . '</td>'
                        . '<td>' . $aa['grn_no'] . '</td>'
                        . '<td>' . $aa['grn_date'] . '</td>'
                        . '<td>' . $aa['sup_name'] . '</td>'
                        . '<td style="width: 8cm; text-align: right; padding-left: 15px;">' . $aa['total_amount'] . ' &nbsp;</td>'
                        . '<td style="width: 8cm; text-align: right; padding-left: 15px;">' . $aa['paid_amount'] . ' &nbsp;</td>'
                        . '<td style="width: 8cm; text-align: right; padding-left: 15px;">' . $aa['balance_amount'] . ' &nbsp;</td>'
                        . '</tr>';

                        $total_amot += $aa['total_amount'];
                        $total_paid += $aa['paid_amount'];
                        $total_balance += $aa['balance_amount'];
                        $rowCount++;
                        if ($page_no == 1) {
                            if ($rowCount >= 25) {
                                echo '</table><div class="page_brack"></div>';
                                $page_no++;
                                $rowCount = 0;

                                echo '<table style="width: 21.5cm; font-size: 12px; font-weight: bold;" class="">
                                         <tr><td style="width: 80%;"></td><td style="text-align: left;"><span>PAGE NO. </span><span style="margin-left: 0.65cm;">: ' . $page_no . '</span><br></tr>
                                         </table>
                                         <table border="1" style="width: 21.5cm; font-size: 11pt; font-weight: bold;" class="tbl_boder">
                     <tr>
                    <th style="width: 1.5cm;">#</th>
                    <th style="width: 5cm;">GRN No</th>
                    <th style="width: 10cm;">GRN Date</th>
                    <th style="width: 8cm;">Supplier</th>
                    <th style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 17px;">Total Amount (Rs) &nbsp;</th>
                    <th style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 17px;">Paid Amount (Rs) &nbsp;</th>
                    <th style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 17px;">Blance Amount (Rs) &nbsp;</th>
                </tr>';
                            }
                        } else {
                            if ($rowCount >= 25) {
                                echo '</table><div class="page_brack"></div>';
                                $page_no++;
                                $rowCount = 0;

                                echo '<table style="width: 21.5cm; font-size: 12px; font-weight: bold;" class="">
                                         <tr><td style="width: 80%;"></td><td style="text-align: left;"><span>PAGE NO. </span><span style="margin-left: 0.65cm;">: ' . $page_no . '</span><br></tr>
                                         </table>
                                         <table border="1" style="width: 21.5cm; font-size: 11pt; font-weight: bold;" class="tbl_boder">
                     <tr>
                    <th style="width: 1.5cm;">#</th>
                    <th style="width: 5cm;">GRN No</th>
                    <th style="width: 10cm;">GRN Date</th>
                    <th style="width: 8cm;">Supplier</th>
                    <th style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 17px;">Total Amount (Rs) &nbsp;</th>
                    <th style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 17px;">Paid Amount (Rs) &nbsp;</th>
                    <th style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 17px;">Blance Amount (Rs) &nbsp;</th>
                </tr>';
                            }
                        }
                        $no++;
                    }
                    echo '<tr>';
                    echo '<td colspan="4" style="font-weight: bold; font-size: 20px; text-align: right;">Totals : &nbsp;</td>';
                    echo '<td style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 20px;">' . number_format($total_amot, 2, ".", ",") . '&nbsp;</td>';
                    echo '<td style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 20px;">' . number_format($total_paid, 2, ".", ",") . '&nbsp;</td>';
                    echo '<td style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 20px;">' . number_format($total_balance, 2, ".", ",") . '&nbsp;</td>';
                    echo '</tr>';
                }

                $_POST = array();
                ?>
            </table>
        </form>
    </body>
    <?php require_once './others/sub_pages/all_js.php'; ?>
</html>

