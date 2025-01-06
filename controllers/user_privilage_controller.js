load_users();
$('#user').change(function () {
    load_ava_prv();
    load_assign_prv();
});

$('#custom_add').click(function () {
    custom_privilage_assign();
});

$('#all_add').click(function () {
    all_privilages_assign();
});

$('#custom_remove').click(function () {
    remove_privilage();
});

$('#all_remove').click(function () {
    remove_all_privilage();
});
//==============================================================================

function load_users() {
    var data;
    var dataArray = {action: "load_users"}
    $.post("./models/user_privilage_model.php", dataArray, function (reply) {
        data += '<option value="0">Select User</option>';
        $.each(reply, function (index, value) {
            data += '<option value="' + value.user_id + '">' + value.user_data + '</option>';
        });
        $('#user').html('').append(data);
    }, 'json');
}

function load_ava_prv() {
    var data;
    var user_id = $('#user').val();
    var dataArray = {action: "load_ava_prv", user_id: user_id}
    $.post("./models/user_privilage_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            data += '<option value="' + value.prv_id + '" style="color: black; font-size: 20px; background-color: gray; margin: 5px;">' + value.prv_name + '</option>';
        });
        $('#aval_pri').html('').append(data);
    }, 'json');
}

function load_assign_prv() {
    var data;
    var user_id = $('#user').val();
    var dataArray = {action: "load_assign_prv", user_id: user_id}
    $.post("./models/user_privilage_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            data += '<option value="' + value.prv_added_id + '" style="color: white; font-size: 20px; background-color: #026fcc; margin: 5px;">' + value.prv_name + '</option>';
        });
        $('#assign_pri').html('').append(data);
    }, 'json');
}

function custom_privilage_assign() {
    var user = $('#user').val();
    var selected_privilage = $('#aval_pri').val();
    var dataArray = {action: "custom_privilage_assign", selected_privilage: selected_privilage, user: user}
    $.post("./models/user_privilage_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alert('OK');
            load_ava_prv();
            load_assign_prv();
        }
    });
}

function all_privilages_assign() {
    var user = $('#user').val();
    var dataArray = {action: "all_privilages_assign", user: user}
    $.post("./models/user_privilage_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alert('OK');
            load_ava_prv();
            load_assign_prv();
        }
    });
}


function remove_privilage() {
    var user = $('#user').val();
    var selected_privilage = $('#assign_pri').val();
    var dataArray = {action: "remove_privilage", selected_privilage: selected_privilage, user: user}
    $.post("./models/user_privilage_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alert('OK');
            load_ava_prv();
            load_assign_prv();
        }
    });
}

function remove_all_privilage() {
    var user = $('#user').val();
    var dataArray = {action: "remove_all_privilage", user: user}
    $.post("./models/user_privilage_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alert('OK');
            load_ava_prv();
            load_assign_prv();
        }
    });
}


