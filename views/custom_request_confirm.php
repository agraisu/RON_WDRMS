<!DOCTYPE html>
<html lang="en">
    <?php require_once './others/sub_pages/all_css.php'; ?>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            <?php require_once './others/sub_pages/nav_bar.php'; ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?php require_once './others/sub_pages/side_bar.php'; ?>
            <!-- /Main Sidebar Container -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <!-- /.card -->
                                <!-- Horizontal Form -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title" style="font-size: 20px">Custom Requests</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->


                                    <div class="row">
                                        <div class="col-md-12">                                            
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" style="font-size: 20px;background-color: #D4F8CE" class="form-control text-center" placeholder="S e a r c h     H e r e . . ." id="cus_req_search">
                                                    <table class="table table-hover table-striped table-bordered" style="max-height: 350px;" id="view_cus_req_tbl">
                                                        <thead class="table-secondary">
                                                            <tr>
                                                                <th>Req no</th>
                                                                <th>Customer</th>
                                                                <th>NIC</th>
                                                                <th>contact</th>
                                                                <th>Customer Req. Date</th>
                                                                <th>Photo</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                            </div
                                        </div>
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.row -->
                            </div><!-- /.container-fluid -->
                            </section>
                            <!--=========================================================================-->        
                            <div class="modal fade" id="req_note_mdl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-center" style="font-size: 24px;margin-left: 153px" id="exampleModalLabel"><b>Item Preview</b></h1>
                                        </div>
                                        <div class="modal-body">
                                            <img id="req_img" style="width: 400px; height: 400px;margin-left: 30px">
                                            <hr>
                                            <h1 class="modal-title fs-5 text-center" style="font-size: 24px;" id="exampleModalLabel"><b>Request Note</b></h1>
                                            <p id="req_note" class="text-center"></p>
                                            <hr>
                                            <h1 class="modal-title fs-5 text-center" style="font-size: 24px;" id="exampleModalLabel"><b>Required Date</b></h1>
                                            <p id="req_date" class="text-center"></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary close_model" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--=========================================================================--> 

                            <!--=========================================================================-->        
                            <div class="modal fade" id="req_confirm_mdl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title fs-5 text-center" id="exampleModalLabel">Payments</h3>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="cus_regi_no" class="col-sm-4 col-form-label">Req No :</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="cus_req_no" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="cus_req_note" class="col-sm-4 col-form-label">Request Note :</label>
                                                        <div class="col-sm-8">
                                                            <textarea rows="6" class="form-control" id="cus_req_note"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="cus_regi_no" class="col-sm-4 col-form-label">Total Amount :</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="cus_req_total_amt">
                                                            <h6 style="color: red" id="cus_name_msg" class="d-none">This field is requird.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="cus_regi_no" class="col-sm-4 col-form-label">Advance Amount :</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="cus_req_advance_amt">
                                                            <h6 style="color: red" id="cus_name_msg" class="d-none">This field is requird.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="cus_regi_no" class="col-sm-4 col-form-label">Balance Amount :</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="cus_req_balance_amt" readonly="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-footer -->
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success conf_payment">Confirm</button>
                                            <button type="button" class="btn btn-secondary close_conf_model">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--=========================================================================--> 

                            <!--=========================================================================-->        
                            <div class="modal fade" id="tailor_assign_modal" tabindex="-1" aria-labelledby="tailor_assign_modal" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-center" style="font-size: 24px;margin-left: 153px"><b>Assign Tailor</b></h1>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="cus_regi_no" class="col-sm-4 col-form-label">Selected Request :</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="selected_request" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="cus_regi_no" class="col-sm-4 col-form-label">Select Tailor :</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" id="select_tailor"></select>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h5>Ongoing Jobs</h5>
                                                    <hr>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <select class="form-control" id="ongoing_jobs" multiple=""></select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="cus_regi_no" class="col-sm-4 col-form-label">Target Date :</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="target_date" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary close_model_assign">Close</button>
                                            <button type="button" class="btn btn-primary" id="add_assign">Assign</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--=========================================================================--> 

                            <!-- /.content -->
                        </div>
                        <!-- /.content-wrapper -->
                        <?php require_once './others/sub_pages/footer.php'; ?>
                        <!-- Control Sidebar -->
                        <aside class="control-sidebar control-sidebar-dark">
                            <!-- Control sidebar content goes here -->
                        </aside>
                        <!-- /.control-sidebar -->
                    </div>
                    <!-- ./wrapper -->
                    <?php require_once './others/sub_pages/all_js.php'; ?>
                    </body>
                    <script type="text/javascript" src="./controllers/custom_request_confirm_controller.js"></script>
                    </html>

