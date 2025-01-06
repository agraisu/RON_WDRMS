<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "get_tailor_to_save") {
        $query = "INSERT INTO `tailor_details` "
                . "(`tailor_regi_no`, `tailor_name`, `tailor_nic`, `tailor_email`, `tailor_contact`, `tailor_address`, `tailor_added_user`) "
                . "VALUES "
                . "( '{$_POST['tailor_regi_no']}', '{$_POST['tailor_name']}', '{$_POST['tailor_nic']}', '{$_POST['tailor_email']}', '{$_POST['tailor_contact']}', '{$_POST['tailor_address']}', '{$_SESSION['user_id']}' );";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "get_tailor_code") {
        $next_tailor_id = $app->get_next_autoincrement_ID("tailor_details");
        echo $tailor_code = "T00" . $next_tailor_id;
        $_SESSION['tailor_code'] = $tailor_code;
    } elseif ($_POST['action'] == "check_tailor_nic") {
        $query = "SELECT tailor_details.tailor_id FROM `tailor_details` WHERE tailor_details.tailor_nic = '{$_POST['tailor_nic']}'";
        $result = $app->row_count_quary($query);
        if ($result != 0) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "check_tailor_email") {
        $query = "SELECT tailor_details.tailor_id FROM `tailor_details` WHERE tailor_details.tailor_email = '{$_POST['tailor_email']}'";
        $result = $app->row_count_quary($query);
        if ($result != 0) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "check_tailor_contact") {
        $query = "SELECT tailor_details.tailor_id FROM `tailor_details` WHERE tailor_details.tailor_contact = '{$_POST['tailor_contact']}'";
        $result = $app->row_count_quary($query);
        if ($result != 0) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "load_tailors_to_table") {
        $query = "SELECT
                  tailor_details.tailor_id,
                  tailor_details.tailor_regi_no,
                  tailor_details.tailor_name,
                  tailor_details.tailor_nic,
                  tailor_details.tailor_email,
                  tailor_details.tailor_contact,
                  tailor_details.tailor_status
                  FROM `tailor_details`
                  WHERE
                  (tailor_details.tailor_regi_no LIKE '{$_POST['search']}%' OR
                  tailor_details.tailor_name LIKE '{$_POST['search']}%' OR
                  tailor_details.tailor_nic LIKE '{$_POST['search']}%' OR
                  tailor_details.tailor_email LIKE '{$_POST['search']}%' OR
                  tailor_details.tailor_contact LIKE '{$_POST['search']}%')";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "update_tailors_status") {
        if ($_POST['type'] == "delete") {
            $query = "UPDATE `tailor_details` SET `tailor_status`='0' WHERE (`tailor_id`='{$_POST['tailor_id']}')";
        } elseif ($_POST['type'] == "temp_deactivate") {
            $query = "UPDATE `tailor_details` SET `tailor_status`='2' WHERE (`tailor_id`='{$_POST['tailor_id']}')";
        } else {
            $query = "UPDATE `tailor_details` SET `tailor_status`='1' WHERE (`tailor_id`='{$_POST['tailor_id']}')";
        }
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "get_tailors_to_update") {
        $query = "SELECT
                  tailor_details.tailor_regi_no,
                  tailor_details.tailor_name,
                  tailor_details.tailor_nic,
                  tailor_details.tailor_email,
                  tailor_details.tailor_contact,
                  tailor_details.tailor_address
                  FROM `tailor_details`
                  WHERE
                  tailor_details.tailor_id = '{$_POST['tailor_id']}'";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "update_tailors") {
        $query = "UPDATE `tailor_details` SET "
                . "`tailor_regi_no` = '{$_POST['tailor_regi_no']}', "
                . "`tailor_name` = '{$_POST['tailor_name']}', "
                . "`tailor_nic` = '{$_POST['tailor_nic']}', "
                . "`tailor_email` = '{$_POST['tailor_email']}', "
                . "`tailor_contact` = '{$_POST['tailor_contact']}', "
                . "`tailor_address` = '{$_POST['tailor_address']}' "
                . "WHERE "
                . "(`tailor_id` = '{$_POST['tailor_id']}');";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
}