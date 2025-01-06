<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "load_items_to_remove") {
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
    } elseif ($_POST['action'] == "remove_damaged_items") {
        $query = "INSERT INTO `damage_item_details` ( `dmg_item_id`, `dmg_itm_note`, `dmg_itm_qty`, `dmg_itm_added_user` ) "
                . "VALUES ('{$_POST['item_id']}', '{$_POST['remove_note']}', '{$_POST['dmg_qty']}', '{$_SESSION['user_id']}');";
        $result = $app->basic_command_query($query);
        if ($result) {
            $query2 = "UPDATE `system_inventory` SET `avl_qty`=`avl_qty` - '{$_POST['dmg_qty']}', `last_update_date_time` = NOW(), `last_update_user`='{$_SESSION['user_id']}' WHERE (`item_id`='{$_POST['item_id']}')";
            $app->basic_command_query($query2);
            echo 1;
        } else {
            echo 0;
        }
    }
}
