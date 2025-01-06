get_custom_requests_to_table();
load_tailors();

$('#cus_req_search').keyup(function () {
    get_custom_requests_to_table();
});

$('.close_model').click(function () {
    $('#req_note_mdl').modal('hide');
});

$('.close_conf_model').click(function () {
    $('#req_confirm_mdl').modal('hide');
});

$('.close_model_assign').click(function () {
    $('#tailor_assign_modal').modal('hide');
});

$('.conf_payment').click(function () {
    add_customer_request_payment();
});

$('.cus_req_search').keyup(function () {
    get_custom_requests_to_table();
});

$('#cus_req_advance_amt').keyup(function () {
    var adv_amt = $(this).val();
    var tot_amt = $('#cus_req_total_amt').val();
    if (adv_amt.length == 0 || tot_amt.length == 0) {
        adv_amt = 0;
        tot_amt = 0;
    }
    var bal_amt = parseFloat(tot_amt) - parseFloat(adv_amt);
    $('#cus_req_balance_amt').val(bal_amt);
});

$('#add_assign').click(function () {
    add_assigned_tailors();
});

$('#select_tailor').change(function () {
    load_assigned_jobs();
});

//==============================================================================

function add_customer_request_payment() {
    var cus_req_no = $('#cus_req_no').val();
    var cus_req_total = $('#cus_req_total_amt').val();
    var cus_req_advance = $('#cus_req_advance_amt').val();
    var cus_req_balance = $('#cus_req_balance_amt').val();
    var cus_req_note = $('#cus_req_note').val();
    var dataArray = {action: "add_customer_request_payment", cus_req_no: cus_req_no, cus_req_total: cus_req_total, cus_req_advance: cus_req_advance, cus_req_balance: cus_req_balance, cus_req_note: cus_req_note}
    $.post("./models/custom_request_confirm_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alertify.success('Payment Added Successfully');
            $('#req_confirm_mdl').modal('hide');
            get_custom_requests_to_table();
            setTimeout(function () {
                window.location = './?x=print_req_recipt&req_no=' + cus_req_no;
            }, 3000);
        } else {
            alertify.error('Payment Added Failed');
        }
    });
}

function get_custom_requests_to_table() {
    var tbl_data = "";
    var search = $('#cus_req_search').val();
    var dataArray = {action: "get_custom_requests_to_table", search: search}
    $.post("./models/custom_request_confirm_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            tbl_data += '<tr>';
            tbl_data += '<td>' + value.cus_req_no + '</td>';
            tbl_data += '<td>' + value.cus_name + '</td>';
            tbl_data += '<td>' + value.cus_req_nic + '</td>';
            tbl_data += '<td>' + value.cus_phone + '</td>';
            tbl_data += '<td>' + value.cus_req_required_date + '</td>';
            tbl_data += '<td><button type="button" class="btn btn-success view" value="' + value.cus_req_photo + '~' + value.cus_req_note + '~' + value.cus_req_required_date + '">View</button></td>';
            if (value.cus_req_status == 0) {
                tbl_data += '<td><button type="button" class="btn btn-primary contact" style="margin-bottom:5px;" value="' + value.cus_req_id + '">Contact</button></td>';
            } else if (value.cus_req_status == 1) {
                tbl_data += '<td><h5 style="color: green; font-weight: bold; font-size: 18px;">Contacted</h5><button type="button" class="btn btn-danger confirm" value="' + value.cus_req_no + '">Confirm</button></td>';
            } else if (value.cus_req_status == 10) {
                tbl_data += '<td><h5 style="color: green; font-weight: bold; font-size: 18px;">Contacted</h5><button type="button" class="btn btn-warning assign" value="' + value.cus_req_no + '">Assign to tailor</button></td>';
            }
            tbl_data += '</tr>';
        });
        $('#view_cus_req_tbl tbody').html('').append(tbl_data);

        $('.assign').click(function () {
            var req_no = $(this).val();
            $('#selected_request').val(req_no);
            $('#tailor_assign_modal').modal('show');
        });

        $('.confirm').click(function () {
            var req_no = $(this).val();
            $('#cus_req_no').val(req_no);
            $('#req_confirm_mdl').modal('show');
        });

        $('.view').click(function () {
            var img = $(this).val();
            var x = img.split('~');
            $('#req_img').attr('src', '../wdrms_web/others/req_pics/' + x[0]);
            $('#req_note').html(x[1]);
            $('#req_date').html(x[2]);
            $('#req_note_mdl').modal('show');
        });

        $('.contact').click(function () {
            var req_id = $(this).val();

            alertify.confirm("Confirm Contact !", "Are you sure you want to contact this customer ?",
                    function () {
                        contact_custom_request(req_id);
                    },
                    function () {
                        alertify.error('Contact Canceled');
                    });
        });

    }, 'json');
}

function contact_custom_request(req_id) {
    var dataArray = {action: "contact_custom_request", req_id: req_id}
    $.post("./models/custom_request_confirm_model.php", dataArray, function (reply) {
        if (reply == 1) {
//            alert('delete ok');
            alertify.success('Customer Contacted Successfully');
            get_custom_requests_to_table();
        } else {
//            alert('delete not ok');
            alertify.error('Customer Contact Failed');
        }
    });
}

function load_tailors() {
    var data;
    var dataArray = {action: "load_tailors"}
    $.post("./models/custom_request_confirm_model.php", dataArray, function (reply) {
        data += '<option value="0">Please select a tailor</option>';
        $.each(reply, function (index, value) {
            data += '<option value="' + value.tailor_id + '">' + value.tailor_data + '</option>';
        });
        $('#select_tailor').html('').append(data);
    }, 'json');
}

function add_assigned_tailors() {
    var selected_request = $('#selected_request').val();
    var select_tailor = $('#select_tailor').val();
    var target_date = $('#target_date').val();
    var dataArray = {action: "add_assigned_tailors", selected_request: selected_request, select_tailor: select_tailor, target_date: target_date}
    $.post("./models/custom_request_confirm_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alertify.success('Tailor Assigned Successfully');
            $('#tailor_assign_modal').modal('hide');
            get_custom_requests_to_table();
        } else {
            alertify.error('Tailor Assign Failed');
        }
    });
}

function load_assigned_jobs() {
    var tailor_id = $('#select_tailor').val();
    var data;
    var dataArray = {action: "load_assigned_jobs", tailor_id: tailor_id}
    $.post("./models/custom_request_confirm_model.php", dataArray, function (reply) {
        if (reply == 0) {
            data += '<option>Ongoing jobs not available</option>';
        } else {
            $.each(reply, function (index, value) {
                data += '<option>' + value.assigned_details + '</option>';
            });
        }
        $('#ongoing_jobs').html('').append(data);
    }, 'json');
}