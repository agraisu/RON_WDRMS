<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "get_supplier_to_save") {
        $query = "INSERT INTO `supplier_details` "
                . "( `sup_reg_no`, `sup_name`, `company_name`, `company_details`, `sup_email`, `sup_contact`, `sup_address`, `sup_added_user` ) "
                . "VALUES "
                . "( '{$_POST['sup_regi_no']}', '{$_POST['sup_name']}', '{$_POST['comp_name']}', '{$_POST['comp_details']}', '{$_POST['sup_email']}', '{$_POST['sup_contact']}', '{$_POST['sup_address']}', '{$_SESSION['user_id']}' );";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "load_suppliers_to_table") {
        $query = "SELECT "
                . "supplier_details.sup_id, "
                . "supplier_details.sup_reg_no, "
                . "supplier_details.sup_name, "
                . "supplier_details.company_name, "
                . "supplier_details.company_details, "
                . "supplier_details.sup_email, "
                . "supplier_details.sup_contact, "
                . "supplier_details.sup_address "
                . "FROM `supplier_details` "
                . "WHERE "
                . "supplier_details.sup_status = 1 AND "
                . "( supplier_details.sup_reg_no LIKE '{$_POST['search']}%' OR "
                . "supplier_details.sup_name LIKE '{$_POST['search']}%' OR "
                . "supplier_details.sup_email LIKE '{$_POST['search']}%' OR "
                . "supplier_details.sup_contact LIKE '{$_POST['search']}%' OR "
                . "supplier_details.sup_address LIKE '{$_POST['search']}%' )";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "get_suppliers_to_update") {
        $query = "SELECT
                  supplier_details.sup_reg_no,
                  supplier_details.sup_name,
                  supplier_details.company_name,
                  supplier_details.company_details,
                  supplier_details.sup_email,
                  supplier_details.sup_contact,
                  supplier_details.sup_address
                  FROM `supplier_details`
                  WHERE
                  supplier_details.sup_id = '{$_POST['sup_id']}'";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "update_suppliers") {
        $query = "UPDATE `supplier_details` SET "
                . "`sup_reg_no` = '{$_POST['sup_regi_no']}', "
                . "`sup_name` = '{$_POST['sup_name']}', "
                . "`company_name` = '{$_POST['comp_name']}', "
                . "`company_details` = '{$_POST['comp_details']}', "
                . "`sup_email` = '{$_POST['sup_email']}', "
                . "`sup_contact` = '{$_POST['sup_contact']}', "
                . "`sup_address` = '{$_POST['sup_address']}' "
                . "WHERE "
                . "(`sup_id` = '{$_POST['sup_id']}');";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "delete_suppliers") {
        $query = "UPDATE `supplier_details` SET `sup_status`='0' WHERE (`sup_id`='{$_POST['sup_id']}')";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "get_supplier_code") {
        $next_sup_id = $app->get_next_autoincrement_ID("supplier_details");
        echo $sup_code = "S000" . $next_sup_id;
        $_SESSION['sup_code'] = $sup_code;
    } elseif ($_POST['action'] == "check_sup_email") {
        $query = "SELECT supplier_details.sup_id FROM supplier_details WHERE supplier_details.sup_email = '{$_POST['sup_email']}'";
        $result = $app->row_count_quary($query);
        if ($result != 0) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
