<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "load_category_list") {
        $query = "SELECT
                  item_category_details.cat_id,
                  item_category_details.cat_name
                  FROM `item_category_details`
                  WHERE
                  item_category_details.cat_status = 1";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "load_fabrics") {
        $query = "SELECT
                  fabric_details.fabric_id,
                  fabric_details.fabric_name
                  FROM `fabric_details`
                  WHERE
                  fabric_details.category_id = '{$_POST['cat_list']}' AND
                  fabric_details.fabric_status = 1";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "get_fabrics_to_save") {
        $query = "INSERT INTO `design_details` "
                . "(`design_name`, `fabric_id`) "
                . "VALUES "
                . "( '{$_POST['fab_design']}', '{$_POST['fabrics']}');";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "load_designs_to_table") {
        $query = "SELECT
                  design_details.design_id,
                  design_details.design_name,
                  fabric_details.fabric_name
                  FROM
                  design_details
                  INNER JOIN fabric_details ON design_details.fabric_id = fabric_details.fabric_id
                  WHERE
                  design_details.design_status = 1 AND
                  (design_details.design_name LIKE '{$_POST['search']}%' OR
                  fabric_details.fabric_name LIKE '{$_POST['search']}%') AND
                  design_details.fabric_id = '{$_POST['fabrics']}'";
        $result = $app->json_encoded_select_query($query);
    }
}




