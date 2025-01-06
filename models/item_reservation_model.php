<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "load_reservation_customers") {
        $query = "SELECT
                  customer_details.cus_id,
                  customer_details.cus_regi_no,
                  customer_details.cus_name
                  FROM `customer_details`
                  WHERE
                  customer_details.cus_status = 1";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "load_items_for_reservation") {
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
    } elseif ($_POST['action'] == "load_reservation_items_to_table") {
        $query = "SELECT reservation_item_details.resv_itm_tbl_id,
                  resevation_details.resv_req_date,
                  item_details.item_name,
                  reservation_item_details.resv_itm_qty
                  FROM
                  reservation_item_details
                  INNER JOIN item_details ON reservation_item_details.resv_itm_id = item_details.item_id
                  INNER JOIN resevation_details ON reservation_item_details.reservation_no = resevation_details.resv_no
                  WHERE
                  reservation_item_details.resv_itm_status = 1 AND
                  reservation_item_details.resvation_no = '{$_POST['reservation_no']}' AND
                  (resevation_details.resv_req_date LIKE '{$_POST['search']}%' OR
                  item_details.item_name LIKE '{$_POST['search']}%' OR
                  reservation_item_details.resvation_no LIKE '{$_POST['search']}%')";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "save_reservation_items") {
        $query = "INSERT INTO `reservation_item_details` ( `reservation_no`, `resv_itm_id`, `resv_itm_qty` ) "
                . "VALUES ( '{$_POST['reservation_no']}', '{$_POST['item_id']}', '{$_POST['resv_itm_qty']}' );";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "finish_reservation") {
        $query = "INSERT INTO `resevation_details` ( `resv_no`, `resv_cus_id`, `resv_req_date`, `resv_advance`, `resv_added_user` ) "
                . "VALUES ( '{$_POST['resv_no']}', '{$_POST['resv_cus_id']}', '{$_POST['resv_req_date']}', '{$_POST['resv_advance']}', '{$_SESSION['user_id']}' );";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
