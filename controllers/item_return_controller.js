$("#invoice_no").val('INV');

$("#invoice_no").keyup(function (e) {
    if (e.which == 13) {
        check_invoice();
    }
});

$("#invoice_no").focusin(function () {
    $(this).val('');
    $(this).val('INV');
});

$('#other_fine').keyup(function () {
    var o_fine = $(this).val();
    var balance = $('#pay_balance').val();
    var late_fine = $('#late_fine').val();
    var final_tot = parseFloat(o_fine) + parseFloat(balance) + parseFloat(late_fine);
    $('#final_amot').val(final_tot);
});

$('#add_return_items').click(function () {
    save_return_items();
});

$('#dmg_no').click(function () {
    if ($('#dmg_no').is(':checked')) {
        $('#damage_section').addClass('d-none');
    } else {
        $('#damage_section').removeClass('d-none');
    }
});

$('#dmg_yes').click(function () {
    if ($('#dmg_yes').is(':checked')) {
        $('#damage_section').removeClass('d-none');
    } else {
        $('#damage_section').addClass('d-none');
    }
});

$('#add_dmg').click(function () {
    add_dmg_qty();
});

//==============================================================================

function load_dmge_itm_tbl() {
    var inv_no = $('#invoice_no').val();
    var tbl_data = "";
    var dataArray = {action: "load_dmge_itm_tbl", inv_no: inv_no}
    $.post("./models/item_return_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            tbl_data += '<tr>';
            tbl_data += '<td>' + value.item_name + '</td>';
            tbl_data += '<td>' + value.damage_qty + '</td>';
            tbl_data += '<td><button type="button" class="btn btn-warning remove" value="' + value.inv_itm_tbl_id + '">Remove</button></td>';
            tbl_data += '</tr>';
        });
        $('#return_items_tbl tbody').html('').append(tbl_data);

        $('.remove').click(function () {
            var id = $(this).val();
            remove_added_damg_item(id);
        });

    }, 'json');
}

function remove_added_damg_item(id) {

}

function add_dmg_qty() {
    var inv_tbl_id = $("#select_item").val();
    var damaged_qty = $("#damaged_qty").val();
    var dataArray = {action: "add_dmg_qty", inv_tbl_id: inv_tbl_id, damaged_qty: damaged_qty}
    $.post("./models/item_return_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alertify.success('Sucssesfully Updated return Item');
            load_dmge_itm_tbl();
        } else {
            alertify.error('Return Update Failed');
        }
    });
}

function check_invoice() {
    var invoice_no = $("#invoice_no").val();
    var dataArray = {action: "check_invoice", invoice_no: invoice_no}
    $.post("./models/item_return_model.php", dataArray, function (reply) {
        if (reply == 1) {
            get_invoice_items();
            get_return_item_details();
        } else {
            alertify.error('Already Settled the Payment');
        }
    });
}

function get_invoice_items() {
    var inv_no = $('#invoice_no').val();
    var data;
    var dataArray = {action: "get_invoice_items", inv_no: inv_no}
    $.post("./models/item_return_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            data += '<option value="' + value.inv_itm_tbl_id + '">' + value.itm_details + '</option>';
        });
        $('#select_item').html('').append(data);
        load_dmge_itm_tbl();
    }, 'json');
}

//function get_invoice_items() {
//    var inv_no = $('#invoice_no').val();
//    var tbl_data = "";
//    var inv_amt = 0;
//    var dataArray = {action: "get_invoice_items", inv_no: inv_no}
//    $.post("./models/item_return_model.php", dataArray, function (reply) {
//        $.each(reply, function (index, value) {
//            tbl_data += '<tr>';
//            tbl_data += '<td>' + value.item_name + '</td>';
//            tbl_data += '<td>' + value.inv_itm_qty + '</td>';
//            tbl_data += '<td>' + value.inv_unit_price + '</td>';
//            tbl_data += '<td>' + value.item_total + '</td>';
//            tbl_data += '<td><input type="checkbox" class="form-control" value=""></td>';
//            inv_amt += parseFloat(value.item_total);
//            tbl_data += '</tr>';
//        });
//        localStorage.setItem('invoice_total_amot', inv_amt);
//        $('#return_items_tbl tbody').html('').append(tbl_data);
//    }, 'json');
//}

function get_return_item_details() {
    var inv_no = $('#invoice_no').val();
    var dataArray = {action: "get_return_item_details", inv_no: inv_no}
    $.post("./models/item_return_model.php", dataArray, function (reply) {
        var x = reply.split('~');
        $('#late_fine').val(x[0]);
        $('#item_issue_date').val(x[1]);
        $('#item_return_date').val(x[2]);
        $('#pay_invoice').val(x[3]);
        $('#pay_balance').val(x[4]);
        $('#paid_invoice').val(x[5]);
        localStorage.setItem('contact', x[6]);

        var final_tot = parseFloat(x[4]) + parseFloat(x[0]);
        $('#final_amot').val(final_tot);
    });
}


function save_return_items() {
    var invoive_no = $('#invoice_no').val();
    var late_ret_fine = $('#late_fine').val();
    var other_fine = $('#other_fine').val();
    var ret_note = $('#return_note').val();
    var final_amot = $('#final_amot').val();


    var dataArray = {action: "save_return_items", invoive_no: invoive_no, late_ret_fine: late_ret_fine, other_fine: other_fine, ret_note: ret_note, final_amot: final_amot}

    $.post("./models/item_return_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alertify.success('Success');
            var sms = "Your payment has been successfully completed, Thank you! come again (RON Renters 0769778780)";
//            send_sms(localStorage.getItem('contact'), sms);
            setTimeout(function () {
                window.location = './?x=print_inv&return&inv_no=' + invoive_no;
            }, 3000);
        } else {
            alertify.error('Error');
        }
    });
}

