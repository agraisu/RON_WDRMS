<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "get_item_categories_to_save") {
        $query = "INSERT INTO `item_category_details` "
                . "(`cat_name`) "
                . "VALUES "
                . "( '{$_POST['item_cat_name']}' );";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "load_item_categories_to_table") {
        $query = "SELECT "
                . "item_category_details.cat_id, "
                . "item_category_details.cat_name "
                . "FROM `item_category_details` "
                . "WHERE "
                . "item_category_details.cat_status = 1 AND "
                . "( item_category_details.cat_name LIKE '{$_POST['search']}%' )";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "get_item_categories_to_update") {
        $query = "SELECT
                  item_category_details.cat_name
                  FROM `item_category_details`
                  WHERE
                  item_category_details.cat_id = '{$_POST['cat_id']}'";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "update_item_categories") {
        $query = "UPDATE `item_category_details` SET "
                . "`cat_name` = '{$_POST['item_cat_name']}' "
                . "WHERE "
                . "(`cat_id` = '{$_POST['cat_id']}');";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "delete_item_category") {
        $query = "UPDATE `item_category_details` SET `cat_status`='0' WHERE (`cat_id`='{$_POST['cat_id']}')";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
