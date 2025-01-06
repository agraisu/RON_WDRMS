<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//===========================================================================
//user login
if (isset($_POST['action'])) {
    if ($_POST['action'] == "login_to_system") {
        $username = $_POST['username'];
        $password = $app->password_encript($_POST['password']);
        //query to extract user details from db
        $query = "SELECT
                  user_register.user_id,
                  user_register.full_name,
                  user_register.user_email,
                  user_register.user_role,
                  user_register.user_status
                  FROM
                  `user_register`
                  WHERE
                  user_register.user_name = '{$username}'
                  AND user_register.user_password = '{$password}'";
        $user_count = $app->row_count_quary($query);
        //if user exist get data of user
        if ($user_count == 1) {
            $user_data = $app->basic_Select_Query($query);

            $query_2 = "SELECT
                    added_system_privilage.prv_added_id
                    FROM
                    added_system_privilage
                    WHERE
                    added_system_privilage.prv_user_id = '{$user_data[0]['user_id']}' AND
                    added_system_privilage.prv_main_id = 800";
            $dash_count = $app->row_count_quary($query_2);
            $dash_content = $app->basic_Select_Query($query_2);

            if ($dash_count == 0) {
                $_SESSION['d999'] = 999;
            } else {
                foreach ($dash_content AS $aa) {
                    if ($aa['prv_added_id'] == 801) {
                        $_SESSION['d801'] = 801;
                    } elseif ($aa['prv_added_id'] == 802) {
                        $_SESSION['d802'] = 802;
                    } elseif ($aa['prv_added_id'] == 803) {
                        $_SESSION['d803'] = 803;
                    } elseif ($aa['prv_added_id'] == 804) {
                        $_SESSION['d804'] = 804;
                    } elseif ($aa['prv_added_id'] == 805) {
                        $_SESSION['d805'] = 805;
                    } elseif ($aa['prv_added_id'] == 806) {
                        $_SESSION['d806'] = 806;
                    } elseif ($aa['prv_added_id'] == 807) {
                        $_SESSION['d807'] = 807;
                    } elseif ($aa['prv_added_id'] == 808) {
                        $_SESSION['d808'] = 808;
                    }
                }
            }

            if ($user_data[0]['user_status'] == 0) {
                echo 99;
            } elseif ($user_data[0]['user_status'] == 2) {
                echo 100;
            } else {
                //to keep values temporaly when we log
                //a session can access in anywhere inside system unlike variable which is only accessible in relavent page
                $_SESSION['user_id'] = $user_data[0]['user_id'];
                $_SESSION['name'] = $user_data[0]['full_name'];
                $_SESSION['email'] = $user_data[0]['user_email'];
                $_SESSION['user_role'] = $user_data[0]['user_role'];
                echo 1;
            }
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "customer_reminder_msg") {
        $query = "SELECT
                  invoice_details.inv_tbl_id,
                  invoice_details.inv_no,
                  invoice_details.inv_paid_amt,
                  invoice_details.inv_balance_amt,
                  customer_details.cus_name,
                  customer_details.cus_contact,
                  invoice_details.inv_return_date
                  FROM
                  invoice_details
                  INNER JOIN customer_details ON invoice_details.inv_cus_id = customer_details.cus_id
                  WHERE
                  invoice_details.inv_status = 1 AND
                  invoice_details.inv_remind_status = 0";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "update_remind_status") {
        if ($_POST['type'] == 'remind') {
            $query = "UPDATE `invoice_details` SET `inv_remind_status`='1' WHERE (`inv_tbl_id`='{$_POST['inv_id']}')";
        } else {
            $query = "UPDATE `invoice_details` SET `inv_fine_reminder`='1' WHERE (`inv_tbl_id`='{$_POST['inv_id']}')";
        }
        $result = $app->basic_command_query($query);
    } elseif ($_POST['action'] == "fine_charge_reminder") {
        $query = "SELECT
                  invoice_details.inv_tbl_id,
                  invoice_details.inv_no,
                  customer_details.cus_name,
                  invoice_details.inv_amount,
                  invoice_details.inv_paid_amt,
                  invoice_details.inv_balance_amt,
                  invoice_details.inv_issue_date,
                  invoice_details.inv_return_date,
                  customer_details.cus_contact
                  FROM
                  invoice_details
                  INNER JOIN customer_details ON invoice_details.inv_cus_id = customer_details.cus_id
                  WHERE
                  invoice_details.inv_fine_reminder = 0 AND
                  invoice_details.inv_status = 1 AND
                  invoice_details.inv_return_date < CURDATE()";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "system_log_out") {
        unset($_SESSION['user_id']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        unset($_SESSION['d801']);
        unset($_SESSION['d802']);
        unset($_SESSION['d803']);
        unset($_SESSION['d804']);
        unset($_SESSION['d805']);
        unset($_SESSION['d806']);
        unset($_SESSION['d807']);
        unset($_SESSION['d808']);
        unset($_SESSION['d999']);
        echo 1;
    }
}


