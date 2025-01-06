<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "get_data_to_save") {
        $encrypted_password = $app->password_encript($_POST['password']);
        $query = "INSERT INTO `user_register` "
                . "( `full_name`, `user_nic`, `user_email`, `user_contact`, `user_address`, `user_name`, `user_password`, `user_role` ) "
                . "VALUES "
                . "( '{$_POST['full_name']}', '{$_POST['nic']}', '{$_POST['email']}', '{$_POST['contact']}', '{$_POST['address']}', '{$_POST['user_name']}', '{$encrypted_password}', '{$_POST['role']}' );";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "load_users_to_table") {
        $query = "SELECT "
                . "user_register.user_id, "
                . "user_register.full_name, "
                . "user_register.user_nic, "
                . "user_register.user_email, "
                . "user_register.user_contact, "
                . "user_register.user_address, "
                . "user_register.user_name, "
                . "user_register.user_password, "
                . "user_register.user_role, "
                . "user_register.user_status "
                . "FROM user_register "
                . "WHERE "
                . "(user_register.full_name LIKE '{$_POST['search']}%' OR "
                . "user_register.user_nic LIKE '{$_POST['search']}%' OR "
                . "user_register.user_email LIKE '{$_POST['search']}%' "
                . "OR user_register.user_contact LIKE '{$_POST['search']}%' "
                . "OR user_register.user_address LIKE '{$_POST['search']}%' OR "
                . "user_register.user_name LIKE '{$_POST['search']}%' OR "
                . "user_register.user_password = '{$_POST['search']}%' "
                . "OR user_register.user_role LIKE '{$_POST['search']}%')";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "get_users_to_update") {
        $query = "SELECT "
                . "user_register.full_name, "
                . "user_register.user_nic, "
                . "user_register.user_email, "
                . "user_register.user_contact, "
                . "user_register.user_address, "
                . "user_register.user_name, "
                . "user_register.user_role "
                . "FROM `user_register` "
                . "WHERE "
                . "user_register.user_id = '{$_POST['user_id']}'";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "update_users") {
        $query = "UPDATE `user_register` SET "
                . "`full_name` = '{$_POST['full_name']}', "
                . "`user_nic` = '{$_POST['nic']}', "
                . "`user_email` = '{$_POST['email']}', "
                . "`user_contact` = '{$_POST['contact']}', "
                . "`user_address` = '{$_POST['address']}', "
                . "`user_name` = '{$_POST['user_name']}', "
                . "`user_role` = '{$_POST['role']}' "
                . "WHERE "
                . "(`user_id` = '{$_POST['user_id']}');";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "update_users_status") {
        if ($_POST['type'] == "delete") {
            $query = "UPDATE `user_register` SET `user_status`='0' WHERE (`user_id`='{$_POST['user_id']}')";
        } elseif ($_POST['type'] == "temp_deactivate") {
            $query = "UPDATE `user_register` SET `user_status`='2' WHERE (`user_id`='{$_POST['user_id']}')";
        } else {
            $query = "UPDATE `user_register` SET `user_status`='1' WHERE (`user_id`='{$_POST['user_id']}')";
        }
        if ($_POST['user_id'] != $_SESSION['user_id']) {
            $result = $app->basic_command_query($query);
            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 99;
        }
    } elseif ($_POST['action'] == "check_nic") {
        $query = "SELECT user_register.user_id FROM user_register WHERE user_register.user_nic = '{$_POST['nic']}'";
        $result = $app->row_count_quary($query);
        if ($result != 0) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "check_email") {
        $query = "SELECT user_register.user_id FROM user_register WHERE user_register.user_email = '{$_POST['email']}'";
        $result = $app->row_count_quary($query);
        if ($result != 0) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "check_username") {
        $query = "SELECT user_register.user_id FROM user_register WHERE user_register.user_name = '{$_POST['user_name']}'";
        $result = $app->row_count_quary($query);
        if ($result != 0) {
            echo 1;
        } else {
            echo 0;
        }
    }
}

