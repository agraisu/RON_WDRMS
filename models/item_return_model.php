<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "get_invoice_items") {
        $query = "SELECT CONCAT_WS(' - ',item_details.item_name,invoice_item_details.inv_itm_qty,(invoice_item_details.inv_unit_price * invoice_item_details.inv_itm_qty)) AS itm_details,
                  invoice_item_details.inv_itm_tbl_id
                  FROM
                  invoice_item_details
                  INNER JOIN item_details ON invoice_item_details.inv_itm_id = item_details.item_id
                  WHERE
                  invoice_item_details.invoice_no = '{$_POST['inv_no']}'";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "get_return_item_details") {
        $fine_chrg = $app->basic_Select_Query("SELECT system_properties.`value` FROM `system_properties` WHERE system_properties.type = 'late_charg'");
        $query = "SELECT
                  invoice_details.inv_amount,
                  invoice_details.inv_balance_amt,
                  invoice_details.inv_issue_date,
                  invoice_details.inv_return_date,
                  invoice_details.inv_paid_amt,
                  customer_details.cus_contact,
                  customer_details.cus_name
                  FROM
                  invoice_details
                  INNER JOIN customer_details ON invoice_details.inv_cus_id = customer_details.cus_id
                  WHERE
                  invoice_details.inv_no = '{$_POST['inv_no']}'";
        $result = $app->basic_Select_Query($query);
        $days = (strtotime($result[0]['inv_return_date']) - strtotime(date('Y-m-d'))) / (60 * 60 * 24);
        if ($result[0]['inv_return_date'] >= date('Y-m-d')) {
            $fine_amt = 0.00;
        } else {
            $fine_amt = abs($days) * $fine_chrg[0]['value'];
        }
        $r_issue = $result[0]['inv_issue_date'];
        $r_date = $result[0]['inv_return_date'];
        $r_invoice = $result[0]['inv_amount'];
        $r_balanace = $result[0]['inv_balance_amt'];
        $r_paid = $result[0]['inv_paid_amt'];
        $r_contact = $result[0]['cus_contact'];
        echo $fine_amt . '~' . $r_issue . '~' . $r_date . '~' . $r_invoice . '~' . $r_balanace . '~' . $r_paid . '~' . $r_contact;
    } elseif ($_POST['action'] == "save_return_items") {
        $query = "INSERT INTO `item_return_details` ( `return_inv_no`, `return_note`, `return_fine_charge`, `other_fine`, `return_user_id`, `return_amount` ) "
                . "VALUES ( '{$_POST['invoive_no']}', '{$_POST['ret_note']}', '{$_POST['late_ret_fine']}', '{$_POST['other_fine']}', '{$_SESSION['user_id']}', '{$_POST['final_amot']}' );";
        $result = $app->basic_command_query($query);

        if ($result) {
//------------------------------------------------------------------------------
            $query4 = "UPDATE `invoice_details` SET `inv_paid_amt`=`inv_paid_amt`+ '{$_POST['final_amot']}', `inv_balance_amt`=`inv_balance_amt` - '{$_POST['final_amot']}', `inv_status` = 2 WHERE (`inv_no`='{$_POST['invoive_no']}')";
            $result4 = $app->basic_command_query($query4);
//------------------------------------------------------------------------------
            $query2 = "SELECT
                   invoice_item_details.inv_itm_id,
                   (invoice_item_details.inv_itm_qty - invoice_item_details.damage_qty) AS inv_itm_qty,
                   invoice_item_details.damage_qty
                   FROM
                   invoice_item_details
                   WHERE
                   invoice_item_details.invoice_no = '{$_POST['invoive_no']}'";
            $result2 = $app->basic_Select_Query($query2);
//------------------------------------------------------------------------------
            foreach ($result2 AS $x) {
//------------------------------------------------------------------------------
                if ($x['damage_qty'] != 0) {
                    $query99 = "INSERT INTO `damage_item_details` ( `dmg_item_id`, `dmg_itm_note`, `dmg_itm_qty`, `dmg_itm_added_user` ) "
                            . "VALUES ('{$x['inv_itm_id']}', 'By Cashier', '{$x['damage_qty']}', '{$_SESSION['user_id']}');";
                    $result99 = $app->basic_command_query($query99);
                }
//------------------------------------------------------------------------------
                $query3 = "UPDATE `system_inventory` SET `avl_qty`=`avl_qty` + '{$x['inv_itm_qty']}', `last_update_user`='{$_SESSION['user_id']}' WHERE (`item_id`='{$x['inv_itm_id']}')";
                $result3 = $app->basic_command_query($query3);
            }
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "check_invoice") {
        $query = "SELECT
                  invoice_details.inv_status
                  FROM `invoice_details`
                  WHERE
                  invoice_details.inv_no = '{$_POST['invoice_no']}'";
        $result = $app->basic_Select_Query($query);
        if ($result[0]['inv_status'] == 1) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "add_dmg_qty") {
        $query = "UPDATE `invoice_item_details` SET `damage_qty`='{$_POST['damaged_qty']}' WHERE (`inv_itm_tbl_id`='{$_POST['inv_tbl_id']}')";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "load_dmge_itm_tbl") {
        $query = "SELECT
                  invoice_item_details.damage_qty,
                  item_details.item_name,
                  invoice_item_details.inv_itm_tbl_id
                  FROM
                  invoice_item_details
                  INNER JOIN item_details ON invoice_item_details.inv_itm_id = item_details.item_id
                  WHERE
                  invoice_item_details.invoice_no = '{$_POST['inv_no']}' AND
                  invoice_item_details.damage_qty != 0";
        $data = $app->json_encoded_select_query($query);
    }
}



