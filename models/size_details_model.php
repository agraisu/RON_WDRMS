<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "load_Item_categories") {
        $query = "SELECT
                  item_category_details.cat_id,
                  item_category_details.cat_name
                  FROM `item_category_details`
                  WHERE
                  item_category_details.cat_status = 1";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "save_category_size") {
        $query = "INSERT INTO `size_details` "
                . "(`size`, `category_id`) "
                . "VALUES ('{$_POST['cat_size']}', '{$_POST['category']}');";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "load_sizes_to_table") {
        $query = "SELECT
                  size_details.size_id,
                  size_details.size,
                  item_category_details.cat_name
                  FROM
                  size_details
                  INNER JOIN item_category_details ON size_details.category_id = item_category_details.cat_id
                  WHERE
                  size_details.size_status = 1 AND
                  (size_details.size LIKE '{$_POST['search']}%' OR
                  item_category_details.cat_name LIKE '{$_POST['search']}%') AND
                  size_details.category_id = '{$_POST['category']}'";
        $result = $app->json_encoded_select_query($query);
    }
}




