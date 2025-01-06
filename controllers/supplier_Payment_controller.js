load_suppliers();

$('#select_sup').change(function () {
    load_grn_no();
});

$('#select_grn_no').change(function () {
    load_grn_details();
    load_payment_transaction_to_table();
});

$('#add_sup_pay').click(function () {
   add_payments();
});

function load_suppliers() {
    var data;
    var dataArray = {action: "load_suppliers"}
    $.post("./models/supplier_payment_model.php", dataArray, function (reply) {
        data += '<option value="0">Please select Supplier</option>';
        $.each(reply, function (index, value) {
            data += '<option value="' + value.sup_id + '">' + value.supplier_name + '</option>';
        });
        $('#select_sup').html('').append(data);
        chosenRefresh();
        load_grn_no();
    }, 'json');
}

function load_grn_no() {
    var data;
    var sup_id = $('#select_sup').val();
    var dataArray = {action: "load_grn_no", sup_id: sup_id}
    $.post("./models/supplier_payment_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            data += '<option value="' + value.grn_table_id + '">' + value.grn + '</option>';
        });
        $('#select_grn_no').html('').append(data);
        load_grn_details();
        load_payment_transaction_to_table();
    }, 'json');
}

function load_grn_details() {
    var grn_no = $('#select_grn_no').val();
    var dataArray = {action: "load_grn_details", grn_no: grn_no}
    $.post("./models/supplier_payment_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            $('#sup_total').val(value.total_amount);
            $('#sup_paid').val(value.paid_amount);
            $('#sup_balance').val(value.balance_amount);
            
            $('#new_pay').focus();
        });
    }, 'json');
}

function add_payments(){
    var payment = $('#new_pay').val();
    var grn_no = $('#select_grn_no').val();
    var dataArray = {action: "add_payments", payment: payment, grn_no: grn_no}
    $.post("./models/supplier_payment_model.php", dataArray, function (reply) {
        if(reply == 1){
             alertify.success('Payment Added Successfully');
             load_grn_details();
             payment_transaction();
             load_payment_transaction_to_table();
        }else{
            alertify.error('Adding Payment process Failed, contact your admin');
        }
    });
}

function payment_transaction() {
    var sup_id = $('#select_sup').val();
    var sup_grn_id = $('#select_grn_no').val();
    var paid_amt = $('#new_pay').val();

    var dataArray = {action: "payment_transaction", sup_id: sup_id, sup_grn_id: sup_grn_id, paid_amt: paid_amt}

    $.post("./models/supplier_payment_model.php", dataArray, function (reply) {
   });
}

function load_payment_transaction_to_table() {
    var tbl_data = "";
    var grn_id = $('#select_grn_no').val();
    var dataArray = {action: "load_payment_transaction_to_table", grn_id: grn_id}
    $.post("./models/supplier_payment_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            tbl_data += '<tr>';
            tbl_data += '<td>' + value.sup_paid_amount + '</td>';
            tbl_data += '<td>' + value.sup_paid_date_time + '</td>';
            tbl_data += '<td>' + value.user_details + '</td>';
            tbl_data += '<td>' + value.payment_status + '</td>';
            tbl_data += '<td><button type="button" class="btn btn-warning cancel" style="margin-right:5px;" value="' + value.sup_pay_id + '"><i class="fas fa-hand-pointer" style="color: black"></i></button><button type="button" class="btn btn-info hold" value="' + value.sup_pay_id + '"><i class="fas fa-trash" style="color: black"></i></button></td>';
            tbl_data += '</tr>';
        });
        $('#sup_pay_tbl tbody').html('').append(tbl_data);

    }, 'json');
}

