<?php
require_once './others/class/main_funtions.php';
$app = new setting();

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
            <table class="tbl_boder displayHide center" border="" style="width: 100%; font-weight: bold;background-color: white">
                <thead>
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

            <table class="center" style="width: 100%;font-size: 15px; font-weight: bold;background-color: white" class="">
                <thead>
                    <tr>
                        <td style="text-align: left; width: 70%;"><br>
                            <span style="font-size: 20px;">RON Rentors & Tailors</span><br>
                        </td>
                        <td style="text-align: left;">
                            <span style="font-size: 15px;">Date Range Wise Invoice Summary for Item Ctegories</span><br>
                            <span>PAGE NO. </span><span style="margin-left: 0.65cm;">: <?php echo $page_no; ?></span><br>
                            <span>REPORT CREATE DATE </span><span>: <?php echo date('Y-m-d'); ?></span><br>
                            <span>REPORT CREATE USER </span><span>: <?php echo $_SESSION['name']; ?></span><br>
                            <span>Selected Date : (From)</span><span>: <?php echo @$_POST['from'] ?></span> (To)<span>: <?php echo @$_POST['to'] ?></span>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                </thead>
            </table>
            <table class="center" border="1" style="width: 100%; font-size: 13pt; font-weight: bold;background-color: white" class="tbl_boder">
                <tr>
                    <th style="width: 1.5cm;">#</th>
                    <th style="width: 5cm;">INV No</th>
                    <th style="width: 10cm;">INV Date</th>
                    <th style="width: 8cm;">Received BY</th>
                    <th style="width: 8cm;">Isuued BY</th>
                    <th style="width: 5cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 18px;">INV Amount &nbsp;</th>
                </tr>
                <?php
                if (isset($_POST['gen_report'])) {
                    $total_inv = 0;
                   
                        $query = "SELECT
invoice_details.inv_no,
invoice_details.inv_cus_id,
invoice_details.inv_amount,
invoice_details.inv_added_user,
invoice_details.inv_added_date_time,
customer_details.cus_name,
user_register.full_name
FROM
invoice_details
INNER JOIN customer_details ON invoice_details.inv_cus_id = customer_details.cus_id
INNER JOIN user_register ON invoice_details.inv_added_user = user_register.user_id
WHERE
DATE_FORMAT(invoice_details.inv_added_date_time,'%Y-%m-%d') BETWEEN '{$_POST['from']}' AND '{$_POST['to']}' AND
invoice_details.inv_status = 2";
                    
                    $result = $app->basic_Select_Query($query);

                    $no = 1;
                    $amount = 0;
                    foreach ($result AS $aa) {
                        echo '<tr>'
                        . '<td>' . $no . '</td>'
                        . '<td>' . $aa['inv_no'] . '</td>'
                        . '<td>' . $aa['inv_added_date_time'] . '</td>'
                        . '<td>' . $aa['cus_name'] . '</td>'
                        . '<td>' . $aa['full_name'] . '</td>'
                        . '<td style="width: 5cm; text-align: right; font-weight: bold; font-size: 18px;">' . $aa['inv_amount'] . '</td>'
                        . '</tr>';

                        $total_inv += $aa['inv_amount'];

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
                    <th style="width: 5cm;">INV No</th>
                    <th style="width: 10cm;">INV Date</th>
                    <th style="width: 8cm;">Received BY</th>
                    <th style="width: 8cm;">Isuued BY</th>
                    <th style="width: 5cm;">INV Amount</th>
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
                    <th style="width: 5cm;">INV No</th>
                    <th style="width: 10cm;">INV Date</th>
                    <th style="width: 8cm;">Received BY</th>
                    <th style="width: 8cm;">Isuued BY</th>
                    <th style="width: 5cm;">INV Amount</th>
                </tr>';
                            }
                        }
                        $no++;
                    }
                    echo '<tr>';
                    echo '<td colspan="5" style="font-weight: bold; font-size: 20px; text-align: right;">Totals : &nbsp;</td>';
                    echo '<td style="width: 8cm; text-align: right; padding-left: 15px; font-weight: bold; font-size: 20px;">' . number_format($total_inv, 2, ".", ",") . '&nbsp;</td>';
                    echo '</tr>';
                }

                $_POST = array();
                ?>
            </table>
        </form>
    </body>
    <?php require_once './others/sub_pages/all_js.php'; ?>
</html>

