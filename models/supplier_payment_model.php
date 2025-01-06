<?php
require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================
if (isset($_POST['action'])) {
    if ($_POST['action'] == "load_suppliers") {
        $query = "SELECT
                   supplier_details.sup_id,
                   CONCAT_WS(' ', supplier_details.sup_reg_no,supplier_details.sup_name) AS supplier_name
                   FROM `supplier_details`
                   WHERE
                   supplier_details.sup_status = 1";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "load_grn_no") {
        $query = "SELECT
                  grn_details.grn_table_id,
                  CONCAT_WS(' / ', grn_details.grn_no,grn_details.grn_date,grn_details.balance_amount) AS grn
                  FROM `grn_details`
                  WHERE
                  grn_details.sup_id = '{$_POST['sup_id']}' AND
                  grn_details.grn_status = 1 AND
                  grn_details.balance_amount > 0";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "load_grn_details") {
        $query = "SELECT
                  grn_details.total_amount,
                  grn_details.paid_amount,
                  grn_details.balance_amount
                  FROM `grn_details`
                  WHERE
                  grn_details.grn_table_id = '{$_POST['grn_no']}'";
        $result = $app->json_encoded_select_query($query);
    } elseif ($_POST['action'] == "add_payments") {
        $query = "UPDATE `grn_details`
                 SET `paid_amount` = `paid_amount` + '{$_POST['payment']}',
                 `balance_amount` = `balance_amount` -  '{$_POST['payment']}'
                 WHERE
                 (`grn_table_id` = '{$_POST['grn_no']}');";
        $result = $app->basic_command_query($query);
        if($result){
            echo 1;
        } else{
            echo 0;
        }
    } elseif ($_POST['action'] == "payment_transaction") {
        $query = "INSERT INTO `supplier_payment_transactions` "
                . "(`sup_id`, `sup_grn_id`, `sup_paid_amount`, `sup_paid_user_id`) "
                . "VALUES "
                . "( '{$_POST['sup_id']}', '{$_POST['sup_grn_id']}', '{$_POST['paid_amt']}', '{$_SESSION['user_id']}' );";
        $result = $app->basic_command_query($query);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    } elseif ($_POST['action'] == "load_payment_transaction_to_table") {
        $query = "SELECT
                  supplier_payment_transactions.sup_pay_id,
                  supplier_payment_transactions.sup_paid_amount,
                  supplier_payment_transactions.sup_paid_date_time,
                  CONCAT_WS(' - ',user_register.full_name,user_register.user_nic) AS user_details,
                  IF(supplier_payment_transactions.sup_paid_status = 1, 'Active', IF(supplier_payment_transactions.sup_paid_status = 0, 'Cancelled', 'Hold')) AS payment_status
                  FROM
                  supplier_payment_transactions
                  INNER JOIN user_register ON supplier_payment_transactions.sup_paid_user_id = user_register.user_id
                  WHERE
                  supplier_payment_transactions.sup_grn_id = '{$_POST['grn_id']}'";
        $result = $app->json_encoded_select_query($query);
    }
}