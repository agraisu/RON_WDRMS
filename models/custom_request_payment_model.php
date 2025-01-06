<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "get_confirmd_custom_requests") {
        $query = "SELECT
                  custom_request_details.cus_req_id,
                  custom_request_details.cus_req_no,
                  custom_request_details.cus_req_nic,
                  custom_request_details.cus_phone,
                  custom_request_details.cus_req_note,
                  custom_request_details.cus_req_photo,
                  custom_request_details.cus_req_status,
                  custom_request_details.cus_req_complete_status,
                  customer_details.cus_name
                  FROM
                  custom_request_details
                  INNER JOIN customer_details ON custom_request_details.cus_req_nic = customer_details.cus_nic
                  WHERE
                  custom_request_details.cus_req_status = 2 AND
                  (custom_request_details.cus_req_no LIKE '{$_POST['search']}%' OR
                  custom_request_details.cus_req_nic LIKE '{$_POST['search']}%' OR
                  custom_request_details.cus_phone LIKE '{$_POST['search']}%' OR
                  customer_details.cus_name LIKE '{$_POST['search']}%')
                  ORDER BY
                  custom_request_details.cus_req_no ASC";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "get_selected_pay_details") {
        $query = "SELECT
                    customer_request_payment_details.cus_req_pay_id,
                    customer_request_payment_details.cus_req_total,
                    customer_request_payment_details.cus_req_balance,
                    custom_request_details.cus_req_no,
                    custom_request_details.cus_phone
                    FROM
                    customer_request_payment_details
                    INNER JOIN custom_request_details ON customer_request_payment_details.cus_req_no = custom_request_details.cus_req_no
                    WHERE
                    custom_request_details.cus_req_no = '{$_POST['req_no']}'";
        $result = $app->basic_Select_Query($query);
        $r_price = $result[0]['cus_req_total'];
        $r_blnc = $result[0]['cus_req_balance'];
        $cus_phone = $result[0]['cus_phone'];
        echo $r_price . '~' . $r_blnc . '~' . $cus_phone;
    } elseif ($_POST['action'] == "complete_payments") {
        $inv_no = 'INV' . $_POST['req_pay_no'];
        $query1 = "UPDATE `custom_request_details` SET `cus_req_status`='4' WHERE (`cus_req_no`='{$_POST['req_pay_no']}')";
        $query2 = "UPDATE `customer_request_payment_details` SET `cus_req_balance`='0', `cus_req_inv_no`='{$inv_no}', `cus_req_status`='1', `cus_req_issued_date`=NOW() WHERE (`cus_req_no`='{$_POST['req_pay_no']}')";
        $result = $app->basic_command_query($query1);
        if ($result) {
            $app->basic_command_query($query2);
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "update_order_complete_remnder") {
        $query = "UPDATE `custom_request_details` SET `cus_req_complete_status`='1' WHERE (`cus_req_no`='{$_POST['req_id']}')";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
}