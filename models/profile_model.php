<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "update_profile") {
        $query = "UPDATE `user_register` SET "
                . "`full_name`='{$_POST['f_name']}', "
                . "`user_email`='{$_POST['u_email']}', "
                . "`user_address`='{$_POST['u_address']}' "
                . "WHERE "
                . "(`user_id`='{$_SESSION['user_id']}');";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
}