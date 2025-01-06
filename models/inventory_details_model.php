<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "load_suppliers") {
        $query = "SELECT
                  supplier_details.sup_id,
                  CONCAT_WS(' ', supplier_details.sup_reg_no,supplier_details.sup_name) AS supp_name
                  FROM `supplier_details`
                  WHERE
                  supplier_details.sup_status = 1";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "load_items") {
        $query = "SELECT
                  item_details.item_id,
                  item_details.item_name
                  FROM `item_details`
                  WHERE
                  item_details.item_status = 1";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "get_grn_no") {
        $next_grn_no = $app->get_next_autoincrement_ID("grn_details");
        echo $grn_no = "G0000" . $next_grn_no;
    } elseif ($_POST['action'] == "load_item_details_for_grn") {
        $query = "SELECT "
                . "item_details.item_id, "
                . "item_details.item_code, "
                . "item_details.item_name "
                . "FROM `item_details` "
                . "WHERE "
                . "item_details.item_status = 1 AND "
                . "( item_details.item_code LIKE '{$_POST['search']}%' OR "
                . "item_details.item_name LIKE '{$_POST['search']}%' ) LIMIT 10";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "save_grn_items") {
        $query = "INSERT INTO `grn_item_details` ( `grn_no`, `item_id`, `total_qty`, `unit_price`, `last_update_user` ) "
                . "VALUES ( '{$_POST['grn_no']}', '{$_POST['item_id']}', '{$_POST['total_qty']}', '{$_POST['purchased_price']}', '{$_SESSION['user_id']}' );";
        $result = $app->basic_command_query($query);
        $query2 = "INSERT INTO `system_inventory` (`item_id`, `avl_qty`, `last_update_user`) VALUES ('{$_POST['item_id']}', '{$_POST['total_qty']}', '{$_SESSION['user_id']}') ON DUPLICATE KEY UPDATE `avl_qty` = `avl_qty` + '{$_POST['total_qty']}', `last_update_user` = '{$_SESSION['user_id']}';";
        $result2 = $app->basic_command_query($query2);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "load_grn_items_to_table") {
        $query = "SELECT "
                . "grn_item_details.grn_itm_tbl_id, "
                . "item_details.item_name, "
                . "grn_item_details.total_qty, "
                . "grn_item_details.unit_price, "
                . "grn_item_details.total_qty * grn_item_details.unit_price AS tot_price "
                . "FROM "
                . "grn_item_details INNER JOIN item_details ON grn_item_details.item_id = item_details.item_id "
                . "WHERE "
                . "grn_item_details.`status` = 1 AND "
                . "grn_item_details.grn_no = '{$_POST['grn_no']}' AND "
                . "(grn_item_details.total_qty LIKE '{$_POST['search']}%' OR "
                . "item_details.item_name LIKE '{$_POST['search']}%' OR "
                . "grn_item_details.unit_price LIKE '{$_POST['search']}%')";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "finish_grn") {
        $query = "INSERT INTO `grn_details` "
                . "( `grn_no`, `grn_date`, `sup_id`, `total_amount`, `balance_amount`, `grn_added_user` ) "
                . "VALUES "
                . "( '{$_POST['grn_no']}', '{$_POST['grn_date']}', '{$_POST['sup_id']}', '{$_POST['grn_total']}', '{$_POST['grn_total']}', '{$_SESSION['user_id']}' );";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
}




