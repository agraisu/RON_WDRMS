<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "get_invoice_no") {
        $next_invoice_no = $app->get_next_autoincrement_ID("invoice_details");
        echo $inv_no = "INV000" . $next_invoice_no;
    } elseif ($_POST['action'] == "load_customers") {
        $query = "SELECT
                  customer_details.cus_id,
                  customer_details.cus_regi_no,
                  customer_details.cus_name
                  FROM `customer_details`
                  WHERE
                  customer_details.cus_status = 1";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "load_items_for_invoice") {
        $query = "SELECT
                  item_details.item_id,
                  item_details.item_code,
                  item_details.item_name,
                  system_inventory.avl_qty
                  FROM
                  item_details
                  INNER JOIN system_inventory ON system_inventory.item_id = item_details.item_id
                  INNER JOIN item_category_details ON item_details.item_category = item_category_details.cat_id
                  WHERE
                  item_details.item_status = 1 AND
                  (item_details.item_code LIKE '{$_POST['search']}%' OR
                  item_details.item_name LIKE '{$_POST['search']}%' OR
                  system_inventory.avl_qty LIKE '{$_POST['search']}%' OR item_category_details.cat_name LIKE '{$_POST['search']}%')";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "save_invoice_items") {
        $query = "INSERT INTO `invoice_item_details` ( `invoice_no`, `inv_itm_id`, `inv_itm_qty`, `inv_unit_price` ) "
                . "VALUES ( '{$_POST['inv_no']}', '{$_POST['item_id']}', '{$_POST['inv_qty']}', '{$_POST['rent_price']}' );";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "load_invoice_items_to_table") {
        $query = "SELECT invoice_item_details.inv_itm_tbl_id,
                  item_details.item_name,
                  invoice_item_details.inv_itm_qty,
                  invoice_item_details.inv_unit_price,
                  invoice_item_details.inv_itm_qty * invoice_item_details.inv_unit_price AS tot_invoice
                  FROM
                  invoice_item_details
                  INNER JOIN item_details ON invoice_item_details.inv_itm_id = item_details.item_id
                  WHERE
                  invoice_item_details.inv_itm_status = 1 AND
                  invoice_item_details.invoice_no = '{$_POST['inv_no']}' AND
                  (invoice_item_details.inv_itm_qty LIKE '{$_POST['search']}%' OR
                  invoice_item_details.inv_unit_price LIKE '{$_POST['search']}%' OR
                  item_details.item_name LIKE '{$_POST['search']}%')";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "get_selected_item_details") {
        $query = "SELECT
                  item_details.item_rent_price
                  FROM `item_details`
                  WHERE
                  item_details.item_id = '{$_POST['itm_id']}'";

        $result = $app->basic_Select_Query($query);
        $keeping_days = 7;
        $r_price = $result[0]['item_rent_price'];
        $ret_date = date('Y-m-d', strtotime($Date . ' + ' . $keeping_days . ' days'));
        echo $keeping_days . '~' . $r_price . '~' . $ret_date;
    } elseif ($_POST['action'] == "exp_date_calculate") {
        $keep_days = $_POST['keep_days'];
        $date = $_POST['date'];
//       echo $ret_date = strtotime($date . ' + ' . $keep_days . ' days');
    } elseif ($_POST['action'] == "finish_invoice") {
        $query = "INSERT INTO `invoice_details` ( `inv_no`, `inv_cus_id`, `inv_amount`, `inv_paid_amt`, `inv_balance_amt`, `inv_added_user`, `inv_issue_date`, `inv_return_date` ) "
                . "VALUES ( '{$_POST['inv_no']}', '{$_POST['cus_id']}', '{$_POST['invoice_total']}', '{$_POST['inv_paid']}', '{$_POST['inv_balance']}', '{$_SESSION['user_id']}', '{$_POST['inv_issue']}', '{$_POST['inv_return']}' );";
        $result = $app->basic_command_query($query);
//------------------------------------------------------------------------------
        $query2 = "SELECT
                   invoice_item_details.inv_itm_id,
                   invoice_item_details.inv_itm_qty
                   FROM
                   invoice_item_details
                   WHERE
                   invoice_item_details.invoice_no = '{$_POST['inv_no']}'";
        $result2 = $app->basic_Select_Query($query2);
//------------------------------------------------------------------------------
        foreach ($result2 AS $x) {
            $query3 = "UPDATE `system_inventory` SET `avl_qty`=`avl_qty` - '{$x['inv_itm_qty']}', `last_update_user`='{$_SESSION['user_id']}' WHERE (`item_id`='{$x['inv_itm_id']}')";
            $result3 = $app->basic_command_query($query3);
        }
//------------------------------------------------------------------------------
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "delete_invoice_item") {
        $query = "DELETE FROM `invoice_item_details` WHERE (`inv_itm_tbl_id`='{$_POST['inv_item_id']}')"; 
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
