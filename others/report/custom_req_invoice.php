<?php
require_once './others/class/main_funtions.php';
$app = new setting();

$req_no = $_GET['req_no'];

$query = "SELECT
customer_request_payment_details.cus_req_inv_no,
customer_request_payment_details.cus_req_note,
customer_request_payment_details.cus_req_total,
customer_request_payment_details.cus_req_issued_date,
customer_details.cus_name,
customer_details.cus_contact
FROM
customer_request_payment_details
INNER JOIN custom_request_details ON customer_request_payment_details.cus_req_no = custom_request_details.cus_req_no
INNER JOIN customer_details ON custom_request_details.cus_req_nic = customer_details.cus_nic
WHERE
customer_request_payment_details.cus_req_no = '{$req_no}'";
$result = $app->basic_Select_Query($query);
?>

<html>
    <head>

        <style type="text/css">
            @media Print {
                .displayHide{
                    display: none;
                }
            }
            #invoice-POS{
                box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
                padding:2mm;
                margin: 0 auto;
                width: 84mm;
                background: #FFF;


                ::selection {background: #f31544; color: #FFF;}
                ::moz-selection {background: #f31544; color: #FFF;}
                h1{
                    font-size: 1.5em;
                    color: #222;
                }
                h2{font-size: .9em;
                }
                h3{
                    font-size: 1.2em;
                    font-weight: 300;
                    line-height: 2em;
                }
                p{
                    font-size: .7em;
                    color: #666;
                    line-height: 1.2em;
                }

                #top, #mid,#bot{ /* Targets all id with 'col-' */
                    border-bottom: 1px solid #EEE;
                }

                #top{min-height: 100px;}
                #mid{min-height: 80px;} 
                #bot{ min-height: 50px;}

                #top .logo{
                    /*//float: left;*/
                    height: 60px;
                    width: 60px;
                    background-image :url("http://localhost/sms/other/images/favi/pet_me.jpg");
                    background-size: 60px 60px;
                }
                .clientlogo{
                    float: left;
                    height: 60px;
                    width: 60px;
                    background: url() no-repeat;
                    background-size: 60px 60px;
                    border-radius: 50px;
                }
                .info{
                    display: block;
                    font-size: 1.2em;
                    /*//float:left;*/
                    margin-left: 0;
                }
                .title{
                    float: right;
                }
                .title p{text-align: right;} 
                table{
                    width: 100%;
                    border-collapse: collapse;
                }
                td{
                    /*//padding: 5px 0 5px 15px;*/
                    /*//border: 1px solid #EEE*/
                }
                .tabletitle{
                    /*//padding: 5px;*/
                    font-size: .4em;
                    background: #EEE;
                }
                .service{border-bottom: 1px solid #EEE;}
                .item{width: 24mm;
                      font-size: .2em;
                }
                .itemtext{font-size: .5em;}

                #legalcopy{
                    margin-top: 5mm;
                }



            }
        </style>
    </head>
    <body>
        <table border="" style="width: 100%; font-weight: bold;" class="tbl_boder displayHide center">
            <thead>
                <tr>
                    <th><a href="./?x=cus_req_complete"><button type="button" style="background-color: #D9EDF7; width: 3cm; height: 1cm;" ><b>Back</b></button></a></th>
                    <th><button type="button" onclick="window.print();" style="background-color: #D6E9C6; width: 3cm; height: 1cm;" ><b>Print</b></button></th>
                </tr>
            </thead>
        </table>
        <div id="invoice-POS">

            <center id="top">
                <div class="logo"></div>
                <div>
                    <img src="http://localhost/sms/other/images/favi/pet_me-012.jpg" style="width:80px;height: 80px">
                </div>
                <div class="info"> 
                    <h2>RON Renters & Tailors <br> Kegalle</h2>
                </div><!--End Info-->
            </center><!--End InvoiceTop-->

            <div id="mid">
                <div class="info" style="text-align: center">
                    <p> 
                        RON, Kegalle</br>
                        077-7898987
                    </p>
                    <table>
                        <tr> <td colspan="5">----------------------------------------------------------</td></tr>
                    </table>
<!--                    <p>
                        -------------------------------------------------------
                    </p>-->
                    <p>
                        <b style="margin-bottom:1px">Invoice</b>
                    </p>
                </div>
                <div class="info" style="text-align: left;margin-top:-40px;">
                    <table>
                        <tr>
                            <td>Inv : #<?php echo $result[0]['cus_req_inv_no']; ?> </td>
                        </tr>
                        <tr>
                            <td>Issued Date : <?php echo $result[0]['cus_req_issued_date']; ?></td><br>
                        </tr>
                        <tr>
                            <td> Customer : <?php echo $result[0]['cus_name'] . ' / ' . $result[0]['cus_contact']; ?></td>
                        </tr>

                    </table>
                </div>
            </div><!--End Invoice Mid-->

            <div id="bot">

                <div id="table">
                    <table>
                        <tr> <td colspan="5">----------------------------------------------------------</td></tr>
                        <tr>
                            <td colspan="4">Requst Note ||</td>
                            <td>Total </td>
                        </tr>
                        <tr> <td colspan="5">----------------------------------------------------------</td></tr>

                        <tr class="service">
                            <td class="tableitem" colspan="4"><p class="itemtext"><?php echo $result[0]['cus_req_note'] ?></p></td>
                            <td class="tableitem"><p class="itemtext" style="padding-left:7px;"><?php echo $result[0]['cus_req_total'] ?></p></td>
                        </tr>

                        <tr><td colspan="5">----------------------------------------------------------</td></tr>
                        <tr><td colspan="5" style="text-align: right; border-top-style: solid; border-bottom: double">Invoice Amount : <?php echo number_format((float) $result[0]['cus_req_total'], 2, '.', ''); ?></td></tr> 

                    </table>
                </div><!--End Table-->

                <div id="legalcopy">
                    <p class="legal" style="text-align: center;"><strong>Thank you for your business!<br> Come Again</strong>
                    </p>
                    <p class="legal" style="text-align: center;font-size: 10px;margin-top: -12px">Software Developed - Agra Wickramathilaka <br> 076-9778780
                    </p>
                </div>

            </div><!--End InvoiceBot-->
        </div><!--End Invoice-->
    </body>

</html>
