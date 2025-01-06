load_categories_types();
load_fabrics_to_table();

$('#save_fabric').click(function () {
    save_fabric();
});

$('#fabric_search').keyup(function () {
    load_fabrics_to_table();
});

$('#cat_type').change(function () {
    load_fabrics_to_table();
});
//==============================================================================

function load_categories_types() {
    var data;
    var dataArray = {action: "load_categories_types"}
    $.post("./models/fabric_details_model.php", dataArray, function (reply) {
        data += '<option value="0">Please select a Item Category</option>';
        $.each(reply, function (index, value) {
            data += '<option value="' + value.cat_id + '">' + value.cat_name + '</option>';
        });
        $('#cat_type').html('').append(data);
    }, 'json');
}

function save_fabric() {
    var cat_type = $('#cat_type').val();
    var fab_type = $('#fab_type').val();

    var dataArray = {action: "save_fabric", cat_type: cat_type, fab_type: fab_type}

    $.post("./models/fabric_details_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alert('Insert Query Ok');
            load_fabrics_to_table();
        } else {
            alert('Insert Query not Ok');
        }
    });
}

function load_fabrics_to_table(){
    var table_data = "";
    var search = $('#fabric_search').val();
    var cat_type = $('#cat_type').val();
    var dataArray = {action: "load_fabrics_to_table", search: search, cat_type: cat_type}
    $.post("./models/fabric_details_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            table_data += '<tr>';
            table_data += '<td>' + value.fabric_name + '</td>';
            table_data += '<td><button type="button" class="btn btn-primary select" style="margin-right:5px;" value="' + value.fabric_id + '"><i class="fas fa-hand-pointer" style="color: black"></i></button><button type="button" class="btn btn-danger delete" value="' + value.fabric_id + '"><i class="fas fa-trash" style="color: black"></i></button></td>';
            table_data += '</tr>';
        });
        $('#fabric_table tbody').html('').append(table_data);
    }, 'json');
}






