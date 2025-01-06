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
                                        <h3 class="card-title" style="font-size: 20px">Confirmed Custom Requests</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->


                                    <div class="row">
                                        <div class="col-md-12">                                            
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" style="font-size: 20px;background-color: #D4F8CE" class="form-control text-center" placeholder="S e a r c h     H e r e . . ." id="cus_req_pay_search">
                                                    <table class="table table-hover table-striped table-bordered" style="max-height: 350px;" id="cus_req_pay_tbl">
                                                        <thead class="table-secondary">
                                                            <tr>
                                                                <th>Req no</th>
                                                                <th>Customer</th>
                                                                <th>NIC</th>
                                                                <th>contact</th>
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
                            <div class="modal fade" id="req_payment_mdl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <input type="text" class="form-control" id="custom_req_no" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="cus_regi_no" class="col-sm-4 col-form-label">Total Amount :</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="custom_req_total" readonly="">
                                                            <h6 style="color: red" id="cus_name_msg" class="d-none">This field is requird.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="cus_regi_no" class="col-sm-4 col-form-label">Balance Amount :</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="custom_req_balance" readonly="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-footer -->
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success complete_payment">Complete</button>
                                            <button type="button" class="btn btn-secondary close_pay_model">Close</button>
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
                    <script type="text/javascript" src="./controllers/custom_request_payment_controller.js"></script>
                    </html>

