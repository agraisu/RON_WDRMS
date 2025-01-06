$('#edit_prof').click(function () {
    set_profile_edit();
});

$('#reset').click(function () {
    reset_profile();
});

$('#update').click(function () {
    update_profile();
});

function set_profile_edit() {
    $('#name_p').addClass('d-none');
    $('#name_t').removeClass('d-none');
    $('#email_p').addClass('d-none');
    $('#email_t').removeClass('d-none');
    $('#address_p').addClass('d-none');
    $('#address_t').removeClass('d-none');
    $('#update').removeClass('d-none');
    $('#reset').removeClass('d-none');
}

function reset_profile() {
    $('#name_p').removeClass('d-none');
    $('#name_t').addClass('d-none');
    $('#email_p').removeClass('d-none');
    $('#email_t').addClass('d-none');
    $('#address_p').removeClass('d-none');
    $('#address_t').addClass('d-none');
    $('#update').addClass('d-none');
    $('#reset').addClass('d-none');
}

function update_profile(){
    var f_name = $('#name_t').val();
    var u_email = $('#email_t').val();
    var u_address = $('#address_t').val();
    var dataArray = {action: "update_profile", f_name: f_name, u_email: u_email, u_address: u_address}
    
    $.post("./models/profile_model.php", dataArray, function (reply) {
        if (reply == 1) {
            alertify.success('Your Profile Updated Successfully');
            setTimeout(function(){
                window.location='./?x=profile';
            }, 2000);
        } else {
            alertify.error('Update Failed');
        }
    });
}

