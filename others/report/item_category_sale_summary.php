<?php
require_once './others/class/main_funtions.php';
$app = new setting();

$query = "SELECT
item_category_details.cat_id,
item_category_details.cat_name
FROM `item_category_details`";
$data = $app->basic_Select_Query($query);

$page_no = 1;
$rowCount = 0;

$all_tot = 0;

//month totals
$mo1 = 0;
$mo2 = 0;
$mo3 = 0;
$mo4 = 0;
$mo5 = 0;
$mo6 = 0;
$mo7 = 0;
$mo8 = 0;
$mo9 = 0;
$mo10 = 0;
$mo11 = 0;
$mo12 = 0;
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
                        <th class="text-center mr-5">Select Year : </th>
                        <th><select class="form-control col-md-5" style="background-color: #D6E9C6" name="year">
                                <?php
                                for ($x = 0; $x <= 5; $x++) {
                                    $year = date("Y", strtotime("-" . $x . " year"));
                                    echo '<option value="' . $year . '">' . $year . '</option>';
                                }
                                ?></select></th>
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
                            <span style="font-size: 15px;">Item Category Wise Sales Summary</span><br>
                            <span>PAGE NO. </span><span style="margin-left: 0.65cm;">: <?php echo $page_no; ?></span><br>
                            <span>REPORT CREATE DATE </span><span>: <?php echo date('Y-m-d'); ?></span><br>
                            <span>REPORT CREATE USER </span><span>: <?php echo $_SESSION['name']; ?></span><br>
                            <span>Selected Year : <?php echo @$_POST['year'] ?></span>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                </thead>
            </table>
            <table class="center" border="1" style="width: 100%; font-size: 13pt; font-weight: bold;" class="tbl_boder">
                <tr>
                    <th style="width: 5cm;">Category</th>
                    <th style="width: 8cm;">Jan</th>
                    <th style="width: 8cm;">Feb</th>
                    <th style="width: 8cm;">March</th>
                    <th style="width: 8cm;">April</th>
                    <th style="width: 8cm;">May</th>
                    <th style="width: 8cm;">June</th>
                    <th style="width: 8cm;">July</th>
                    <th style="width: 8cm;">August</th>
                    <th style="width: 8cm;">Sept</th>
                    <th style="width: 8cm;">Oct</th>
                    <th style="width: 8cm;">Nov</th>
                    <th style="width: 8cm;">Dec</th>
                    <th style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 17px;">Monthly Total (Rs) &nbsp;</th>
                </tr>
                <?php
                if (isset($_POST['gen_report'])) {
                    $total_amot = 0;

                    foreach ($data AS $cat) {
                        $cat_tot = 0;
                        echo '<tr>';
                        echo '<td>' . $cat['cat_name'] . '</td>';
                        for ($x = 1; $x <= 12; $x++) {
                            if ($x != 10 || $x != 11 || $x != 12) {
                                $month = '0' . $x;
                            } else {
                                $month = $x;
                            }
                            $ym = $_POST['year'] . '-' . $month;
                            $query2 = "SELECT
                              Sum(invoice_item_details.inv_unit_price*invoice_item_details.inv_itm_qty) AS itm_amt,
                              item_category_details.cat_name
                              FROM
                              invoice_item_details
                              INNER JOIN invoice_details ON invoice_item_details.invoice_no = invoice_details.inv_no
                              INNER JOIN item_details ON invoice_item_details.inv_itm_id = item_details.item_id
                              INNER JOIN item_category_details ON item_details.item_category = item_category_details.cat_id
                              WHERE
                              invoice_details.inv_status = 2 AND
                              DATE_FORMAT(invoice_details.inv_added_date_time,'%Y-%m') = '{$ym}' AND
                              item_category_details.cat_id = '{$cat['cat_id']}'
                              GROUP BY
                              item_category_details.cat_name";
                            $count = $app->row_count_quary($query2);
                            $result = $app->basic_Select_Query($query2);
                            if ($x == 1) {
                                if ($count != 0) {
                                    $mo1 += $result[0]['itm_amt'];
                                    $cat_tot += $result[0]['itm_amt'];
                                    echo '<td>' . $result[0]['itm_amt'] . '</td>';
                                } else {
                                    echo '<td></td>';
                                }
                            }
                            if ($x == 2) {
                                if ($count != 0) {
                                    $mo2 += $result[0]['itm_amt'];
                                    $cat_tot += $result[0]['itm_amt'];
                                    echo '<td>' . $result[0]['itm_amt'] . '</td>';
                                } else {
                                    echo '<td></td>';
                                }
                            }
                            if ($x == 3) {
                                if ($count != 0) {
                                    $mo3 += $result[0]['itm_amt'];
                                    $cat_tot += $result[0]['itm_amt'];
                                    echo '<td>' . $result[0]['itm_amt'] . '</td>';
                                } else {
                                    echo '<td></td>';
                                }
                            }
                            if ($x == 4) {
                                if ($count != 0) {
                                    $mo4 += $result[0]['itm_amt'];
                                    $cat_tot += $result[0]['itm_amt'];
                                    echo '<td>' . $result[0]['itm_amt'] . '</td>';
                                } else {
                                    echo '<td></td>';
                                }
                            }
                            if ($x == 5) {
                                if ($count != 0) {
                                    $mo5 += $result[0]['itm_amt'];
                                    $cat_tot += $result[0]['itm_amt'];
                                    echo '<td>' . $result[0]['itm_amt'] . '</td>';
                                } else {
                                    echo '<td></td>';
                                }
                            }
                            if ($x == 6) {
                                if ($count != 0) {
                                    $mo6 += $result[0]['itm_amt'];
                                    $cat_tot += $result[0]['itm_amt'];
                                    echo '<td>' . $result[0]['itm_amt'] . '</td>';
                                } else {
                                    echo '<td></td>';
                                }
                            }
                            if ($x == 7) {
                                if ($count != 0) {
                                    $mo7 += $result[0]['itm_amt'];
                                    $cat_tot += $result[0]['itm_amt'];
                                    echo '<td>' . $result[0]['itm_amt'] . '</td>';
                                } else {
                                    echo '<td></td>';
                                }
                            }
                            if ($x == 8) {
                                if ($count != 0) {
                                    $mo8 += $result[0]['itm_amt'];
                                    $cat_tot += $result[0]['itm_amt'];
                                    echo '<td>' . $result[0]['itm_amt'] . '</td>';
                                } else {
                                    echo '<td></td>';
                                }
                            }
                            if ($x == 9) {
                                if ($count != 0) {
                                    $mo9 += $result[0]['itm_amt'];
                                    $cat_tot += $result[0]['itm_amt'];
                                    echo '<td>' . $result[0]['itm_amt'] . '</td>';
                                } else {
                                    echo '<td></td>';
                                }
                            }
                            if ($x == 10) {
                                if ($count != 0) {
                                    $mo10 += $result[0]['itm_amt'];
                                    $cat_tot += $result[0]['itm_amt'];
                                    echo '<td>' . $result[0]['itm_amt'] . '</td>';
                                } else {
                                    echo '<td></td>';
                                }
                            }
                            if ($x == 11) {
                                if ($count != 0) {
                                    $mo11 += $result[0]['itm_amt'];
                                    $cat_tot += $result[0]['itm_amt'];
                                    echo '<td>' . $result[0]['itm_amt'] . '</td>';
                                } else {
                                    echo '<td></td>';
                                }
                            }
                            if ($x == 12) {
                                if ($count != 0) {
                                    $mo12 += $result[0]['itm_amt'];
                                    $cat_tot += $result[0]['itm_amt'];
                                    echo '<td>' . $result[0]['itm_amt'] . '</td>';
                                } else {
                                    echo '<td></td>';
                                }
                            }
                        }
                        $all_tot += $cat_tot;
                        echo '<td>' . $cat_tot . '</td>';
                        echo '</tr>';
                        $cat_tot = 0;
                    }
                    echo '<tr>';
                    echo '<td  style="font-weight: bold; font-size: 20px; text-align: right;">Totals : &nbsp;</td>';
                    echo '<td style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 20px;">' . $mo1 . '&nbsp;</td>';
                    echo '<td style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 20px;">' . $mo2 . '&nbsp;</td>';
                    echo '<td style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 20px;">' . $mo3 . '&nbsp;</td>';
                    echo '<td style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 20px;">' . $mo4 . '&nbsp;</td>';
                    echo '<td style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 20px;">' . $mo5 . '&nbsp;</td>';
                    echo '<td style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 20px;">' . $mo6 . '&nbsp;</td>';
                    echo '<td style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 20px;">' . $mo7 . '&nbsp;</td>';
                    echo '<td style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 20px;">' . $mo8 . '&nbsp;</td>';
                    echo '<td style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 20px;">' . $mo9 . '&nbsp;</td>';
                    echo '<td style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 20px;">' . $mo10 . '&nbsp;</td>';
                    echo '<td style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 20px;">' . $mo11 . '&nbsp;</td>';
                    echo '<td style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 20px;">' . $mo12 . '&nbsp;</td>';
                    echo '<td style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 20px;">' . $all_tot . '&nbsp;</td>';
                    echo '</tr>';


//                    $no = 1;
//                    $amount = 0;
//                    foreach ($result AS $aa) {
//                        echo '<tr>'
//                        . '<td>' . $no . '</td>'
//                        . '<td>' . $aa['grn_no'] . '</td>'
//                        . '<td>' . $aa['grn_date'] . '</td>'
//                        . '<td>' . $aa['sup_name'] . '</td>'
//                        . '<td style="width: 8cm; text-align: right; padding-left: 15px;">' . $aa['total_amount'] . ' &nbsp;</td>'
//                        . '<td style="width: 8cm; text-align: right; padding-left: 15px;">' . $aa['paid_amount'] . ' &nbsp;</td>'
//                        . '<td style="width: 8cm; text-align: right; padding-left: 15px;">' . $aa['balance_amount'] . ' &nbsp;</td>'
//                        . '</tr>';
//
//                        $total_amot += $aa['total_amount'];
//                        $total_paid += $aa['paid_amount'];
//                        $total_balance += $aa['balance_amount'];
//                        $rowCount++;
//                        if ($page_no == 1) {
//                            if ($rowCount >= 25) {
//                                echo '</table><div class="page_brack"></div>';
//                                $page_no++;
//                                $rowCount = 0;
//
//                                echo '<table style="width: 21.5cm; font-size: 12px; font-weight: bold;" class="">
//                                         <tr><td style="width: 80%;"></td><td style="text-align: left;"><span>PAGE NO. </span><span style="margin-left: 0.65cm;">: ' . $page_no . '</span><br></tr>
//                                         </table>
//                                         <table border="1" style="width: 21.5cm; font-size: 11pt; font-weight: bold;" class="tbl_boder">
//                     <tr>
//                    <th style="width: 1.5cm;">#</th>
//                    <th style="width: 5cm;">GRN No</th>
//                    <th style="width: 10cm;">GRN Date</th>
//                    <th style="width: 8cm;">Supplier</th>
//                    <th style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 17px;">Total Amount (Rs) &nbsp;</th>
//                    <th style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 17px;">Paid Amount (Rs) &nbsp;</th>
//                    <th style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 17px;">Blance Amount (Rs) &nbsp;</th>
//                </tr>';
//                            }
//                        } else {
//                            if ($rowCount >= 25) {
//                                echo '</table><div class="page_brack"></div>';
//                                $page_no++;
//                                $rowCount = 0;
//
//                                echo '<table style="width: 21.5cm; font-size: 12px; font-weight: bold;" class="">
//                                         <tr><td style="width: 80%;"></td><td style="text-align: left;"><span>PAGE NO. </span><span style="margin-left: 0.65cm;">: ' . $page_no . '</span><br></tr>
//                                         </table>
//                                         <table border="1" style="width: 21.5cm; font-size: 11pt; font-weight: bold;" class="tbl_boder">
//                     <tr>
//                    <th style="width: 1.5cm;">#</th>
//                    <th style="width: 5cm;">GRN No</th>
//                    <th style="width: 10cm;">GRN Date</th>
//                    <th style="width: 8cm;">Supplier</th>
//                    <th style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 17px;">Total Amount (Rs) &nbsp;</th>
//                    <th style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 17px;">Paid Amount (Rs) &nbsp;</th>
//                    <th style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 17px;">Blance Amount (Rs) &nbsp;</th>
//                </tr>';
//                            }
//                        }
//                        $no++;
//                    }
//                    echo '<tr>';
//                    echo '<td colspan="4" style="font-weight: bold; font-size: 20px; text-align: right;">Totals : &nbsp;</td>';
//                    echo '<td style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 20px;">' . number_format($total_amot, 2, ".", ",") . '&nbsp;</td>';
//                    echo '<td style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 20px;">' . number_format($total_paid, 2, ".", ",") . '&nbsp;</td>';
//                    echo '<td style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 20px;">' . number_format($total_balance, 2, ".", ",") . '&nbsp;</td>';
//                    echo '</tr>';
                }

                $_POST = array();
                ?>
            </table>
        </form>
    </body>
    <?php require_once './others/sub_pages/all_js.php'; ?>
</html>

