load_system_status();
load_lower_items_to_table();
load_recent_items_to_table();



function load_system_status() {
    var dataArray = {action: "load_system_status"}
    $.post("./models/dashboard_model.php", dataArray, function (reply) {
        var x = reply.split('~');
        $('#tot_cus').html(x[0]);
        $('#today_inv_amot').html(x[1]);
        $('#today_ret_amot').html(x[2]);
        $('#total_balance_amt').html(x[3]);
        $('#late_return_inv_cnt').html(x[4]);
    });
}

function load_lower_items_to_table() {
    var tbl_data = "";
    var dataArray = {action: "load_lower_items_to_table"}
    $.post("./models/dashboard_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            tbl_data += '<tr>';
            tbl_data += '<td>' + value.item_name + '</td>';
            tbl_data += '<td>' + value.avl_qty + '</td>';
            tbl_data += '</tr>';
        });
        $('#low_itms_tbl tbody').html('').append(tbl_data);
    }, 'json');
}

function load_recent_items_to_table() {
    var tbl_data = "";
    var dataArray = {action: "load_recent_items_to_table"}
    $.post("./models/dashboard_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            tbl_data += '<tr>';
            tbl_data += '<td>' + value.item_name + '</td>';
            tbl_data += '<td>' + value.item_rent_price + '</td>';
            tbl_data += '</tr>';
        });
        $('#recent_itms_tbl tbody').html('').append(tbl_data);
    }, 'json');
}




