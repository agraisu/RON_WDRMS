<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "load_categories_types") {
        $query = "SELECT
                  item_category_details.cat_id,
                  item_category_details.cat_name
                  FROM `item_category_details`
                  WHERE
                  item_category_details.cat_status = 1";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "save_fabric") {
        $query = "INSERT INTO `fabric_details` "
                . "(`fabric_name`, `category_id`) "
                . "VALUES ('{$_POST['fab_type']}', '{$_POST['cat_type']}');";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "load_fabrics_to_table") {
        $query = "SELECT
                  fabric_details.fabric_id,
                  fabric_details.fabric_name,
                  item_category_details.cat_name
                  FROM
                  fabric_details
                  INNER JOIN item_category_details ON fabric_details.category_id = item_category_details.cat_id
                  WHERE
                  fabric_details.fabric_status = 1 AND
                  (fabric_details.fabric_name LIKE '{$_POST['search']}%' OR
                  item_category_details.cat_name LIKE '{$_POST['search']}%') AND
                  fabric_details.category_id = '{$_POST['cat_type']}'";
        $result = $app->json_encoded_select_query($query);
    }
}




