get_invoice_no();
load_customers();
$('#invoice_qty').prop('disabled', true);

$('#invoice_items_search').keyup(function () {
    load_items_for_invoice();
});

$("#rent_price").keyup(function (e) {
    if (e.which == 13) {
        $('#invoice_qty').focus();
    }
});

$('#add_invoice_items').click(function () {
    save_invoice_items();
});

$('#advance_pay').keyup(function () {
    cal_advance();
});

$('#inv_issue_date').keyup(function () {
    exp_date_calculate();
});

$('#advance_pay').keyup(function () {
    var total_amount = $('#total_amount').val();
    var advance_pay = $('#advance_pay').val();
    if (parseFloat(advance_pay) > parseFloat(total_amount)) {
        $('#inv_advance_validity').removeClass('d-none');
        $('#add_inv_items').prop('disabled', true);
    } else {
        $('#inv_advance_validity').addClass('d-none');
        $('#add_inv_items').prop('disabled', false);
        validate_advance_pay();
    }
});

$('#add_inv_items').click(function () {
    finish_invoice();
});

$("#invoice_qty").keyup(function (e) {
    if (e.which == 13) {
        $('#add_invoice_items').focus();
    }
});

$('#invoice_qty').keyup(function () {
    var add_qty = $('#invoice_qty').val();
    var sys_qty = localStorage.getItem('item_qty');
    if (parseInt(add_qty) > parseInt(sys_qty)) {
        $('#qty_msg').removeClass('d-none');
        $('#add_invoice_items').prop('disabled', true);
    } else {
        $('#qty_msg').addClass('d-none');
        $('#add_invoice_items').prop('disabled', false);
        validate_invoice_qty();
    }
});

//==============================================================================

function validate_invoice_qty() {
    var invoice_qty = $('#invoice_qty').val();
    var old_invoice_qty = new RegExp('^[1-9][0-9]{0,3}$');
    if (old_invoice_qty.test(invoice_qty)) {
        $('#qty_valid').addClass('d-none');
        $('#add_invoice_items').prop("disabled", false);
    } else {
        $('#qty_valid').removeClass('d-none');
        $('#add_invoice_items').prop("disabled", true);
    }
}

function validate_advance_pay() {
    var advance_pay = $('#advance_pay').val();
    var old_advance_pay = new RegExp('^[0-9]{0,8}[.]{1}[0-9]{2}$');
    if (old_advance_pay.test(advance_pay)) {
        $('#inv_advance_valid').addClass('d-none');
        $('#add_inv_items').prop("disabled", false);
    } else {
        $('#inv_advance_valid').removeClass('d-none');
        $('#add_inv_items').prop("disabled", true);
    }
}

function form_validate() {
    var error = 0;

    var invoice_qty = $('#invoice_qty').val();

    if (invoice_qty.length == 0) {
        $('#qty_req').removeClass('d-none');
        error += 1;
    } else {
        $('#qty_req').addClass('d-none');
    }
    if (error > 0) {
        return false;
    } else {
        return true;
    }
}

function invoice_finish_validate() {
    var error = 0;

    var advance_pay = $('#advance_pay').val();

    if (advance_pay.length == 0) {
        $('#inv_advance_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#inv_advance_msg').addClass('d-none');
    }
    if (error > 0) {
        return false;
    } else {
        return true;
    }
}

function exp_date_calculate() {
    var date = $('#inv_issue_date').val();
    var keep_days = localStorage.getItem('keep_days');
    var dataArray = {action: "exp_date_calculate", date: date, keep_days: keep_days}
    $.post("./models/invoice_details_model.php", dataArray, function (reply) {
//        alert(reply)
    });
}

function get_invoice_no() {
    var dataArray = {action: "get_invoice_no"}
    $.post("./models/invoice_details_model.php", dataArray, function (reply) {
        $('#invoice_no').val(reply);
        load_invoice_items_to_table();
    });
}

function load_customers() {
    var data;
    var dataArray = {action: "load_customers"}
    $.post("./models/invoice_details_model.php", dataArray, function (reply) {
        data += '<option value="0">Please Select Customer</option>';
        $.each(reply, function (index, value) {
            data += '<option value="' + value.cus_id + '">' + value.cus_name + '</option>';
        });
        $('#cus_item').html('').append(data);
    }, 'json');
}

function load_items_for_invoice() {
    var tbl_data = "";
    var search = $('#invoice_items_search').val();
    var dataArray = {action: "load_items_for_invoice", search: search}
    $.post("./models/invoice_details_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            tbl_data += '<tr>';
            tbl_data += '<td>' + value.item_code + '</td>';
            tbl_data += '<td>' + value.item_name + '</td>';
            tbl_data += '<td>' + value.avl_qty + '</td>';
            tbl_data += '<td><button type="button" class="btn btn-primary select" style="margin-right:5px;" value="' + value.item_id + '~' + value.avl_qty + '"><i class="fas fa-hand-pointer" style="color: black"></i></button></td>';
            tbl_data += '</tr>';
        });
        $('#invoice_items_tbl tbody').html('').append(tbl_data);

        $('.select').click(function () {
            var x = $(this).val().split('~');
            localStorage.setItem("item_id", x[0]);
            localStorage.setItem("item_qty", x[1]);
            get_selected_item_details($(this).val());
            $('#invoice_qty').prop('disabled', false);
            $('#invoice_qty').val('');
            $('#invoice_qty').focus();
        });

    }, 'json');
}

function get_selected_item_details(itm_id) {
    var dataArray = {action: "get_selected_item_details", itm_id: itm_id}
    $.post("./models/invoice_details_model.php", dataArray, function (reply) {
        var x = reply.split('~');
        $('#rent_price').val(x[1]);
        $('#inv_exp_date').val(x[2]);
        localStorage.setItem('keep_days', x[0]);
    });
}

function save_invoice_items() {
    var inv_no = $('#invoice_no').val();
    var rent_price = $('#rent_price').val();
    var inv_qty = $('#invoice_qty').val();
    var item_id = localStorage.getItem("item_id");

    var dataArray = {action: "save_invoice_items", inv_no: inv_no, rent_price: rent_price, inv_qty: inv_qty, item_id: item_id}
    if (form_validate()) {
        $.post("./models/invoice_details_model.php", dataArray, function (reply) {
            if (reply == 1) {
                alertify.success('Success');
                get_invoice_no();

            } else {
                alertify.error('Error');
            }
        });
    }
}

function load_invoice_items_to_table() {
    var inv_no = $('#invoice_no').val();
    var tbl_data = "";
    var tot_inv_amt = 0;
    var search = $('#invoice_details_search').val();
    var dataArray = {action: "load_invoice_items_to_table", search: search, inv_no: inv_no}
    $.post("./models/invoice_details_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            tbl_data += '<tr>';
            tbl_data += '<td>' + value.item_name + '</td>';
            tbl_data += '<td>' + value.inv_itm_qty + '</td>';
            tbl_data += '<td>' + value.inv_unit_price + '</td>';
            tbl_data += '<td>' + value.tot_invoice + '</td>';
            tot_inv_amt += parseFloat(value.tot_invoice);
            tbl_data += '<td><button type="button" class="btn btn-danger delete" value="' + value.inv_itm_tbl_id + '"><i class="fas fa-trash" style="color: black"></i></button></td>';
            tbl_data += '</tr>';
        });
        localStorage.setItem('invoice_total', tot_inv_amt);
        $('#total_amount').val(tot_inv_amt.toFixed(2));
        $('#invoice_details_tbl tbody').html('').append(tbl_data);

        $('.delete').click(function () {
            var inv_item_id = $(this).val();

            alertify.confirm("Confirm Delete !", "Are you sure you want to delete this item ?",
                    function () {
                        delete_invoice_item(inv_item_id);
                    },
                    function () {
                        alertify.error('Delete Canceled');
                    });
        });
    }, 'json');
}

function cal_advance() {
    var tot_amount = $('#total_amount').val();
    var advance_amt = $('#advance_pay').val();
    var balance_amt = parseFloat(tot_amount) - parseFloat(advance_amt);
    $('#invoice_balance').val(balance_amt.toFixed(2));
}

function finish_invoice() {
    var inv_no = $('#invoice_no').val();
    var cus_id = $('#cus_item').val();
    var inv_paid = $('#advance_pay').val();
    var inv_balance = $('#invoice_balance').val();
    var inv_issue = $('#inv_issue_date').val();
    var inv_return = $('#inv_exp_date').val();
    var invoice_total = localStorage.getItem('invoice_total');
    if (cus_id != 0) {
        var dataArray = {action: "finish_invoice", inv_no: inv_no, cus_id: cus_id, inv_paid: inv_paid, inv_balance: inv_balance, inv_issue: inv_issue, inv_return: inv_return, invoice_total: invoice_total}
        if (invoice_finish_validate() && form_validate()) {
            $.post("./models/invoice_details_model.php", dataArray, function (reply) {
                if (reply == 1) {
                    alertify.success('Invoice Completed Successfully');
                    load_invoice_items_to_table();
                    get_invoice_no();
                    setTimeout(function () {
                        window.location = './?x=print_inv&inv_no=' + inv_no;
                    }, 3000);
                } else {
                    alertify.error('Invoice Complete Process Failed, Please Contact Admin');
                }
            });
        }
    } else {
        alertify.error('Please Select Customer');
    }
}

function delete_invoice_item(inv_item_id) {
    var dataArray = {action: "delete_invoice_item", inv_item_id: inv_item_id}
    $.post("./models/invoice_details_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alertify.success('Item Deleted Successfully');
            load_invoice_items_to_table();
        } else {
            alertify.error('Item Delete Failed');
        }
    });
}

