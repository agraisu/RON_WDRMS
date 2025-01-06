get_grn_no();
load_suppliers();
load_items();
$('#total_qty').prop('disabled', true);
$('#purchased_price').prop('disabled', true);

$('#add_grn_items').click(function () {
    save_grn_items();
});

$('#finsh_grn').click(function () {
    finish_grn();
});

$('#items_search').keyup(function () {
    load_item_details_for_grn();
});

$("#total_qty").keyup(function (e) {
    if (e.which == 13) {
        $('#purchased_price').focus();
    }
    $('#purchased_price').prop('disabled', false);
    $('#purchased_price').focus();
});

$("#purchased_price").keyup(function (e) {
    if (e.which == 13) {
        $('#add_grn_items').focus();
    }
});

//==============================================================================

function form_validate() {
    var error = 0;

    var total_qty = $('#total_qty').val();
    var purchased_price = $('#purchased_price').val();

    if (total_qty.length == 0) {
        $('#qty_req').removeClass('d-none');
        error += 1;
    } else {
        $('#qty_req').addClass('d-none');
    }
    if (purchased_price.length == 0) {
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

function load_suppliers() {
    var data;
    var dataArray = {action: "load_suppliers"}
    $.post("./models/inventory_details_model.php", dataArray, function (reply) {
        data += '<option value="0">Please select supplier</option>';
        $.each(reply, function (index, value) {
            data += '<option value="' + value.sup_id + '">' + value.supp_name + '</option>';
        });
        $('#item_supplier').html('').append(data);
        chosenRefresh();
    }, 'json');
}

function load_items() {
    var data;
    var dataArray = {action: "load_items"}
    $.post("./models/inventory_details_model.php", dataArray, function (reply) {
        data += '<option value="0">Please select Item</option>';
        $.each(reply, function (index, value) {
            data += '<option value="' + value.item_id + '">' + value.item_name + '</option>';
        });
        $('#supplied_item').html('').append(data);
    }, 'json');
}

function get_grn_no() {
    var dataArray = {action: "get_grn_no"}
    $.post("./models/inventory_details_model.php", dataArray, function (reply) {
        $('#grn_no').val(reply);
        load_grn_items_to_table();
    });
}

function load_item_details_for_grn() {
    var tbl_data = "";
    var search = $('#items_search').val();
    var dataArray = {action: "load_item_details_for_grn", search: search}
    $.post("./models/inventory_details_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            tbl_data += '<tr>';
            tbl_data += '<td>' + value.item_code + '</td>';
            tbl_data += '<td>' + value.item_name + '</td>';
            tbl_data += '<td><button type="button" class="btn btn-primary select" style="margin-right:5px;" value="' + value.item_id + '"><i class="fas fa-hand-pointer" style="color: black"></i></button></td>';
            tbl_data += '</tr>';
        });
        $('#items_tbl tbody').html('').append(tbl_data);

        $('.select').click(function () {
            localStorage.setItem("item_id", $(this).val());
            $('#total_qty').prop('disabled', false);
            $('#total_qty').val('');
            $('#purchased_price').val('');
            $('#total_qty').focus();
        });

    }, 'json');
}

function save_grn_items() {
    var grn_no = $('#grn_no').val();
    var item_supplier = $('#item_supplier').val();
    var total_qty = $('#total_qty').val();
    var purchased_price = $('#purchased_price').val();
    var item_id = localStorage.getItem("item_id");

    var dataArray = {action: "save_grn_items", grn_no: grn_no, item_supplier: item_supplier, total_qty: total_qty, purchased_price: purchased_price, item_id: item_id}

    $.post("./models/inventory_details_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alertify.success('Item Added');
            load_grn_items_to_table();
            get_grn_no();
        } else {
            alertify.error('Error');
        }
    });
}

function load_grn_items_to_table() {
    var grn_no = $('#grn_no').val();
    var tbl_data = "";
    var tot_grn_amt = 0;
    var search = $('#stock_details_search').val();
    var dataArray = {action: "load_grn_items_to_table", search: search, grn_no: grn_no}
    $.post("./models/inventory_details_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            tbl_data += '<tr>';
            tbl_data += '<td>' + value.item_name + '</td>';
            tbl_data += '<td>' + value.total_qty + '</td>';
            tbl_data += '<td>' + value.unit_price + '</td>';
            tbl_data += '<td>' + value.tot_price + '</td>';
            tot_grn_amt += parseFloat(value.tot_price);
            tbl_data += '<td><button type="button" class="btn btn-primary select" style="margin-right:5px;" value="' + value.grn_itm_tbl_id + '"><i class="fas fa-hand-pointer" style="color: black"></i></button><button type="button" class="btn btn-danger delete" value="' + value.grn_itm_tbl_id + '"><i class="fas fa-trash" style="color: black"></i></button></td>';
            tbl_data += '</tr>';
        });
        localStorage.setItem('grn_total', tot_grn_amt);
        tbl_data += '<tr><td colspan="3" style="text-align: right; padding-right: 5px; color: green; font-size: 20px;"><b>GRN Total Amount : </b></td>';
        tbl_data += '<td colspan="2" style="text-align: left; padding-left: 15px; color: green;  font-size: 20px;"><b>' + tot_grn_amt.toFixed(2) + '</b></td></tr>';
        $('#stock_details_tbl tbody').html('').append(tbl_data);
    }, 'json');
}

function finish_grn() {
    var grn_no = $('#grn_no').val();
    var sup_id = $('#item_supplier').val();
    var grn_date = $('#grn_date').val();
    var grn_total = localStorage.getItem('grn_total');
    if (sup_id != 0) {
        var dataArray = {action: "finish_grn", grn_no: grn_no, sup_id: sup_id, grn_date: grn_date, grn_total: grn_total}
        $.post("./models/inventory_details_model.php", dataArray, function (reply) {
            if (reply == 1) {
                alertify.success('GRN Completed Successfully');
                load_grn_items_to_table();
                get_grn_no();
                setTimeout(function () {
                    window.location = './?x=grn_summry&grn_no=' + grn_no;
                }, 3000);
            } else {
                alertify.error('GRN Complete Process Failed, Please Contact Admin');
            }
        });
    } else {
        alertify.error('Please Select Supplier');
    }
}







