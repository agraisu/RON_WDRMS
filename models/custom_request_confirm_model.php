<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "get_custom_requests_to_table") {
        $query = "SELECT
                  custom_request_details.cus_req_id,
                  custom_request_details.cus_req_no,
                  custom_request_details.cus_req_nic,
                  custom_request_details.cus_phone,
                  custom_request_details.cus_req_note,
                  custom_request_details.cus_req_photo,
                  custom_request_details.cus_req_required_date,
                  custom_request_details.cus_req_status,
                  customer_details.cus_name
                  FROM
                  custom_request_details
                  INNER JOIN customer_details ON custom_request_details.cus_req_nic = customer_details.cus_nic
                  WHERE
                  (custom_request_details.cus_req_status = 0 OR custom_request_details.cus_req_status = 1 OR custom_request_details.cus_req_status = 10) AND
                  (custom_request_details.cus_req_no LIKE '{$_POST['search']}%' OR
                  custom_request_details.cus_req_nic LIKE '{$_POST['search']}%' OR
                  custom_request_details.cus_phone LIKE '{$_POST['search']}%' OR
                  customer_details.cus_name LIKE '{$_POST['search']}%')
                  ORDER BY
                  custom_request_details.cus_req_no ASC";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "add_customer_request_payment") {
        $query = "INSERT INTO `customer_request_payment_details` "
                . "(`cus_req_no`, `cus_req_inv_no`, `cus_req_total`, `cus_req_advance`, `cus_req_balance`, `cus_req_inv_added_user`, `cus_req_note`) "
                . "VALUES "
                . "( '{$_POST['cus_req_no']}', '', '{$_POST['cus_req_total']}', '{$_POST['cus_req_advance']}', '{$_POST['cus_req_balance']}', '{$_SESSION['user_id']}', '{$_POST['cus_req_note']}' );";
        $result = $app->basic_command_query($query);

        $q2 = "UPDATE `custom_request_details` SET `cus_req_status`='10' WHERE (`cus_req_no`='{$_POST['cus_req_no']}')";
        if ($result) {
            $app->basic_command_query($q2);
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "contact_custom_request") {
        $query = "UPDATE `custom_request_details` SET `cus_req_status`='1' WHERE (`cus_req_id`='{$_POST['req_id']}')";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "load_tailors") {
        $query = "SELECT
tailor_details.tailor_id,
CONCAT_WS(' - ',tailor_regi_no,tailor_name,tailor_nic) AS tailor_data
FROM `tailor_details`
WHERE
tailor_details.tailor_status = 1";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "add_assigned_tailors") {
        $query = "INSERT INTO `tailor_job_assign_details` "
                . "( `tailor_id`, `tailor_req_id`, `tailor_target_date`, `tailor_assign_user` ) "
                . "VALUES ( '{$_POST['select_tailor']}', '{$_POST['selected_request']}', '{$_POST['target_date']}', '{$_SESSION['user_id']}' );";
        $result = $app->basic_command_query($query);
        $query_2 = "UPDATE `custom_request_details` SET `cus_req_status`='2' WHERE (`cus_req_no`='{$_POST['selected_request']}')";
        if ($result) {
            $app->basic_command_query($query_2);
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "load_assigned_jobs") {
        $query = "SELECT
CONCAT_WS(' - ',tailor_req_id,tailor_target_date,cus_req_note) AS assigned_details
FROM
tailor_job_assign_details
INNER JOIN customer_request_payment_details ON tailor_job_assign_details.tailor_req_id = customer_request_payment_details.cus_req_no
WHERE
tailor_job_assign_details.tailor_req_status = 0 AND
tailor_job_assign_details.tailor_id = '{$_POST['tailor_id']}'";
        $count = $app->row_count_quary($query);
        if ($count == 0) {
            echo 0;
        } else {
            $result = $app->json_encoded_select_query($query);
        }
    }
}