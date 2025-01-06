get_confirmd_custom_requests();

$('.complete_payment').click(function () {
    complete_payments();
})

$('#cus_req_pay_search').keyup(function () {
    get_confirmd_custom_requests();
});
//==============================================================================

function get_confirmd_custom_requests() {
    var tbl_data = "";
    var search = $('#cus_req_pay_search').val();
    var dataArray = {action: "get_confirmd_custom_requests", search: search}
    $.post("./models/custom_request_payment_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            tbl_data += '<tr>';
            tbl_data += '<td>' + value.cus_req_no + '</td>';
            tbl_data += '<td>' + value.cus_name + '</td>';
            tbl_data += '<td>' + value.cus_req_nic + '</td>';
            tbl_data += '<td>' + value.cus_phone + '</td>';
            if (value.cus_req_complete_status == 0) {
                tbl_data += '<td class="text-center"><button type="button" class="btn btn-primary complete"  value="' + value.cus_req_no + '">Complete</button> || <button type="button" class="btn btn-success order_complete" value="' + value.cus_req_no + '~' + value.cus_phone + '">Order Complete Reminder</button></td>';
            } else {
                tbl_data += '<td class="text-center"><button type="button" class="btn btn-primary complete"  value="' + value.cus_req_no + '">Complete</button> || <span style="color: green">Order complete reminder message sent</span></td>';
            }
            tbl_data += '</tr>';
        });
        $('#cus_req_pay_tbl tbody').html('').append(tbl_data);

        $('.complete').click(function () {
            var req_no = $(this).val();
            $('#custom_req_no').val(req_no);
            $('#req_payment_mdl').modal('show');
            get_selected_pay_details($(this).val());
        });

        $('.order_complete').click(function () {
            var req_id = $(this).val();
            var item_id = $(this).val();

            alertify.confirm("Confirm Reminder !", "Are you sure you want to sent this message ?",
                    function () {
                        update_order_complete_remnder(req_id);
                    },
                    function () {
                        alertify.error('Canceled');
                    });
        });
    }, 'json');
}

function update_order_complete_remnder(req_id) {
    var x = req_id.split('~');
    var dataArray = {action: "update_order_complete_remnder", req_id: x[0]}
    $.post("./models/custom_request_payment_model.php", dataArray, function (reply) {
        if (reply == 1) {
            var sms = "Your order(" + x[0] + ") has been completed. You can collect it now. (RON Renters - 0769778780)";
//            send_sms(x[1], sms);
            get_confirmd_custom_requests();
        }
    });
}

function get_selected_pay_details(req_no) {
    var dataArray = {action: "get_selected_pay_details", req_no: req_no}
    $.post("./models/custom_request_payment_model.php", dataArray, function (reply) {
        var x = reply.split('~');
        $('#custom_req_total').val(x[0]);
        $('#custom_req_balance').val(x[1]);
        localStorage.setItem('tp', x[2]);
    });
}

function complete_payments() {
    var req_pay_no = $('#custom_req_no').val();
    var dataArray = {action: "complete_payments", req_pay_no: req_pay_no}
    $.post("./models/custom_request_payment_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alertify.success('Update Query Ok');
            var sms = "Your payment(" + req_pay_no + ") has been completed. Thank You! Come Again. (RON Renters - 0769778780)";
//            send_sms(localStorage.getItem('tp'), sms);
            setTimeout(function () {
                window.location = './?x=print_req_inv&req_no=' + req_pay_no;
            }, 3000);
        } else {
            alertify.error('Update Failed');
        }
    });

}
