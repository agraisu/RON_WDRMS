<!-- jQuery -->
<script src="others/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="others/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="others/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="others/template/dist/js/adminlte.min.js"></script>
<!--alertify-->
<script src="others/alertify/alertify.js"></script>
<!--chosen-->
<script src="others/js/chosen.jquery.js"></script>
<!--chosen-->
<script src="others/date_picker/js/bootstrap-datepicker.js"></script>
<!--chart-->
<script src="others/js/chart.js"></script>
<script type="text/javascript">
    $('.datepicker').datepicker({
        startDate: '-0d',
        changeMonth: true
    });

    $('.chosen').chosen({width: "100%"});

    function chosenRefresh() {
        $(".chosen").trigger("chosen:updated");
    }

    //click event for log out button
    $('#log_out').click(function () {
        alertify.confirm("Confirm Log Out !", "Are you sure you want to log out ?",
                function () {
                    system_log_out();
                },
                function () {
                    alertify.error('Log Out Cancelled');
                });
    });

    function system_log_out() {
        dataArray = {action: "system_log_out"}
        $.post("./models/login_model.php", dataArray, function (reply) {
            if (reply == 1) {
                alertify.success('Log Out Successfully');
                setTimeout(function () {
                    window.location = "./?x=login";
                }, 3000);
            } else {
                alertify.error('Log Out Failed');
            }
        });
    }

    function send_sms(to, msg) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', "http://www.textit.biz/sendmsg/?id=94769778780&pw=5960&to=" + to + "&text=" + msg);
        xhr.send();
    }

////checks key code of the pressed key, allows only numeric keys and decimal points
//    function onlyNos(e, t) {
//        //try-catch block to handle potential errors. 
//        //Inside try block, it checks if the window.event object exists, 
//        try {
//            //window.event->access key code of the pressed key
//            //then assigns the key code to the charCode variable.
//            if (window.event) {
//                var charCode = window.event.keyCode;
//                //If window.event does not exist, it checks if the e parameter is defined
//                //e-> event object passed to the function
//                //If e is defined, it assigns key code to the charCode variable using which property
//            } else if (e) {
//                var charCode = e.which;
//            } else {
//                //If window.event or e not defined->function not triggered by a key press event
//                //->returns true to allow the input.
//                return true;
//            }
//            // exclude control characters, if it is not a numeric key (0-9) or the decimal point (46). 
//            // If the key code does not meet these conditions, it returns false to prevent input.
//            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
//                return false;
//            }
//            //If the key code passes all the checks, function returns true to allow input.
//            return true;
//        } catch (err) {
//            alert(err.Description);
//        }
//    }
//    
//    //checks key code of the pressed key, allows only numeric keys and decimal points
//    function onlyNos(e, k) {
//        //try-catch block to handle potential errors. 
//        //Inside try block, it checks if the window.event object exists, 
//        try {
//            //window.event->access key code of the pressed key
//            //then assigns the key code to the charCode variable.
//            if (window.event) {
//                var charCode = window.event.keyCode;
//                //If window.event does not exist, it checks if the e parameter is defined
//                //e-> event object passed to the function
//                //If e is defined, it assigns key code to the charCode variable using which property
//            } else if (e) {
//                var charCode = e.which;
//            } else {
//                //If window.event or e not defined->function not triggered by a key press event
//                //->returns true to allow the input.
//                return true;
//            }
//            // exclude control characters, if it is not a numeric key (0-9) or the decimal point (46). 
//            // If the key code does not meet these conditions, it returns false to prevent input.
//            if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
//                return false;
//            }
//            //If the key code passes all the checks, function returns true to allow input.
//            return true;
//        } catch (err) {
//            alert(err.Description);
//        }
//    }
</script>