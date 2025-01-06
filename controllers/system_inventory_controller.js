get_stock_items_to_table();

$("#search_stock_tbl").keyup(function () {
    get_stock_items_to_table();
});

//==============================================================================

function get_stock_items_to_table() {
    var tbl_data = "";
    var search = $('#search_stock_tbl').val();
        var dataArray = {action: "get_stock_items_to_table", search: search}
        $.post("./models/system_inventory_model.php", dataArray, function (reply) {
            $.each(reply, function (index, value) {
                tbl_data += '<tr>';
                tbl_data += '<td>' + value.item_code + '</td>';
                tbl_data += '<td>' + value.item_name + '</td>';
                tbl_data += '<td>' + value.avl_qty + '</td>';
                tbl_data += '</tr>';
            });
            $('#view_stock_tbl tbody').html('').append(tbl_data);
        }, 'json');
}