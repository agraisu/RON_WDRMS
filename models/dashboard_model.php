<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "load_system_status") {
        $query1 = "SELECT
                   Count(customer_details.cus_id) AS cus_count
                   FROM `customer_details`
                   WHERE
                   customer_details.cus_status = 1";
        $result1 = $app->basic_Select_Query($query1);
        $query2 = "SELECT
                   Sum(invoice_details.inv_amount) AS today_inv_amot
                   FROM `invoice_details`
                   WHERE
                   invoice_details.inv_issue_date = CURDATE()";
        $result2 = $app->basic_Select_Query($query2);
        $query3 = "SELECT
                   SUM(item_return_details.return_amount) AS tot_ret_amt
                   FROM
                   item_return_details
                   WHERE
                   DATE_FORMAT(item_return_details.return_date_time,'%Y-%m-%d') = CURDATE()";
        $result3 = $app->basic_Select_Query($query3);
        $query4 = "SELECT
                   Sum(invoice_details.inv_balance_amt) AS tot_inv_balance
                   FROM `invoice_details`
                   WHERE
                   invoice_details.inv_status = 1";
        $result4 = $app->basic_Select_Query($query4);
        $query5 = "SELECT
                   Count(invoice_details.inv_tbl_id) AS late_return_count
                   FROM `invoice_details`
                   WHERE
                   invoice_details.inv_status = 1 AND
                   invoice_details.inv_return_date < CURDATE()";
        $result5 = $app->basic_Select_Query($query5);
        echo $result1[0]['cus_count']. '~' .$result2[0]['today_inv_amot']. '~' .$result3[0]['tot_ret_amt']. '~' .$result4[0]['tot_inv_balance']. '~' .$result5[0]['late_return_count'];
    } elseif ($_POST['action'] == "load_lower_items_to_table"){
        $query = "SELECT
                  system_inventory.avl_qty,
                  item_details.item_name
                  FROM
                  system_inventory
                  INNER JOIN item_details ON system_inventory.item_id = item_details.item_id
                  WHERE
                  system_inventory.avl_qty < (SELECT
                  system_properties.`value`
                  FROM
                  system_properties
                  WHERE
                  system_properties.type = 'low_items')";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "load_recent_items_to_table"){
        $query = "SELECT
                  item_details.item_name,
                  item_details.item_rent_price
                  FROM `item_details`
                  ORDER BY
                  item_details.item_id DESC
                  LIMIT 10";
        $result = $app->json_encoded_select_query($query);
    }
}

