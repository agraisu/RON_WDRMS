load_Item_categories();
load_sizes_to_table();

$('#save_size').click(function () {
    save_category_size();
});

$('#category').change(function () {
    load_sizes_to_table();
});
//==============================================================================

function load_Item_categories() {
    var data;
    var dataArray = {action: "load_Item_categories"}
    $.post("./models/size_details_model.php", dataArray, function (reply) {
        data += '<option value="0">Please select a Item Category</option>';
        $.each(reply, function (index, value) {
            data += '<option value="' + value.cat_id + '">' + value.cat_name + '</option>';
        });
        $('#category').html('').append(data);
        load_sizes();
    }, 'json');
}

function save_category_size() {
    var category = $('#category').val();
    var cat_size = $('#cat_size').val();

    var dataArray = {action: "save_category_size", category: category, cat_size: cat_size}

    $.post("./models/size_details_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alert('Insert Query Ok');
            load_sizes_to_table();
        } else {
            alert('Insert Query not Ok');
        }
    });
}

function load_sizes_to_table(){
    var table_data = "";
    var search = $('#cat_size_search').val();
    var category = $('#category').val();
    var dataArray = {action: "load_sizes_to_table", search: search, category: category}
    $.post("./models/size_details_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            table_data += '<tr>';
            table_data += '<td>' + value.size + '</td>';
            table_data += '<td><button type="button" class="btn btn-primary select" style="margin-right:5px;" value="' + value.size_id + '"><i class="fas fa-hand-pointer" style="color: black"></i></button><button type="button" class="btn btn-danger delete" value="' + value.size_id + '"><i class="fas fa-trash" style="color: black"></i></button></td>';
            table_data += '</tr>';
        });
        $('#cat_size_table tbody').html('').append(table_data);
    }, 'json');
}






