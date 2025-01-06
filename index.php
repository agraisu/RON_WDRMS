<?php

if (isset($_GET['x'])) {
    if ($_GET['x'] == "sample") {
        require_once './views/sample_form.php';
    } elseif ($_GET['x'] == "user") {
        require_once './views/sys_user_register.php';
    } elseif ($_GET['x'] == "login") {
        require_once './views/login.php';
    } elseif ($_GET['x'] == "dashboard") {
        require_once './views/dashboard.php';
    } elseif ($_GET['x'] == "privilage") {
        require_once './views/user_privilage.php';
    } elseif ($_GET['x'] == "item") {
        require_once './views/item_register.php';
    } elseif ($_GET['x'] == "customer") {
        require_once './views/customer_register.php';
    } elseif ($_GET['x'] == "supplier") {
        require_once './views/supplier_register.php';
    } elseif ($_GET['x'] == "category") {
        require_once './views/item_category.php';
    } elseif ($_GET['x'] == "size") {
        require_once './views/size_details.php';
    } elseif ($_GET['x'] == "fabric") {
        require_once './views/fabric_details.php';
    } elseif ($_GET['x'] == "design") {
        require_once './views/design_details.php';
    } elseif ($_GET['x'] == "inventory") {
        require_once './views/inventory_details.php';
    } elseif ($_GET['x'] == "invoice") {
        require_once './views/invoice_details.php';
    } elseif ($_GET['x'] == "grn_summry") {
        require_once './others/report/grn_summery.php';
    } elseif ($_GET['x'] == "supplier_payment") {
        require_once './views/supplier_payment.php';
    } elseif ($_GET['x'] == "item_return") {
        require_once './views/item_return_details.php';
    } elseif ($_GET['x'] == "print_inv") {
        require_once './others/report/invoice.php';
    } elseif ($_GET['x'] == "system_inventory") {
        require_once './views/system_inventory.php';
    } elseif ($_GET['x'] == "item_remove") {
        require_once './views/item_remove.php';
    } elseif ($_GET['x'] == "tailor_register") {
        require_once './views/tailor_register.php';
    } elseif ($_GET['x'] == "cus_req_status") {
        require_once './views/custom_request_confirm.php';
    } elseif ($_GET['x'] == "cus_req_complete") {
        require_once './views/custom_request_payment.php';
    } elseif ($_GET['x'] == "backup") {
        require_once './views/backup.php';
    } elseif ($_GET['x'] == "item_summary") {
        require_once './others/report/item_summary.php';
    } elseif ($_GET['x'] == "sup_summary") {
        require_once './others/report/supplier_summary.php';
    } elseif ($_GET['x'] == "cus_summary") {
        require_once './others/report/customer_summary.php';
    } elseif ($_GET['x'] == "date_grn") {
        require_once './others/report/date_range_wise_grn.php';
    } elseif ($_GET['x'] == "grn_payment_status") {
        require_once './others/report/grn_payment_status.php';
    } elseif ($_GET['x'] == "item_cat_sales") {
        require_once './others/report/item_category_sale_summary.php';
    } elseif ($_GET['x'] == "item_cat_invoice") {
        require_once './others/report/item_cat_invoice_summary.php';
    } elseif ($_GET['x'] == "invoice_summary") {
        require_once './others/report/invoice_summary.php';
    } elseif ($_GET['x'] == "item_cat_chart") {
        require_once './others/report/cat_wise_summary_chart.php';
    } elseif ($_GET['x'] == "print_req_inv") {
        require_once './others/report/custom_req_invoice.php';
    } elseif ($_GET['x'] == "print_req_recipt") {
        require_once './others/report/custom_req_receipt.php';
    } elseif ($_GET['x'] == "profile") {
        require_once './views/profile.php';
    }
} else {
    require_once './views/login.php';
}

