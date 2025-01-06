load_item_categories_to_table();

$('#save_item_cat').click(function () {
    get_item_categories_to_save();
});

$('#item_cat_search').keyup(function () {
    load_item_categories_to_table();
});

$('#reset_item_cat').click(function () {
    clear_item_categories();
});

$('#update_item_cat').click(function () {
    update_item_categories();
});

//==============================================================================
function clear_item_categories() {
    $('#item_cat_name').val('');
}

function get_item_categories_to_save() {
    var item_cat_name = $('#item_cat_name').val();

    var dataArray = {action: "get_item_categories_to_save", item_cat_name: item_cat_name}

    $.post("./models/item_category_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alert('Insert Query Ok');
            load_item_categories_to_table();
        } else {
            alert('Insert Failed');
        }
    });
}

function load_item_categories_to_table() {
    var tbl_data = "";
    var search = $('#item_cat_search').val();
    var dataArray = {action: "load_item_categories_to_table", search: search}
    $.post("./models/item_category_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            tbl_data += '<tr>';
            tbl_data += '<td>' + value.cat_name + '</td>';
            tbl_data += '<td><button type="button" class="btn btn-primary select" style="margin:4px;" value="' + value.cat_id + '">Select</button><button type="button" class="btn btn-danger delete" value="' + value.cat_id + '">Deactivate</button></td>';
            tbl_data += '</tr>';
        });
        $('#item_cat_table tbody').html('').append(tbl_data);

        $('.select').click(function () {
            get_item_categories_to_update($(this).val());
            $('#save_item_cat').addClass('d-none');
            $('#update_item_cat').removeClass('d-none');
        });
        
        $('.delete').click(function () {
            delete_item_category($(this).val());
        });
    }, 'json');
}

function get_item_categories_to_update(cat_id) {
    var dataArray = {action: "get_item_categories_to_update", cat_id: cat_id}
    $.post("./models/item_category_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            $('#item_cat_name').val(value.cat_name);
            localStorage.setItem('category', cat_id);
        });
    }, 'json');
}

function update_item_categories() {
    var item_cat_name = $('#item_cat_name').val();
    var cat_id = localStorage.getItem('category');

    var dataArray = {action: "update_item_categories", item_cat_name: item_cat_name, cat_id: cat_id}
    $.post("./models/item_category_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alert('Update Query Ok');
            load_item_categories_to_table();
            clear_item_categories();
        } else {
            alert('Update Failed');
        }
    });
}

function delete_item_category(cat_id) {
    var dataArray = {action: "delete_item_category", cat_id: cat_id}
    $.post("./models/item_category_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alert('delete ok');
            load_item_categories_to_table();
            clear_item_categories();
        } else {
            alert('delete not ok');
        }
    });
}



