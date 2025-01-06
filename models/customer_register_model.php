<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "get_customer_to_save") {
        $cus_password = $app->password_encript($_POST['c_password']);
        $query = "INSERT INTO `customer_details` "
                . "( `cus_regi_no`, `cus_name`, `cus_gender`, `cus_nic`, `cus_email`, `cus_contact`, `cus_address`, `cus_login_code` ) "
                . "VALUES "
                . "( '{$_POST['cus_regi_no']}', '{$_POST['cus_name']}', '{$_POST['cus_gender']}', '{$_POST['cus_nic']}', '{$_POST['cus_email']}', '{$_POST['cus_contact']}', '{$_POST['cus_address']}', '{$cus_password}' );";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "load_customers_to_table") {
        $query = "SELECT "
                . "customer_details.cus_id, "
                . "customer_details.cus_regi_no, "
                . "customer_details.cus_name, "
                . "customer_details.cus_gender, "
                . "customer_details.cus_nic, "
                . "customer_details.cus_email, "
                . "customer_details.cus_contact, "
                . "customer_details.cus_address "
                . "FROM `customer_details` "
                . "WHERE "
                . "customer_details.cus_status = 1 AND "
                . "( customer_details.cus_regi_no LIKE '{$_POST['search']}%' OR "
                . "customer_details.cus_name LIKE '{$_POST['search']}%' OR "
                . "customer_details.cus_nic LIKE '{$_POST['search']}%' OR "
                . "customer_details.cus_email LIKE '{$_POST['search']}%' OR "
                . "customer_details.cus_contact LIKE '{$_POST['search']}%' )";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "delete_customers") {
        $query = "UPDATE `customer_details` SET `cus_status`='0' WHERE (`cus_id`='{$_POST['cus_id']}')";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "get_customers_to_update") {
        $query = "SELECT
                  customer_details.cus_regi_no,
                  customer_details.cus_name,
                  customer_details.cus_gender,
                  customer_details.cus_nic,
                  customer_details.cus_email,
                  customer_details.cus_contact,
                  customer_details.cus_address
                  FROM `customer_details`
                  WHERE
                  customer_details.cus_id = '{$_POST['cus_id']}'";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "update_customers") {
        $query = "UPDATE `customer_details` SET "
                . "`cus_regi_no` = '{$_POST['cus_regi_no']}', "
                . "`cus_name` = '{$_POST['cus_name']}', "
                . "`cus_gender` = '{$_POST['cus_gender']}', "
                . "`cus_nic` = '{$_POST['cus_nic']}', "
                . "`cus_email` = '{$_POST['cus_email']}', "
                . "`cus_contact` = '{$_POST['cus_contact']}', "
                . "`cus_address` = '{$_POST['cus_address']}' "
                . "WHERE "
                . "(`cus_id` = '{$_POST['cus_id']}');";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "get_customer_code") {
        $next_cus_id = $app->get_next_autoincrement_ID("customer_details");
        echo $customer_code = "C00" . $next_cus_id;
        $_SESSION['cus_code'] = $customer_code;
    } elseif ($_POST['action'] == "check_cus_nic") {
        $query = "SELECT customer_details.cus_id FROM `customer_details` WHERE customer_details.cus_nic = '{$_POST['cus_nic']}'";
        $result = $app->row_count_quary($query);
        if ($result != 0) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "check_cus_email") {
        $query = "SELECT customer_details.cus_id FROM `customer_details` WHERE customer_details.cus_email = '{$_POST['cus_email']}'";
        $result = $app->row_count_quary($query);
        if ($result != 0) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "check_cus_contact") {
        $query = "SELECT customer_details.cus_id FROM `customer_details` WHERE customer_details.cus_contact = '{$_POST['cus_contact']}'";
        $result = $app->row_count_quary($query);
        if ($result != 0) {
            echo 1;
        } else {
            echo 0;
        }
    }
}


