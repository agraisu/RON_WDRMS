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
                                        <h3 class="card-title" style="font-size: 20px">Invoice Details</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form class="form-horizontal">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="invoice_no" class="col-sm-4 col-form-label">Invoice No:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="invoice_no" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="cus_item" class="col-sm-4 col-form-label"><span style="color: red">*</span>Customer:</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" id="cus_item"></select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control text-center" placeholder="SEARCH ITEM HERE ..." style="background-color: black; color: white;font-weight: bold" id="invoice_items_search">
                                                            <table class="table table-hover table-striped table-bordered" style="max-height: 350px;" id="invoice_items_tbl">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Item Code</th>
                                                                        <th>Item</th>
                                                                        <th>Ava Qty</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody></tbody>
                                                            </table>
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
                                                        <label for="inv_issue_date" class="col-sm-5 col-form-label">Issue Date:</label>
                                                        <div class="input-group col-sm-7">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                      style="background-color: #9db6b4;border: 2px solid black;width: 40px"><i
                                                                        class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" id="inv_issue_date" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d'); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inv_exp_date" class="col-sm-5 col-form-label">Expire Date:</label>
                                                        <div class="input-group col-sm-7">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                      style="background-color: #9db6b4;border: 2px solid black;width: 40px"><i
                                                                        class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" id="inv_exp_date" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="rent_price" class="col-sm-5 col-form-label">Rent Price:</label>
                                                        <div class="input-group col-sm-7">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text font-weight-bold" style="background-color: #9db6b4;border: 2px solid black;
                                                                      margin-top: 1px;height: 36px;width: 40px">Rs. /</span>
                                                            </div>
                                                            <input type="text" class="form-control" id="rent_price" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="invoice_qty" class="col-sm-5 col-form-label">Qty:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="invoice_qty">
                                                            <h6 class="d-none" id="qty_msg" style="color: red">Available Quantity Exceeded</h6>
                                                            <h6 style="color: red" id="qty_req" class="d-none">Enter the quantity after selecting an item.</h6>
                                                            <h6 style="color: red" id="qty_valid" class="d-none">Please enter a valid qty.</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="card-footer">
                                                <button type="button" class="btn btn-info float-right" id="add_invoice_items" >Add</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                            <h5 class="text-center"><b>Added Invoice Details : <span id="added_item_tbl"></span></b></h5>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" style="font-size: 20px;background-color: #D4F8CE" class="form-control d-none text-center" placeholder="S e a r c h     H e r e . . ." id="invoice_details_search">
                                                    <table class="table table-hover table-striped table-bordered" style="max-height: 350px;" id="invoice_details_tbl">
                                                        <thead class="table-secondary">
                                                            <tr>
                                                                <th>Item</th>
                                                                <th>QTY</th>
                                                                <th>Rent Price</th>
                                                                <th>Total Price</th>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <form class="form-horizontal">
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label for="total_amount" class="col-sm-4 col-form-label">Total Amount:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="total_amount" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-4">
                                                <form class="form-horizontal">
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label for="advance_pay" class="col-sm-4 col-form-label">Advance Pay:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="advance_pay">
                                                                <h6 style="color: red" id="inv_advance_msg" class="d-none">This field is reuired.</h6>
                                                                <h6 style="color: red" id="inv_advance_valid" class="d-none">Invalid format.</h6>
                                                                <h6 style="color: red" id="inv_advance_validity" class="d-none">Please enter a valid payment.</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-4">
                                                <form class="form-horizontal">
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label for="invoice_balance" class="col-sm-4 col-form-label">Balance:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="invoice_balance" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="card-footer">
                                                    <button type="button" class="btn btn-success float-right" id="add_inv_items">Finish Invoice</button>
                                                </div>
                                            </div>
                                        </div>
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
                    <script type="text/javascript" src="./controllers/invoice_details_controller.js"></script>
                    </html>

