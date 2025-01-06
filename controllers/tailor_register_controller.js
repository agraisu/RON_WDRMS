load_tailors_to_table();
get_tailor_code();

$('#save_tailor').click(function () {
    get_tailor_to_save();
});

$('#tailor_search').keyup(function () {
    load_tailors_to_table();
});

$('#reset_tailor').click(function () {
    clear_tailors();
});

$('#tailor_nic').keyup(function () {
    check_tailor_nic();
});

$('#tailor_name').keyup(function () {
    validate_tailor_name();
});

$('#tailor_email').keyup(function () {
    check_tailor_email();
});

$('#update_tailor').click(function () {
    update_tailors();
    $('#save_tailor').removeClass('d-none');
    $('#update_tailor').addClass('d-none');
});
//==============================================================================

function form_validate() {
    var error = 0;

    var tailor_name = $('#tailor_name').val();
    var tailor_nic = $('#tailor_nic').val();
    var tailor_contact = $('#tailor_contact').val();

    if (tailor_name.length == 0) {
        $('#tailor_name_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#tailor_name_msg').addClass('d-none');
    }

    if (tailor_nic.length == 0) {
        $('#tailor_nic_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#tailor_nic_msg').addClass('d-none');
    }

    if (tailor_contact.length == 0) {
        $('#tailor_contact_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#tailor_contact_msg').addClass('d-none');
    }

    if (error > 0) {
        return false;
    } else {
        return true;
    }
}

//nic validation
function validate_tailor_nic() {
    var tailor_nic = $('#tailor_nic').val();
    //Old NIC regular expression
    var old_tailor_nic = new RegExp('^[0-9+]{9}[vV|xX]$');
    //NEW NIC regular expression
    var new_tailor_nic = new RegExp('^[0-9+]{12}$');
    if (tailor_nic.length == 10 && old_tailor_nic.test(tailor_nic)) {
        $('#tailor_nic_valid').addClass('d-none');
        $('#save_tailor').prop("disabled", false);
    } else if (tailor_nic.length == 12 && new_tailor_nic.test(tailor_nic)) {
        $('#tailor_nic_valid').addClass('d-none');
        $('#save_tailor').prop("disabled", false);
    } else {
        $('#tailor_nic_valid').removeClass('d-none');
        $('#save_tailor').prop("disabled", true);
    }
}

function validate_tailor_name() {
    var tailor_name = $('#tailor_name').val();
    var old_tailor_name = new RegExp('^([A-Z][a-z]+|[A-Z][a-z]+\\s{1}[A-Z][a-z]{1,}|[A-Z][a-z]+\\s{1}[A-Z][a-z]{3,}\\s{1}[A-Z][a-z]{1,})$');
    if (old_tailor_name.test(tailor_name)) {
        $('#tailor_name_valid').addClass('d-none');
        $('#save_tailor').prop("disabled", false);
    } else {
        $('#tailor_name_valid').removeClass('d-none');
        $('#save_tailor').prop("disabled", true);
    }
}

function validate_tailor_email() {
    var tailor_email = $('#tailor_email').val();
    var old_tailor_email = new RegExp('^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$');
    if (old_tailor_email.test(tailor_email)) {
        $('#tailor_email_valid').addClass('d-none');
        $('#save_tailor').prop("disabled", false);
    } else {
        $('#tailor_email_valid').removeClass('d-none');
        $('#save_tailor').prop("disabled", true);
    }
}

$('#tailor_contact').keyup(function () {
    var tailor_contact = $('#tailor_contact').val();
    if (isNaN(tailor_contact) || tailor_contact.length != 10) {
        $('#tailor_contact_valid').removeClass('d-none');
        $('#save_tailor').prop("disabled", true);
    } else {
        $('#tailor_contact_valid').addClass('d-none');
        $('#save_tailor').prop("disabled", false);
        check_tailor_contact();
    }
});

function check_tailor_nic() {
    var tailor_nic = $('#tailor_nic').val();
    var dataArray = {action: "check_tailor_nic", tailor_nic: tailor_nic}
    $.post("./models/tailor_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
            $('#tailor_nic_check').removeClass('d-none');
            $('#save_tailor').prop("disabled", true);
        } else {
            $('#tailor_nic_check').addClass('d-none');
            $('#save_tailor').prop("disabled", false);
            validate_tailor_nic();
        }
    });
}

function check_tailor_email() {
    var tailor_email = $('#tailor_email').val();
    var dataArray = {action: "check_tailor_email", tailor_email: tailor_email}
    $.post("./models/tailor_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
            $('#tailor_email_check').removeClass('d-none');
            $('#save_tailor').prop("disabled", true);
        } else {
            $('#tailor_email_check').addClass('d-none');
            $('#save_tailor').prop("disabled", false);
            validate_tailor_email();
        }
    });
}

function check_tailor_contact() {
    var tailor_contact = $('#tailor_contact').val();
    var dataArray = {action: "check_tailor_contact", tailor_contact: tailor_contact}
    $.post("./models/tailor_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
            $('#tailor_contact_check').removeClass('d-none');
            $('#save_tailor').prop("disabled", true);
        } else {
            $('#tailor_contact_check').addClass('d-none');
            $('#save_tailor').prop("disabled", false);
            validate_cus_email();
        }
    });
}


function clear_tailors() {
    $('#tailor_name').val('');
    $('#tailor_nic').val('');
    $('#tailor_email').val('');
    $('#tailor_contact').val('');
    $('#tailor_address').val('');
}

function get_tailor_to_save() {
    var tailor_regi_no = $('#tailor_regi_no').val();
    var tailor_name = $('#tailor_name').val();
    var tailor_nic = $('#tailor_nic').val();
    var tailor_email = $('#tailor_email').val();
    var tailor_contact = $('#tailor_contact').val();
    var tailor_address = $('#tailor_address').val();

    var dataArray = {action: "get_tailor_to_save", tailor_regi_no: tailor_regi_no, tailor_name: tailor_name, tailor_nic: tailor_nic, tailor_email: tailor_email, tailor_contact: tailor_contact, tailor_address: tailor_address}

    if (form_validate()) {
        $.post("./models/tailor_register_model.php", dataArray, function (reply) {
            if (reply == 1) {
                alertify.success('Tailor Added Successfully');
                load_tailors_to_table();
            } else {
                alertify.error('Tailor Added Failed');
            }
        });
    }
}

function load_tailors_to_table() {
    var tbl_data = "";
    var search = $('#tailor_search').val();
    var dataArray = {action: "load_tailors_to_table", search: search}
    $.post("./models/tailor_register_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            tbl_data += '<tr>';
            tbl_data += '<td>' + value.tailor_regi_no + '</td>';
            tbl_data += '<td>' + value.tailor_name + '</td>';
            tbl_data += '<td>' + value.tailor_nic + '</td>';
            tbl_data += '<td>' + value.tailor_contact + '</td>';
            if (value.tailor_status == 1) {
                tbl_data += '<td><button type="button" class="btn btn-primary select" style="margin-top:1px;margin-right:2px" value="' + value.tailor_id + '">Select</button><button type="button" class="btn btn-danger delete" style="margin-right:2px" value="' + value.tailor_id + '">Delete</button><button type="button" class="btn btn-warning tempdeactive" value="' + value.tailor_id + '">Deactivate</button></td>';
            } else if (value.tailor_status == 2) {
                tbl_data += '<td><button type="button" class="btn btn-success active" value="' + value.tailor_id + '">Activate User</button></td>';
            } else {
                tbl_data += '<td style="color: red; font-weight: bold; font-size: 18px;">Deleted</td>';
            }
            tbl_data += '</tr>';
        });
        $('#tailor_regi_table tbody').html('').append(tbl_data);

        $('.select').click(function () {
            get_tailors_to_update($(this).val());
            $('#save_tailor').addClass('d-none');
            $('#update_tailor').removeClass('d-none');
//            $('#nic_msg').addClass('d-none');
        });

        $('.delete').click(function () {
            update_tailors_status($(this).val(), 'delete');
        });

        $('.tempdeactive').click(function () {
            update_tailors_status($(this).val(), 'temp_deactivate');
        });

        $('.active').click(function () {
            update_tailors_status($(this).val(), 'active_tailor');
        });
    }, 'json');
}

function get_tailors_to_update(tailor_id) {
    var dataArray = {action: "get_tailors_to_update", tailor_id: tailor_id}
    $.post("./models/tailor_register_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            var tailor_name = $('#tailor_name').val(value.tailor_name);
            var tailor_nic = $('#tailor_nic').val(value.tailor_nic);
            var tailor_email = $('#tailor_email').val(value.tailor_email);
            var tailor_contact = $('#tailor_contact').val(value.tailor_contact);
            var tailor_address = $('#tailor_address').val(value.tailor_address);
            localStorage.setItem('tailor', tailor_id);
        });
    }, 'json');
}

function update_tailors() {
    var tailor_regi_no = $('#tailor_regi_no').val();
    var tailor_name = $('#tailor_name').val();
    var tailor_nic = $('#tailor_nic').val();
    var tailor_email = $('#tailor_email').val();
    var tailor_contact = $('#tailor_contact').val();
    var tailor_address = $('#tailor_address').val();
    var tailor_id = localStorage.getItem('tailor');

    var dataArray = {action: "update_tailors", tailor_regi_no: tailor_regi_no, tailor_name: tailor_name, tailor_nic: tailor_nic, tailor_email: tailor_email, tailor_contact: tailor_contact, tailor_address: tailor_address, tailor_id: tailor_id}
    $.post("./models/tailor_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alertify.success('Tailor Updated Successfully');
            load_tailors_to_table();
            clear_tailors();
        } else {
            alertify.error('Tailor Update Failed');
        }
    });
}

function get_tailor_code() {
    var dataArray = {action: "get_tailor_code"}
    $.post("./models/tailor_register_model.php", dataArray, function (reply) {
        $('#tailor_regi_no').val(reply);
    });
}

function update_tailors_status(tailor_id, type) {
    var conf_msg;
    if (type == 'delete') {
        conf_msg = 'Are you sure to delete this tailor ?'
    } else if (type == 'temp_deactivate') {
        conf_msg = 'Are you sure to temporarily deactivate this tailor ?'
    } else {
        conf_msg = 'Are you sure to activate this tailor ?'
    }
    alertify.confirm("Confirm Update Tailor Status !", conf_msg,
            function () {
                var dataArray = {action: "update_tailors_status", tailor_id: tailor_id, type: type}
                $.post("./models/tailor_register_model.php", dataArray, function (reply) {
                    if (reply == 1) {
                        if (type == 'delete') {
                            alertify.success('Tailor Deleted Successfully');
                        } else if (type == 'temp_deactivate') {
                            alertify.success('Tailor Deactivated Successfully');
                        } else {
                            alertify.success('Tailor Activated Successfully');
                        }
                        load_tailors_to_table();
                        clear_tailors();
                    } else if (reply == 0) {
                        alertify.error('Tailor Status Update Failed');
                    }
                });
            },
            function () {
                alertify.error('Tailor Status Update Canceled');
            });
}
