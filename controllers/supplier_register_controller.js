load_suppliers_to_table();
get_supplier_code();

$('#save_sup').click(function () {
    get_supplier_to_save();
});

$('#sup_search').keyup(function () {
    load_suppliers_to_table();
});

$('#sup_email').keyup(function () {
    check_sup_email();
});

$('#reset_sup').click(function () {
    clear_suppliers();
});

$('#update_sup').click(function () {
    update_suppliers();
    $('#update_sup').addClass('d-none');
    $('#save_sup').removeClass('d-none');
});

//==============================================================================

function form_validate() {
    var error = 0;

    var sup_name = $('#sup_name').val();
    var comp_name = $('#comp_name').val();
    var comp_details = $('#comp_details').val();
    var sup_email = $('#sup_email').val();
    var sup_contact = $('#sup_contact').val();
    var sup_address = $('#sup_address').val();

    if (sup_name.length == 0) {
        $('#sup_name_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#sup_name_msg').addClass('d-none');
    }

    if (sup_email.length == 0) {
        $('#sup_email_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#sup_email_msg').addClass('d-none');
    }

    if (sup_contact.length == 0) {
        $('#sup_contact_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#sup_contact_msg').addClass('d-none');
    }

    if (sup_address.length == 0) {
        $('#sup_address_msg').removeClass('d-none');
        error += 1;
    } else {
        $('#sup_address_msg').addClass('d-none');
    }

    if (error > 0) {
        return false;
    } else {
        return true;
    }
}

function validate_sup_email() {
    var sup_email = $('#sup_email').val();
    var old_sup_email = new RegExp('^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$');
    if (old_sup_email.test(sup_email)) {
        $('#sup_email_valid').addClass('d-none');
        $('#save_sup').prop("disabled", false);
    } else {
        $('#sup_email_valid').removeClass('d-none');
        $('#save_sup').prop("disabled", true);
    }
}

function check_sup_email() {
    var sup_email = $('#sup_email').val();
    var dataArray = {action: "check_sup_email", sup_email: sup_email}
    $.post("./models/supplier_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
            $('#sup_email_check').removeClass('d-none');
            $('#save_sup').prop("disabled", true);
        } else {
            $('#sup_email_check').addClass('d-none');
            $('#save_sup').prop("disabled", false);
            validate_sup_email();
        }
    });
}

$('#sup_contact').keyup(function () {
    var sup_contact = $('#sup_contact').val();
    if (isNaN(sup_contact) || sup_contact.length != 10) {
        $('#sup_contact_valid').removeClass('d-none');
        $('#save_sup').prop("disabled", true);
    } else {
        $('#sup_contact_valid').addClass('d-none');
        $('#save_sup').prop("disabled", false);
    }
});

function clear_suppliers() {
    $('#sup_name').val('');
    $('#comp_name').val('');
    $('#comp_details').val('');
    $('#sup_email').val('');
    $('#sup_contact').val('');
    $('#sup_address').val('');
}

function get_supplier_to_save() {
    var sup_regi_no = $('#sup_regi_no').val();
    var sup_name = $('#sup_name').val();
    var comp_name = $('#comp_name').val();
    var comp_details = $('#comp_details').val();
    var sup_email = $('#sup_email').val();
    var sup_contact = $('#sup_contact').val();
    var sup_address = $('#sup_address').val();

    var dataArray = {action: "get_supplier_to_save", sup_regi_no: sup_regi_no, sup_name: sup_name, comp_name: comp_name, comp_details: comp_details, sup_email: sup_email, sup_contact: sup_contact, sup_address: sup_address}

    if (form_validate()) {
        $.post("./models/supplier_register_model.php", dataArray, function (reply) {
            if (reply == 1) {
                alertify.success('Supplier Added Successfully');
                load_suppliers_to_table();
                clear_suppliers();
            } else {
                alertify.error('Supplier Add Failed');
            }
        });
    }
}

function load_suppliers_to_table() {
    var tbl_data = "";
    var search = $('#sup_search').val();
    var dataArray = {action: "load_suppliers_to_table", search: search}
    $.post("./models/supplier_register_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            tbl_data += '<tr>';
            tbl_data += '<td>' + value.sup_reg_no + '</td>';
            tbl_data += '<td>' + value.sup_name + '</td>';
            tbl_data += '<td>' + value.sup_email + '</td>';
            tbl_data += '<td>' + value.sup_contact + '</td>';
            tbl_data += '<td><button type="button" class="btn btn-primary select" style="margin-right:5px;" value="' + value.sup_id + '"><i class="fas fa-hand-pointer" style="color: black"></i></button><button type="button" class="btn btn-danger delete" value="' + value.sup_id + '"><i class="fas fa-trash" style="color: black"></i></button></td>';
            tbl_data += '</tr>';
        });
        $('#sup_regi_table tbody').html('').append(tbl_data);

        $('.select').click(function () {
            get_suppliers_to_update($(this).val());
            $('#save_sup').addClass('d-none');
            $('#update_sup').removeClass('d-none');
        });

        $('.delete').click(function () {
            var sup_id = $(this).val();
            alertify.confirm("Confirm Delete !", "Are you sure you want to delete this supplier ?",
                    function () {
                        delete_suppliers(sup_id);
                    },
                    function () {
                        alertify.error('Delete Canceled');
                    });
        });
    }, 'json');
}

function get_suppliers_to_update(sup_id) {
    var dataArray = {action: "get_suppliers_to_update", sup_id: sup_id}
    $.post("./models/supplier_register_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            var sup_regi_no = $('#sup_regi_no').val(value.sup_reg_no);
            var sup_name = $('#sup_name').val(value.sup_name);
            var comp_name = $('#comp_name').val(value.company_name);
            var comp_details = $('#comp_details').val(value.company_details);
            var sup_email = $('#sup_email').val(value.sup_email);
            var sup_contact = $('#sup_contact').val(value.sup_contact);
            var sup_address = $('#sup_address').val(value.sup_address);
            localStorage.setItem('supplier', sup_id);
        });
    }, 'json');
}

function update_suppliers() {
    var sup_regi_no = $('#sup_regi_no').val();
    var sup_name = $('#sup_name').val();
    var comp_name = $('#comp_name').val();
    var comp_details = $('#comp_details').val();
    var sup_email = $('#sup_email').val();
    var sup_contact = $('#sup_contact').val();
    var sup_address = $('#sup_address').val();
    var sup_id = localStorage.getItem('supplier');

    var dataArray = {action: "update_suppliers", sup_regi_no: sup_regi_no, sup_name: sup_name, comp_name: comp_name, comp_details: comp_details, sup_email: sup_email, sup_contact: sup_contact, sup_address: sup_address, sup_id: sup_id}
    $.post("./models/supplier_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alertify.warning('Supplier Updated Successfully');
            load_suppliers_to_table();
            clear_suppliers();
        } else {
            alertify.error('Supplier Update Failed');
        }
    });
}

function delete_suppliers(sup_id) {
    var dataArray = {action: "delete_suppliers", sup_id: sup_id}
    $.post("./models/supplier_register_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alertify.success('Supplier Deleted Successfully');
            load_suppliers_to_table();
            clear_suppliers();
        } else {
            alertify.error('Supplier Delete Failed');
        }
    });
}

function get_supplier_code() {
    var dataArray = {action: "get_supplier_code"}
    $.post("./models/supplier_register_model.php", dataArray, function (reply) {
        $('#sup_regi_no').val(reply);
    });
}

