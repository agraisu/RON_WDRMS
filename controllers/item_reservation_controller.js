load_reservation_customers();

$('#reserv_items_search').keyup(function () {
    load_items_for_reservation();
});

$('#add_reserv_items').click(function () {
    save_reservation_items();
});

$('#book_items').click(function () {
    finish_reservation();
});

//==============================================================================

function load_reservation_customers() {
    var data;
    var dataArray = {action: "load_reservation_customers"}
    $.post("./models/item_reservation_model.php", dataArray, function (reply) {
        data += '<option value="0">Please Select Customer</option>';
        $.each(reply, function (index, value) {
            data += '<option value="' + value.cus_id + '">' + value.cus_name + '</option>';
        });
        $('#reserv_cus').html('').append(data);
    }, 'json');
}

function load_items_for_reservation() {
    var tbl_data = "";
    var search = $('#reserv_items_search').val();
    var dataArray = {action: "load_items_for_reservation", search: search}
    $.post("./models/item_reservation_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            tbl_data += '<tr>';
            tbl_data += '<td>' + value.item_code + '</td>';
            tbl_data += '<td>' + value.item_name + '</td>';
            tbl_data += '<td>' + value.avl_qty + '</td>';
            tbl_data += '<td><button type="button" class="btn btn-primary select" style="margin-right:5px;" value="' + value.item_id + '"><i class="fas fa-hand-pointer" style="color: black"></i></button></td>';
            tbl_data += '</tr>';
        });
        $('#reserv_items_tbl tbody').html('').append(tbl_data);

        $('.select').click(function () {
            localStorage.setItem("item_id", $(this).val());
            $('#reserv_req_date').focus();
        });

    }, 'json');
}

function load_reservation_items_to_table() {
    var reservation_no = $('#reserv_no').val();
    var tbl_data = "";
    var search = $('#reserv_details_search').val();
    var dataArray = {action: "load_reservation_items_to_table", search: search, reservation_no: reservation_no}
    $.post("./models/item_reservation_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            tbl_data += '<tr>';
            tbl_data += '<td>' + value.item_name + '</td>';
            tbl_data += '<td>' + value.resv_itm_qty + '</td>';
            tbl_data += '<td>' + value.resv_req_date + '</td>';
            tbl_data += '<td><button type="button" class="btn btn-primary select" style="margin-right:5px;" value="' + value.resv_itm_tbl_id + '"><i class="fas fa-hand-pointer" style="color: black"></i></button><button type="button" class="btn btn-danger delete" value="' + value.resv_itm_tbl_id + '"><i class="fas fa-trash" style="color: black"></i></button></td>';
            tbl_data += '</tr>';
        });
        $('#reserv_details_tbl tbody').html('').append(tbl_data);
    }, 'json');
}

function save_reservation_items() {
    var reservation_no = $('#reserv_no').val();
    var resv_itm_qty = $('#reserv_qty').val();
    var item_id = localStorage.getItem("item_id");

    var dataArray = {action: "save_reservation_items", reservation_no: reservation_no, resv_itm_qty: resv_itm_qty, item_id: item_id}

    $.post("./models/item_reservation_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alertify.success('Success');
            load_reservation_items_to_table();
        } else {
            alertify.error('Error');
        }
    });
}

function finish_reservation() {
    var resv_no = $('#reserv_no').val();
    var resv_cus_id = $('#reserv_cus').val();
    var resv_req_date = $('#reserv_req_date').val();
    var resv_advance = $('#reserv_advance').val();
    if (resv_cus_id != 0) {
        var dataArray = {action: "finish_reservation", resv_no: resv_no, resv_cus_id: resv_cus_id, resv_req_date: resv_req_date, resv_advance: resv_advance}
        $.post("./models/item_reservation_model.php", dataArray, function (reply) {
            if (reply == 1) {
                alertify.success('Added Successfully');
                load_reservation_items_to_table();
            } else {
                alertify.error('Failed to Add');
            }
        });
    } else {
        alertify.error('Please Select Customer');
    }
}
