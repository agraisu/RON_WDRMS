load_category_list();
load_fabrics();
load_designs_to_table();

$('#cat_list').change(function () {
    load_fabrics();
});

$('#fabrics').change(function () {
    load_designs_to_table();
});

$('#save_design').click(function () {
    get_fabrics_to_save();
});

//==============================================================================

function load_category_list() {
    var data;
    var dataArray = {action: "load_category_list"}
    $.post("./models/design_details_model.php", dataArray, function (reply) {
        data += '<option value="0">Please select a Item Category</option>';
        $.each(reply, function (index, value) {
            data += '<option value="' + value.cat_id + '">' + value.cat_name + '</option>';
        });
        $('#cat_list').html('').append(data);
        load_fabrics();
    }, 'json');
}

function load_fabrics() {
    var data;
    var cat_list = $('#cat_list').val();
    var dataArray = {action: "load_fabrics", cat_list: cat_list}
    $.post("./models/design_details_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            data += '<option value="' + value.fabric_id + '">' + value.fabric_name + '</option>';
        });
        $('#fabrics').html('').append(data);
        load_designs_to_table();
    }, 'json');
}

function get_fabrics_to_save() {
    var fabrics = $('#fabrics').val();
    var fab_design = $('#fab_design').val();

    var dataArray = {action: "get_fabrics_to_save", fabrics: fabrics, fab_design: fab_design}

    $.post("./models/design_details_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alert('Insert Query Ok');
            load_designs_to_table();
        } else {
            alert('Insert Query not Ok');
        }
    });
}

function load_designs_to_table(){
    var table_data = "";
    var search = $('#design_search').val();
    var fabrics = $('#fabrics').val();
    var dataArray = {action: "load_designs_to_table", search: search, fabrics: fabrics}
    $.post("./models/design_details_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            table_data += '<tr>';
            table_data += '<td>' + value.design_name + '</td>';
            table_data += '<td><button type="button" class="btn btn-primary select" style="margin-right:5px;" value="' + value.design_id + '"><i class="fas fa-hand-pointer" style="color: black"></i></button><button type="button" class="btn btn-danger delete" value="' + value.design_id + '"><i class="fas fa-trash" style="color: black"></i></button></td>';
            table_data += '</tr>';
        });
        $('#design_table tbody').html('').append(table_data);
    }, 'json');
}







