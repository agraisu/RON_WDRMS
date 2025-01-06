load_customers_to_table();
get_customer_code();

$('#save_cus').click(function () {
    get_customer_to_save();
});

$('#cus_search').keyup(function () {
    load_customers_to_table();
});

$('#reset_cus').click(function () {
    clear_customers();
});

$('#update_cus').click(function () {
    update_customers();
    $('#save_cus').removeClass('d-none');
    $('#update_cus').addClass('d-none');
});

$('#cus_name').keyup(function () {
    validate_cus_name();
});

$('#cus_nic').keyup(function () {
    check_cus_nic();
});

$('#cus_email').keyup(function () {
    check_cus_email();
});

$('#confirm_pw').keyup(function () {
    var pw = $('#c_password').val();
    var confirm_pw = $(this).val();
    if (pw != confirm_pw) {
        $('#match_pw_msg').removeClass('d-none');
    } else {
        $('#match_pw_msg').addClass('d-none');
    }
});

//==============================================================================

function clear_customers() {
    $('#cus_name').val('');
    $('#cus_gender').val('');
    $('#cus_nic').val('');
    $('#cus_email').val('');
    $('#cus_contact').val('');
    $('#cus_address').val('');
    $('#c_password').val('');
}

function form_validate() {
    var error = 0;

    var cus_name = $('#cus_name').val();
    var cus_gender = $('#cus_gender').val();
    var cus_nic = $('#cus_nic').val();
    var cus_email = $('#cus_email').val();
    var cus_contact = $('#cus_contact').val();
    var cus_address = $('#cus_address').val();
    var c_password = $('#c_password').val();
    var confirm_pw = $('#confirm_pw').val();

    if (cus_name.length == 0) {
        $('#cus_name_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#cus_name_msg').addClass('d-none');
    }

    if (cus_gender.length == 0) {
        $('#cus_gender_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#cus_gender_msg').addClass('d-none');
    }

    if (cus_nic.length == 0) {
        $('#cus_nic_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#cus_nic_msg').addClass('d-none');
    }

    if (cus_email.length == 0) {
        $('#cus_email_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#cus_email_msg').addClass('d-none');
    }

    if (cus_contact.length == 0) {
        $('#cus_contact_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#cus_contact_msg').addClass('d-none');
    }

    if (cus_address.length == 0) {
        $('#cus_address_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#cus_address_msg').addClass('d-none');
    }

    if (c_password.length == 0) {
        $('#cus_pw_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#cus_pw_msg').addClass('d-none');
    }

    if (confirm_pw.length == 0) {
        $('#confirm_pw_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#confirm_pw_msg').addClass('d-none');
    }

    if (error > 0) {
        return false;
    } else {
        return true;
    }
}

//nic validation
function validate_cus_nic() {
    var cus_nic = $('#cus_nic').val();
    //Old NIC regular expression
    var old_cus_nic = new RegExp('^[0-9+]{9}[vV|xX]$');
    //NEW NIC regular expression
    var new_cus_nic = new RegExp('^[0-9+]{12}$');
    if (cus_nic.length == 10 && old_cus_nic.test(cus_nic)) {
        $('#cus_nic_valid').addClass('d-none');
        $('#save_cus').prop("disabled", false);
//        $('#cus_nic').removeClass('error_background');
//        $('#cus_nic').addClass('validated_background');
    } else if (cus_nic.length == 12 && new_cus_nic.test(cus_nic)) {
        $('#cus_nic_valid').addClass('d-none');
        $('#save_cus').prop("disabled", false);
//        $('#cus_nic').removeClass('error_background');
//        $('#cus_nic').addClass('validated_background');
    } else {
        $('#cus_nic_valid').removeClass('d-none');
        $('#save_cus').prop("disabled", true);
//        $('#cus_nic').removeClass('validated_background');
//        $('#cus_nic').addClass('error_background');
    }
}

function validate_cus_name() {
    var cus_name = $('#cus_name').val();
    var old_cus_name = new RegExp('^([A-Z][a-z]+|[A-Z][a-z]+\\s{1}[A-Z][a-z]{1,}|[A-Z][a-z]+\\s{1}[A-Z][a-z]{3,}\\s{1}[A-Z][a-z]{1,})$');
    if (old_cus_name.test(cus_name)) {
        $('#cus_name_valid').addClass('d-none');
        $('#save_cus').prop("disabled", false);
    } else {
        $('#cus_name_valid').removeClass('d-none');
        $('#save_cus').prop("disabled", true);
    }
}

function validate_cus_email() {
    var cus_email = $('#cus_email').val();
    var old_cus_email = new RegExp('^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$');
    if (old_cus_email.test(cus_email)) {
        $('#cus_email_valid').addClass('d-none');
        $('#save_cus').prop("disabled", false);
    } else {
        $('#cus_email_valid').removeClass('d-none');
        $('#save_cus').prop("disabled", true);
    }
}

$('#cus_contact').keyup(function () {
    var cus_contact = $('#cus_contact').val();
    if (isNaN(cus_contact) || cus_contact.length != 10) {
        $('#cus_contact_valid').removeClass('d-none');
        $('#save_cus').prop("disabled", true);
    } else {
        $('#cus_contact_valid').addClass('d-none');
        $('#save_cus').prop("disabled", false);
        check_cus_contact();
    }
});

function check_cus_nic() {
    var cus_nic = $('#cus_nic').val();
    var dataArray = {action: "check_cus_nic", cus_nic: cus_nic}
    $.post("./models/customer_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
            $('#cus_nic_check').removeClass('d-none');
            $('#save_cus').prop("disabled", true);
        } else {
            $('#cus_nic_check').addClass('d-none');
            $('#save_cus').prop("disabled", false);
            validate_cus_nic();
        }
    });
}

function check_cus_email() {
    var cus_email = $('#cus_email').val();
    var dataArray = {action: "check_cus_email", cus_email: cus_email}
    $.post("./models/customer_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
            $('#cus_email_check').removeClass('d-none');
            $('#save_cus').prop("disabled", true);
        } else {
            $('#cus_email_check').addClass('d-none');
            $('#save_cus').prop("disabled", false);
            validate_cus_email();
        }
    });
}

function check_cus_contact() {
    var cus_contact = $('#cus_contact').val();
    var dataArray = {action: "check_cus_contact", cus_contact: cus_contact}
    $.post("./models/customer_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
            $('#cus_contact_check').removeClass('d-none');
            $('#save_cus').prop("disabled", true);
        } else {
            $('#cus_contact_check').addClass('d-none');
            $('#save_cus').prop("disabled", false);
        }
    });
}

function get_customer_to_save() {
    var cus_regi_no = $('#cus_regi_no').val();
    var cus_name = $('#cus_name').val();
    var cus_gender = $('#cus_gender').val();
    var cus_nic = $('#cus_nic').val();
    var cus_email = $('#cus_email').val();
    var cus_contact = $('#cus_contact').val();
    var cus_address = $('#cus_address').val();
    var c_password = $('#c_password').val();

    var dataArray = {action: "get_customer_to_save", cus_regi_no: cus_regi_no, cus_name: cus_name, cus_gender: cus_gender, cus_nic: cus_nic, cus_email: cus_email, cus_contact: cus_contact, cus_address: cus_address, c_password: c_password}

    if (form_validate()) {
        $.post("./models/customer_register_model.php", dataArray, function (reply) {
            if (reply == 1) {
                alertify.success('Customer Added Successfully');
                load_customers_to_table();
                clear_customers();
            } else {
                alertify.error('Customer Added Failed');
            }
        });
    }
}

function load_customers_to_table() {
    var tbl_data = "";
    var search = $('#cus_search').val();
    var dataArray = {action: "load_customers_to_table", search: search}
    $.post("./models/customer_register_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            tbl_data += '<tr>';
            tbl_data += '<td>' + value.cus_regi_no + '</td>';
            tbl_data += '<td>' + value.cus_name + '</td>';
            tbl_data += '<td>' + value.cus_nic + '</td>';
            tbl_data += '<td>' + value.cus_email + '</td>';
            tbl_data += '<td>' + value.cus_contact + '</td>';
            tbl_data += '<td><button type="button" class="btn btn-primary select" style="margin-right:5px;" value="' + value.cus_id + '"><i class="fas fa-hand-pointer" style="color: black"></i></button><button type="button" class="btn btn-danger delete" value="' + value.cus_id + '"><i class="fas fa-trash" style="color: black"></i></button></td>';
            tbl_data += '</tr>';
        });
        $('#cus_regi_table tbody').html('').append(tbl_data);

        $('.select').click(function () {
            get_customers_to_update($(this).val());
            $('#save_cus').addClass('d-none');
            $('#update_cus').removeClass('d-none');
            $('#c_pw_row1').hide();
            $('#c_pw_row2').hide();
        });

        $('.delete').click(function () {
            var cus_id = $(this).val();
            alertify.confirm("Confirm Delete !", "Are you sure you want to delete this customer ?",
                    function () {
                        delete_customers(cus_id);
                    },
                    function () {
                        alertify.error('Delete Canceled');
                    });
        });
    }, 'json');
}

function get_customers_to_update(cus_id) {
    var dataArray = {action: "get_customers_to_update", cus_id: cus_id}
    $.post("./models/customer_register_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            var cus_regi_no = $('#cus_regi_no').val(value.cus_regi_no);
            var cus_name = $('#cus_name').val(value.cus_name);
            var cus_gender = $('#cus_gender').val(value.cus_gender);
            var cus_nic = $('#cus_nic').val(value.cus_nic);
            var cus_email = $('#cus_email').val(value.cus_email);
            var cus_contact = $('#cus_contact').val(value.cus_contact);
            var cus_address = $('#cus_address').val(value.cus_address);
            localStorage.setItem('customer', cus_id);
        });
    }, 'json');
}

function update_customers() {
    var cus_regi_no = $('#cus_regi_no').val();
    var cus_name = $('#cus_name').val();
    var cus_gender = $('#cus_gender').val();
    var cus_nic = $('#cus_nic').val();
    var cus_email = $('#cus_email').val();
    var cus_contact = $('#cus_contact').val();
    var cus_address = $('#cus_address').val();
    var cus_id = localStorage.getItem('customer');

//    var dataArray = {action: "update_customers", cus_regi_no: cus_regi_no, cus_name: cus_name, cus_gender: cus_gender, cus_nic: cus_nic, cus_email: cus_email, cus_contact: cus_contact, cus_address: cus_address, cus_type: cus_type, cus_id: cus_id}
    var dataArray = {action: "update_customers", cus_regi_no: cus_regi_no, cus_name: cus_name, cus_gender: cus_gender, cus_nic: cus_nic, cus_email: cus_email, cus_contact: cus_contact, cus_address: cus_address, cus_id: cus_id}
    $.post("./models/customer_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alertify.success('Customer Updated Successfully');
            load_customers_to_table();
            $('#c_pw_row1').show();
            $('#c_pw_row2').show();
            clear_customers();
        } else {
            alertify.error('Customer Update Failed');
        }
    });
}

function delete_customers(cus_id) {
    var dataArray = {action: "delete_customers", cus_id: cus_id}
    $.post("./models/customer_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alertify.success('Customer Deleted Successfully');
            load_customers_to_table();
        } else {
            alertify.error('Customer Delete Failed');
        }
    });
}

function get_customer_code() {
    var dataArray = {action: "get_customer_code"}
    $.post("./models/customer_register_model.php", dataArray, function (reply) {
        $('#cus_regi_no').val(reply);
    });
}
