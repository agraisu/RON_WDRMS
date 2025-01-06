<?php
require_once './others/class/main_funtions.php';
$app = new setting();

if (!isset($_SESSION['user_id'])) {
    echo '<script type="text/javascript">window.location="./?x=login"</script>';
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>#wdrms#</title>
    <!--favi icon-->
    <link rel="icon" href="./images/22.PNG">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="others/template/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="others/template/dist/css/adminlte.min.css">
    <!--alertify-->
    <link rel="stylesheet" href="others/alertify/css/alertify.css">
    <!--chosen-->
    <link rel="stylesheet" href="others/css/chosen.css">
    <link rel="stylesheet" href="others/css/chosen-custom.css">
    <link rel="stylesheet" href="others/css/all.css">


    <!--datepicker-->
    <link rel="stylesheet" href="others/date_picker/css/bootstrap-datepicker.css">

    <style type="text/css">
        .validated_background{
            border-color: #69c39b;
        }

        .error_background{
            border-color: red;
        }
    </style>
</head>

