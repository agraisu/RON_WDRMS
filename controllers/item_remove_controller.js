$('#remove_items_search').keyup(function () {
    load_items_to_remove();
});

$('#add_removed_items').click(function () {
    remove_damaged_items();
});

$('#view_dmg_stock').click(function () {
    $('#dmg_details_section').removeClass('d-none');
});

$('#dmg_qty').keyup(function () {
    var avl_qty = localStorage.getItem('avl_qty');
    var dmg_qty = $(this).val();
    if (parseInt(dmg_qty) > parseInt(avl_qty)) {
        alertify.error('items damaged quantity exceeded');
        $('#add_removed_items').prop('disabled', true);
    } else {
        $('#add_removed_items').prop('disabled', false);
    }
});


function load_items_to_remove() {
    var tbl_data = "";
    var search = $('#remove_items_search').val();
    var dataArray = {action: "load_items_to_remove", search: search}
    $.post("./models/item_remove_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            tbl_data += '<tr>';
            tbl_data += '<td>' + value.item_code + '</td>';
            tbl_data += '<td>' + value.item_name + '</td>';
            tbl_data += '<td>' + value.avl_qty + '</td>';
            tbl_data += '<td><button type="button" class="btn btn-primary select" style="margin-right:5px;" value="' + value.item_id + '~' + value.avl_qty + '~' + value.item_name + '"><i class="fas fa-hand-pointer" style="color: black"></i></button></td>';
            tbl_data += '</tr>';
        });
        $('#remove_items_tbl tbody').html('').append(tbl_data);
        $('.select').click(function () {
            var x = $(this).val().split('~');
            localStorage.setItem("item_id", x[0]);
            localStorage.setItem("avl_qty", x[1]);
            $('#selected_item').val(x[2]);
            $('#dmg_qty').focus();
        });
    }, 'json');
}

function remove_damaged_items() {
    var remove_note = $('#remove_note').val();
    var dmg_qty = $('#dmg_qty').val();
    var item_id = localStorage.getItem("item_id");

    var dataArray = {action: "remove_damaged_items", remove_note: remove_note, dmg_qty: dmg_qty, item_id: item_id}

    $.post("./models/item_remove_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alertify.success('Removed items successfully');
            load_items_to_remove();
            clear_form();
        } else {
            alertify.error('Items Remove Failed');
        }
    });
}

function clear_form() {
    $('#selected_item').val('');
    $('#dmg_qty').val('');
    $('#remove_note').val('');
    localStorage.setItem("item_id", 0);
    localStorage.setItem("avl_qty", 0);
    $('#remove_items_search').focus();
}
