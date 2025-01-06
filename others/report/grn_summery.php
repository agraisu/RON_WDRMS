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
        <table class="tbl_boder displayHide center" border="" style="width: 100%; font-weight: bold;background-color: white">
            <thead>
                <tr>
                    <th><a href="./?x=inventory"><button type="button" style="background-color: #D9EDF7; width: 3cm; height: 1cm;" ><b>Back</b></button></a></th>
                    <th><button type="button" onclick="window.print();" style="background-color: #D6E9C6; width: 3cm; height: 1cm;" ><b>Print</b></button></th>
                </tr>
            </thead>
        </table>

        <table class="center" style="width: 100%;font-size: 15px; font-weight: bold;background-color: white" class="">
            <thead>
                <tr>
                    <td style="text-align: left; width: 70%;"><br>
                        <span style="font-size: 15px;">RON Rentors & Tailors</span><br>
                    </td>
                    <td style="text-align: left;">
                        <span style="font-size: 15px;">Summary of GRN No.<?php echo $grn_no = $_GET['grn_no']; ?></span><br>
                        <span>PAGE NO. </span><span style="margin-left: 0.65cm;">: <?php echo $page_no; ?></span><br>
                        <span>REPORT CREATE DATE </span><span>: <?php echo date('Y-m-d'); ?></span><br>
                        <span>REPORT CREATE USER </span><span>: <?php echo $_SESSION['name']; ?></span><br>
                    </td>
                </tr>
                <tr>
                </tr>
            </thead>
        </table>
        <table class="center" border="1" style="width: 100%; font-size: 13pt; font-weight: bold;background-color: white" class="tbl_boder">
            <tr>
                <th style="width: 1.5cm;">#</th>
                <th style="width: 5cm;">Item Description</th>
                <th style="width: 10cm;">QTY</th>
                <th style="width: 8cm;">Unit Price</th>
                <th style="width: 8cm;">Amount</th>
            </tr>
            <?php
            $query = "SELECT
                      CONCAT_WS('-',item_details.item_code,item_details.item_name) AS item_description,
                      grn_item_details.total_qty,
                      grn_item_details.unit_price
                      FROM
                      grn_item_details
                      INNER JOIN item_details ON grn_item_details.item_id = item_details.item_id
                      WHERE
                      grn_item_details.grn_no = '{$_GET['grn_no']}' AND
                      grn_item_details.`status` = 1";
            $allStudentData = $app->basic_Select_Query($query);

            $no = 1;
            $amount = 0;
            foreach ($allStudentData AS $aa) {
                $amount += $aa['unit_price'];
                echo '<tr>'
                . '<td>' . $no . '</td>'
                . '<td>' . $aa['item_description'] . '</td>'
                . '<td>' . $aa['total_qty'] . '</td>'
                . '<td>' . $aa['unit_price'] . '</td>'
                . '<td>' . $aa['total_qty'] * $aa['unit_price'] . '</td>'
                . '</tr>';
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
                <th style="width: 5cm;">Item Description</th>
                <th style="width: 10cm;">QTY</th>
                <th style="width: 8cm;">Unit Price</th>
                <th style="width: 8cm;">Amount</th>
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
                <th style="width: 5cm;">Item Description</th>
                <th style="width: 10cm;">QTY</th>
                <th style="width: 8cm;">Unit Price</th>
                <th style="width: 8cm;">Amount</th>
                    </tr>';
                    }
                }
                $no++;
            }

            $_POST = array();
            ?>
        </table>
    </body>
</html>

