<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "load_users") {
        $query = "SELECT
                  user_register.user_id,
                  CONCAT_WS(' - ',user_register.full_name,user_register.user_nic,user_register.user_role) AS user_data
                  FROM `user_register`
                  WHERE
                  user_register.user_status = 1";
        $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "load_ava_prv") {
        $query = "SELECT
                  system_privilages.prv_id,
                  system_privilages.prv_name
                  FROM `system_privilages`
                  WHERE
                  system_privilages.prv_type != 0 AND
                  system_privilages.prv_id NOT IN (SELECT
                  added_system_privilage.prv_added_id
                  FROM
                  added_system_privilage
                  WHERE
                  added_system_privilage.prv_user_id = '{$_POST['user_id']}')";
        $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "load_assign_prv") {
        $query = "SELECT
              added_system_privilage.prv_added_id,
              system_privilages.prv_name
              FROM
              added_system_privilage
              INNER JOIN system_privilages ON added_system_privilage.prv_added_id = system_privilages.prv_id
              WHERE
              added_system_privilage.prv_user_id = '{$_POST['user_id']}'";
        $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "custom_privilage_assign") {
        foreach ($_POST['selected_privilage'] AS $x) {
            $q1 = "SELECT system_privilages.prv_type FROM `system_privilages` WHERE system_privilages.prv_id = '{$x}'";
            $main_prv = $app->basic_Select_Query($q1);
            $q2 = "INSERT INTO `added_system_privilage` (`prv_user_id`, `prv_added_id`, `prv_main_id`) VALUES ('{$_POST['user']}', '{$x}', '{$main_prv[0]['prv_type']}');";
            $result = $app->basic_command_query($q2);
        }
        echo 1;
    } elseif ($_POST['action'] == "all_privilages_assign") {
        $query = "SELECT
                  system_privilages.prv_id,
                  system_privilages.prv_type
                  FROM `system_privilages`
                  WHERE
                  system_privilages.prv_type != 0 AND
                  system_privilages.prv_id NOT IN (SELECT
                  added_system_privilage.prv_added_id
                  FROM
                  added_system_privilage
                  WHERE
                  added_system_privilage.prv_user_id = '{$_POST['user']}')";
        $data = $app->basic_Select_Query($query);
        foreach ($data As $x) {
            $q2 = "INSERT INTO `added_system_privilage` (`prv_user_id`, `prv_added_id`, `prv_main_id`) VALUES ('{$_POST['user']}', '{$x['prv_id']}', '{$x['prv_type']}');";
            $result = $app->basic_command_query($q2);
        }
        echo 1;
    } elseif ($_POST['action'] == "remove_privilage") {
        foreach ($_POST['selected_privilage'] AS $x) {
            $q2 = "DELETE FROM `added_system_privilage` WHERE (`prv_user_id`='{$_POST['user']}') AND (`prv_added_id`='{$x}') ";
            $result = $app->basic_command_query($q2);
        }
        echo 1;
    } elseif ($_POST['action'] == "remove_all_privilage") {
        $q2 = "DELETE FROM `added_system_privilage` WHERE (`prv_user_id`='{$_POST['user']}') ";
        $result = $app->basic_command_query($q2);
        echo 1;
    }
} 
