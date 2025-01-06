<?php
require_once './others/class/main_funtions.php';
$app = new setting();

$query1 = "SELECT
           item_category_details.cat_id,
           item_category_details.cat_name
           FROM `item_category_details`
           WHERE
           item_category_details.cat_status = 1";
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
                            <span style="font-size: 15px;">Date Range Wise Category Summary</span><br>
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
            <hr>
            <?php
            if (isset($_POST['gen_report'])) {
                $tot_query = "SELECT
SUM(invoice_item_details.inv_itm_qty*invoice_item_details.inv_unit_price) AS tot_amount
FROM
invoice_item_details
INNER JOIN item_details ON invoice_item_details.inv_itm_id = item_details.item_id
INNER JOIN item_category_details ON item_details.item_category = item_category_details.cat_id
INNER JOIN invoice_details ON invoice_item_details.invoice_no = invoice_details.inv_no
WHERE
invoice_details.inv_added_date_time BETWEEN '{$_POST['from']}' AND '{$_POST['to']}'";
                $tot_amt = $app->basic_Select_Query($tot_query);
                $query = "SELECT
item_category_details.cat_name,
SUM(invoice_item_details.inv_itm_qty*invoice_item_details.inv_unit_price) AS amount,
invoice_details.inv_added_date_time
FROM
invoice_item_details
INNER JOIN item_details ON invoice_item_details.inv_itm_id = item_details.item_id
INNER JOIN item_category_details ON item_details.item_category = item_category_details.cat_id
INNER JOIN invoice_details ON invoice_item_details.invoice_no = invoice_details.inv_no
WHERE
invoice_details.inv_added_date_time BETWEEN '{$_POST['from']}' AND '{$_POST['to']}'
GROUP BY
item_category_details.cat_name";
                $data = $app->basic_Select_Query($query);
                $z = 1;
                $ch_data = "";
                foreach ($data AS $x) {
                    $pres = ($x['amount'] / $tot_amt[0]['tot_amount']) * 100;
                    if ($z == 1) {
                        $ch_data .= '{label: "' . $x['cat_name'] . '(' . number_format((float) $pres, 2, '.', '') . '%)' . '", y: ' . $x['amount'] . '}';
                    } else {
                        $ch_data .= ',{label: "' . $x['cat_name'] . '(' . number_format((float) $pres, 2, '.', '') . '%)' . '", y: ' . $x['amount'] . '}';
                    }
                    $z++;
                }
                echo '<div id="chartContainer" style="height: 400px; max-width: 1000px; margin: 0px auto;"></div>';
            }
            ?>
        </form>
    </body>
    <?php require_once './others/sub_pages/all_js.php'; ?>
    <script type="text/javascript">
        window.onload = function () {

            var options = {
                title: {
                    text: "Category Wise Sale Summary"
                },
                data: [{
                        type: "pie",
                        startAngle: 45,
                        showInLegend: "true",
                        legendText: "{label}",
                        indexLabel: "{label} ({y})",
                        yValueFormatString: "#,##0.#" % "",
                        dataPoints: [
<?php echo $ch_data; ?>
                        ]
                    }]
            };
            $("#chartContainer").CanvasJSChart(options);
        }
    </script>
</html>

