customer_reminder_msg();
fine_charge_reminder();
//events

//click function for login button
$('#login').click(function () {
    login_to_system();
});
//enter key function for login button
$("#password").keyup(function (e) {
    if (e.which == 13) {
        login_to_system();
    }
});

//pass variables to model
function login_to_system() {
    var username = $('#username').val();
    var password = $('#password').val();

    var dataArray = {action: "login_to_system", username: username, password: password}

    $.post("./models/login_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alertify.success('Logged Successfully');
            setTimeout(function () {
                window.location = "./?x=dashboard";
            }, 3000);
        } else if (reply == 99) {
            alertify.error('Login Failed, Deleted User');
        } else if (reply == 100) {
            alertify.error('Login Failed, Temporarily Deactivated User');
        } else {
            alertify.error('Login Failed, Invalid Username or Password');
        }
    });
}

function customer_reminder_msg() { //
    var dataArray = {action: "customer_reminder_msg"}
    $.post("./models/login_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            var return_date = value.inv_return_date;
            var rdate = new Date(return_date);
            var today = new Date();
            var days = new Date(Date.parse(today) - Date.parse(rdate));
            var count = Math.round(Math.abs(days) / 1000 / 60 / 60 / 24);
//            1000 milliseconds * 60 seconds * 60 minutes * 24 hours * days
            if (count == 3) {
                var sms = "Please return your rented dresses before : " + return_date + " to avoid fine charges (RON Renters - 0769778780)";
//                send_sms(value.cus_contact, sms);
                update_remind_status(value.inv_tbl_id, 'remind');
            }
        });
    }, 'json');
}

function update_remind_status(inv_id, type) {
    var dataArray = {action: "update_remind_status", inv_id: inv_id, type: type}
    $.post("./models/login_model.php", dataArray, function (reply) {});
}

function fine_charge_reminder() {//work after due dates
    var dataArray = {action: "fine_charge_reminder"}
    $.post("./models/login_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            var sms = "Your return date has been expired(" + value.inv_return_date + "), please return your dresses immediately (RON Renters - 0769778780)";
//            send_sms(value.cus_contact, sms);
            update_remind_status(value.inv_tbl_id, 'fine');
        });
    }, 'json');
}

