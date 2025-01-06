load_users_to_table();

$('#save_user').click(function () {
    get_data_to_save();
});

$('#update_user').click(function () {
    update_users();
});

$('#full_name').keyup(function () {
    validate_full_name();
});

$('#nic').keyup(function () {
    check_nic();
});

$('#email').keyup(function () {
    check_email();
});

$('#user_name').keyup(function () {
    check_username();
});

$('#confirm_passs').keyup(function () {
    var pw = $('#password').val();
    var confrim_pw = $(this).val();
    if (pw != confrim_pw) {
        $('#match_passs_msg').removeClass('d-none');
    } else {
        $('#match_passs_msg').addClass('d-none');
    }
});


//nic validation
function validate_nic() {
    var nic = $('#nic').val();
    //Old NIC regular expression
    var old_nic = new RegExp('^[0-9+]{9}[vV|xX]$');
    //NEW NIC regular expression
    var new_nic = new RegExp('^[0-9+]{12}$');
    if (nic.length == 10 && old_nic.test(nic)) {
        $('#nic_valid_msg').addClass('d-none');
        $('#save_user').prop("disabled", false);
        $('#nic').removeClass('error_background');
        $('#nic').addClass('validated_background');
    } else if (nic.length == 12 && new_nic.test(nic)) {
        $('#nic_valid_msg').addClass('d-none');
        $('#save_user').prop("disabled", false);
        $('#nic').removeClass('error_background');
        $('#nic').addClass('validated_background');
    } else {
        $('#nic_valid_msg').removeClass('d-none');
        $('#save_user').prop("disabled", true);
        $('#nic').removeClass('validated_background');
        $('#nic').addClass('error_background');
    }
}

function validate_full_name() {
    var full_name = $('#full_name').val();
    var old_full_name = new RegExp('^([A-Z][a-z]+|[A-Z][a-z]+\\s{1}[A-Z][a-z]{1,}|[A-Z][a-z]+\\s{1}[A-Z][a-z]{3,}\\s{1}[A-Z][a-z]{1,})$');
    if (old_full_name.test(full_name)) {
        $('#full_name_valid_msg').addClass('d-none');
        $('#save_user').prop("disabled", false);
    } else {
        $('#full_name_valid_msg').removeClass('d-none');
        $('#save_user').prop("disabled", true);
    }
}

function validate_email() {
    var email = $('#email').val();
    var old_email = new RegExp('^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$');
    if (old_email.test(email)) {
        $('#email_valid_msg').addClass('d-none');
        $('#save_user').prop("disabled", false);
    } else {
        $('#email_valid_msg').removeClass('d-none');
        $('#save_user').prop("disabled", true);
    }
}

$('#contact').keyup(function () {
    var contact = $('#contact').val();
    if (isNaN(contact) || contact.length != 10) {
        $('#contact_valid_msg').removeClass('d-none');
        $('#save_user').prop("disabled", true);
    } else {
        $('#contact_valid_msg').addClass('d-none');
        $('#save_user').prop("disabled", false);
    }
});

$('#reset_user').click(function () {
    clear_users();
});

$('#user_search').keyup(function () {
    load_users_to_table();
});
//==============================================================================
function check_nic() {
    var nic = $('#nic').val();
    var dataArray = {action: "check_nic", nic: nic}
    $.post("./models/sys_user_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
            $('#nic_aval_msg').removeClass('d-none');
            $('#save_user').prop("disabled", true);
        } else {
            $('#nic_aval_msg').addClass('d-none');
            $('#save_user').prop("disabled", false);
            validate_nic();
        }
    });
}

function check_email() {
    var email = $('#email').val();
    var dataArray = {action: "check_email", email: email}
    $.post("./models/sys_user_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
            $('#email_exist_msg').removeClass('d-none');
            $('#save_user').prop("disabled", true);
        } else {
            $('#email_exist_msg').addClass('d-none');
            $('#save_user').prop("disabled", false);
            validate_email();
        }
    });
}

function check_username() {
    var user_name = $('#user_name').val();
    var dataArray = {action: "check_username", user_name: user_name}
    $.post("./models/sys_user_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
            $('#username_exist_msg').removeClass('d-none');
            $('#save_user').prop("disabled", true);
        } else {
            $('#username_exist_msg').addClass('d-none');
            $('#save_user').prop("disabled", false);
        }
    });
}

function form_validate() {
    var error = 0;

    var full_name = $('#full_name').val();
    var nic = $('#nic').val();
    var email = $('#email').val();
    var contact = $('#contact').val();
    var address = $('#address').val();
    var user_name = $('#user_name').val();
    var password = $('#password').val();
    var confirm_pass = $('#confirm_passs').val();
    var role = $('#role').val();

    if (full_name.length == 0) {
        $('#full_name_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#full_name_msg').addClass('d-none');
    }

    if (nic.length == 0) {
        all_ok = false;
        $('#nic_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#nic_msg').addClass('d-none');
    }

    if (email.length == 0) {
        $('#email_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#email_msg').addClass('d-none');
    }
    if (contact.length == 0) {
        $('#contact_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#contact_msg').addClass('d-none');
    }

    if (user_name.length == 0) {
        $('#user_name_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#user_name_msg').addClass('d-none');
    }

    if (password.length == 0) {
        $('#password_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#password_msg').addClass('d-none');
    }

    if (confirm_pass.length == 0) {
        $('#confirm_passs_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#confirm_passs_msg').addClass('d-none');
    }

    if (role.length == 0) {
        $('#role_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#role_msg').addClass('d-none');
    }

    if (error > 0) {
        return false;
    } else {
        return true;
    }
}

function clear_users() {
    $('#full_name').val('');
    $('#nic').val('');
    $('#email').val('');
    $('#contact').val('');
    $('#address').val('');
    $('#user_name').val('');
    $('#password').val('');
    $('#confirm_passs').val('');
    $('#role').val('');
}

function get_data_to_save() {
    var full_name = $('#full_name').val();
    var nic = $('#nic').val();
    var email = $('#email').val();
    var contact = $('#contact').val();
    var address = $('#address').val();
    var user_name = $('#user_name').val();
    var password = $('#password').val();
    var confirm_pass = $('#confirm_passs').val();
    var role = $('#role').val();

    var dataArray = {action: "get_data_to_save", full_name: full_name, nic: nic, email: email, contact: contact, address: address, user_name: user_name, password: password, confirm_pass: confirm_pass, role: role}

    if (form_validate()) {
        $.post("./models/sys_user_register_model.php", dataArray, function (reply) {
            if (reply == 1) {
                alertify.success('User Added Successfully');
                load_users_to_table();
                clear_users();
            } else {
                alertify.error('User Added Failed');
            }
        });
    }
}

function load_users_to_table() {
    var tbl_data = "";
    var search = $('#user_search').val();
    var dataArray = {action: "load_users_to_table", search: search}
    $.post("./models/sys_user_register_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            tbl_data += '<tr>';
            tbl_data += '<td>' + value.full_name + '</td>';
            tbl_data += '<td>' + value.user_nic + '</td>';
            tbl_data += '<td>' + value.user_email + '</td>';
            tbl_data += '<td>' + value.user_contact + '</td>';
            tbl_data += '<td>' + value.user_role + '</td>';
            if (value.user_status == 1) {
                tbl_data += '<td><button type="button" class="btn btn-primary select" style="margin-bottom:5px;margin-right:2px" value="' + value.user_id + '">Select</button><button type="button" class="btn btn-danger delete" style="margin-bottom:5px;" value="' + value.user_id + '">Delete</button><button type="button" class="btn btn-warning tempdeactive" value="' + value.user_id + '">Deactivate</button></td>';
            } else if (value.user_status == 2) {
                tbl_data += '<td><button type="button" class="btn btn-success active" value="' + value.user_id + '">Activate User</button></td>';
            } else {
                tbl_data += '<td style="color: red; font-weight: bold; font-size: 18px;">Deleted</td>';
            }
            tbl_data += '</tr>';
        });
        $('#user_regi_table tbody').html('').append(tbl_data);

        $('.select').click(function () {
            get_users_to_update($(this).val());
            $('#save_user').addClass('d-none');
            $('#update_user').removeClass('d-none');
            $('#pw_row1').hide();
            $('#pw_row2').hide();
//            $('#nic_msg').addClass('d-none');
        });

        $('.delete').click(function () {
            update_users_status($(this).val(), 'delete');
        });

        $('.tempdeactive').click(function () {
            update_users_status($(this).val(), 'temp_deactivate');
        });

        $('.active').click(function () {
            update_users_status($(this).val(), 'active_user');
        });
    }, 'json');
}

function get_users_to_update(user_id) {
    var dataArray = {action: "get_users_to_update", user_id: user_id}
    $.post("./models/sys_user_register_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            $('#full_name').val(value.full_name);
            $('#nic').val(value.user_nic);
            $('#email').val(value.user_email);
            $('#contact').val(value.user_contact);
            $('#address').val(value.user_address);
            $('#user_name').val(value.user_name);
            $('#role').val(value.user_role);
            localStorage.setItem('user', user_id);
        });
    }, 'json');
}

function update_users() {
    var full_name = $('#full_name').val();
    var nic = $('#nic').val();
    var email = $('#email').val();
    var contact = $('#contact').val();
    var address = $('#address').val();
    var user_name = $('#user_name').val();
    var role = $('#role').val();
    var user_id = localStorage.getItem('user');

    var dataArray = {action: "update_users", full_name: full_name, nic: nic, email: email, contact: contact, address: address, user_name: user_name, role: role, user_id: user_id}
    $.post("./models/sys_user_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alertify.success('User Updated Successfully');
            load_users_to_table();
            $('#save_user').removeClass('d-none');
            $('#update_user').addClass('d-none');
            $('#pw_row1').show();
            $('#pw_row2').show();
            clear_users();
        } else {
            alertify.error('User Update Failed');
        }
    });
}

function update_users_status(user_id, type) {
    var conf_msg;
    if (type == 'delete') {
        conf_msg = 'Are you sure to delete this user ?'
    } else if (type == 'temp_deactivate') {
        conf_msg = 'Are you sure to temporarily deactivate this user ?'
    } else {
        conf_msg = 'Are you sure to activate this user ?'
    }
    alertify.confirm("Confirm Update User Status !", conf_msg,
            function () {
                var dataArray = {action: "update_users_status", user_id: user_id, type: type}
                $.post("./models/sys_user_register_model.php", dataArray, function (reply) {
                    if (reply == 1) {
                        if (type == 'delete') {
                            alertify.success('User Deleted Successfully');
                        } else if (type == 'temp_deactivate') {
                            alertify.success('User Deactivated Successfully');
                        } else {
                            alertify.success('User Activated Successfully');
                        }
                        load_users_to_table();
                        clear_users();
                    } else if (reply == 0) {
                        alertify.error('User Status Update Failed');
                    } else {
                        alertify.error('User Status Update Failed, This user is currently logged');
                    }
                });
            },
            function () {
                alertify.error('User Status Update Canceled');
            });
}