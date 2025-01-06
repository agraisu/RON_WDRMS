<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "get_stock_items_to_table") {
        $query = "SELECT
                  system_inventory.avl_qty,
                  item_details.item_code,
                  item_details.item_name
                  FROM
                  system_inventory
                  INNER JOIN item_details ON system_inventory.item_id = item_details.item_id
                  INNER JOIN item_category_details ON item_details.item_category = item_category_details.cat_id
                  WHERE
                  item_details.item_status = 1 AND
                  (system_inventory.avl_qty LIKE '{$_POST['search']}%' OR
                  item_details.item_name LIKE '{$_POST['search']}%' OR
                  item_details.item_code LIKE '{$_POST['search']}%' OR 
                  item_category_details.cat_name LIKE '{$_POST['search']}%' OR
                  item_details.color LIKE '{$_POST['search']}%' OR
                  item_details.fabric_type LIKE '{$_POST['search']}%' OR
                  item_details.design_type LIKE '{$_POST['search']}%')";
        $result = $app->json_encoded_select_query($query);
    }
}