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
                                        <h3 class="card-title" style="font-size: 20px">Supplier Payment Details</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form class="form-horizontal">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="select_sup" class="col-sm-4 col-form-label"><span style="color: red">*</span>Supplier:</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control chosen" id="select_sup"></select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="select_grn_no" class="col-sm-4 col-form-label"><span style="color: red">*</span>GRN No:</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" id="select_grn_no"></select>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <form class="form-horizontal">
                                                <div class="card-body">
                                                    <!--Start old sell-->
                                                    <div class="form-group row">
                                                        <label for="sup_total" class="col-sm-5 col-form-label">GRN Total:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="sup_total" readonly="" style="background-color: #D4F8CE;font-size: 20px;font-weight: bold">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="sup_paid" class="col-sm-5 col-form-label">Paid Amont:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="sup_paid" readonly="" style="background-color: lightcyan;font-size: 20px;font-weight: bold">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="sup_balance" class="col-sm-5 col-form-label">Balance Amount:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="sup_balance" readonly="" style="background-color: lightpink;font-size: 20px;font-weight: bold">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group row">
                                                        <label for="new_pay" class="col-sm-5 col-form-label">New Payment:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="new_pay" style="background-color: black; color: white; height: 50px; font-size: 25px">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </form>
                                            <div class="card-footer">
                                                <button type="button" class="btn btn-info float-right" id="add_sup_pay">Add</button></br>
                                           </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="text-center"><b>Added Supplier Payment Details : <span id="added_sup_pay_tbl"></span></b></h5>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" style="font-size: 20px;background-color: #D4F8CE" class="form-control text-center" placeholder="S e a r c h     H e r e . . ." id="sup_pay_search">
                                                    <table class="table table-hover table-striped table-bordered" style="max-height: 350px;" id="sup_pay_tbl">
                                                        <thead class="table-secondary">
                                                            <tr>
                                                                <th>Paid Amount</th>
                                                                <th>Paid Date</th>
                                                                <th>Paid User</th>
                                                                <th>Paid Status</th>
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
                                <!--/.col (left) -->
                                <!-- right column -->

                                <!--/.col (right) -->
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->


                </section>
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
    <script type="text/javascript" src="./controllers/supplier_payment_controller.js"></script>
</html>

