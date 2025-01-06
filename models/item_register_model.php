<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "get_item_to_save") {
        $query = "INSERT INTO `item_details` "
                . "( `item_code`, `item_category`, `size`, `fabric_type`, `design_type`, `color`, `item_name`, `item_keep_days`, `photo`, `item_rent_price`, `gender_type`, `item_added_user`) "
                . "VALUES "
                . "( '{$_POST['item_code']}', '{$_POST['item_cat']}', '{$_POST['item_size']}', '{$_POST['item_fabric']}', '{$_POST['item_design']}', '{$_POST['item_color']}', '{$_POST['item_name']}', '{$_POST['item_keep']}', '{$_POST['item_photo']}', '{$_POST['item_rent_cost']}', '{$_POST['item_gender']}', '{$_SESSION['user_id']}' );";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "load_items_to_table") {
        $query = "SELECT
                  item_details.item_id,
                  item_details.item_code,
                  item_details.item_category,
                  item_details.fabric_type,
                  item_details.design_type,
                  item_details.color,
                  item_details.size,
                  item_details.item_name,
                  item_details.item_keep_days,
                  item_details.item_rent_price,
                  item_category_details.cat_name,
                  item_details.gender_type
                  FROM
                  item_details
                  INNER JOIN item_category_details ON item_details.item_category = item_category_details.cat_id
                  WHERE
                  item_details.item_status = 1 AND
                  (item_details.item_code LIKE '{$_POST['search']}%' OR
                  item_category_details.cat_name LIKE '{$_POST['search']}%' OR
                  item_details.fabric_type LIKE '{$_POST['search']}%' OR
                  item_details.design_type LIKE '{$_POST['search']}%' OR
                  item_details.color LIKE '{$_POST['search']}%' OR
                  item_details.size LIKE '{$_POST['search']}%' OR
                  item_details.item_name LIKE '{$_POST['search']}%' OR
                  item_details.gender_type LIKE '{$_POST['search']}%')
                  ORDER BY
                  item_details.item_code ASC";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "delete_item") {
        $query = "UPDATE `item_details` SET `item_status`='0' WHERE (`item_id`='{$_POST['item_id']}')";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "select_items_to_update") {
        $query = "SELECT "
                . "item_details.item_code, "
                . "item_details.item_category, "
                . "item_details.fabric_type, "
                . "item_details.design_type, "
                . "item_details.color, "
                . "item_details.size, "
                . "item_details.item_name, "
                . "item_details.item_keep_days, "
                . "item_details.photo, "
                . "item_details.item_rent_price, "
                . "item_details.gender_type "
                . "FROM `item_details` "
                . "WHERE "
                . "item_details.item_id = '{$_POST['item_id']}'";
        $data = $app->basic_Select_Query($query);
        $_SESSION['itm_code'] = $data[0]['item_code'];
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "update_items") {
        $query = "UPDATE `item_details` SET "
                . "`item_code` = '{$_POST['item_code']}', "
                . "`item_category` = '{$_POST['item_cat']}', "
                . "`fabric_type` = '{$_POST['item_fabric']}', "
                . "`design_type` = '{$_POST['item_design']}', "
                . "`color` = '{$_POST['item_color']}', "
                . "`size` = '{$_POST['item_size']}', "
                . "`item_name` = '{$_POST['item_name']}', "
                . "`item_keep_days` = '{$_POST['item_keep']}', "
                . "`item_rent_price` = '{$_POST['item_rent_cost']}', "
                . "`gender_type` = '{$_POST['item_gender']}' "
                . "WHERE "
                . "(`item_id` = '{$_POST['item_id']}');";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "load_categories") {
        $query = "SELECT
                  item_category_details.cat_id,
                  item_category_details.cat_name
                  FROM `item_category_details`
                  WHERE
                  item_category_details.cat_status = 1";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "load_sizes") {
        $query = "SELECT
                  size_details.size_id,
                  size_details.size
                  FROM `size_details`
                  WHERE
                  size_details.category_id = '{$_POST['cat_id']}' AND
                  size_details.size_status = 1";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "load_fabrics") {
        $query = "SELECT
                  fabric_details.fabric_id,
                  fabric_details.fabric_name
                  FROM `fabric_details`
                  WHERE
                  fabric_details.category_id = '{$_POST['cat_id']}' AND
                  fabric_details.fabric_status = 1";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "load_designs") {
        $query = "SELECT
                  design_details.design_id,
                  design_details.design_name
                  FROM `design_details`
                  WHERE
                  design_details.fabric_id = '{$_POST['fabric_id']}' AND
                  design_details.design_status = 1";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "get_item_code") {
        $next_item_id = $app->get_next_autoincrement_ID("item_details");
        echo $item_code = "I00" . $next_item_id;
        $_SESSION['itm_code'] = $item_code;
    }
}




