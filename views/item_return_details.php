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
                                        <h3 class="card-title" style="font-size: 20px">Item Return Details</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="row">
                                        <div class="col-md-7">
                                            <form class="form-horizontal">
                                                <div class="card-body">
                                                    <div class="form-group row d-none">
                                                        <label for="invoice_no" class="col-sm-4 col-form-label">Invoice No:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="invoiceaa">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="invoice_no" class="col-sm-4 col-form-label">Invoice No:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="invoice_no" autofocus="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="invoice_no" class="col-sm-4 col-form-label">Select Item:</label>
                                                        <div class="col-sm-8">
                                                            <select type="text" class="form-control" id="select_item"></select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="invoice_no" class="col-sm-4 col-form-label">Damage Availability:</label>
                                                        <div class="col-sm-8">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="dmg_no" checked>
                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                    No
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="dmg_yes" >
                                                                <label class="form-check-label" for="flexRadioDefault2">
                                                                    Yes
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-none" id="damage_section">
                                                        <div class="form-group row">
                                                            <label for="invoice_no" class="col-sm-4 col-form-label">Damage Qty:</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="damaged_qty">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <button type="button" class="btn btn-warning" id="add_dmg">Add</button>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <table class="table table-striped table-bordered" style="max-height: 350px;background-color: black; color: white" id="return_items_tbl">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Item</th>
                                                                            <th>Damage Qty</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody></tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-5">
                                            <form class="form-horizontal">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="item_issue_date" class="col-sm-5 col-form-label">Issued Date:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="item_issue_date" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="item_return_date" class="col-sm-5 col-form-label">Return Date:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="item_return_date" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="pay_invoice" class="col-sm-5 col-form-label">Invoice Amount:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="pay_invoice" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="paid_invoice" class="col-sm-5 col-form-label">Paid Amount:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="paid_invoice" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="pay_balance" class="col-sm-5 col-form-label">Balance Amount:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="pay_balance" readonly="">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <hr>
                                                    <div class="form-group row">
                                                        <label for="current_date" class="col-sm-5 col-form-label">Current Date:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="current_date" value="<?php echo date('Y-m-d'); ?>" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="late_fine" class="col-sm-5 col-form-label">Late Return Fine:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="late_fine">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="other_fine" class="col-sm-5 col-form-label">Other Fine:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="other_fine">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="return_note" class="col-sm-5 col-form-label">Return Note:</label>
                                                        <div class="col-sm-7">
                                                            <textarea type="textarea" class="form-control" id="return_note"></textarea>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <hr>
                                                    <div class="form-group row">
                                                        <label for="final_amot" class="col-sm-5 col-form-label">Final Amount:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="final_amot" readonly="">
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                            <div class="card-footer">
                                                <button type="button" class="btn btn-success float-right" id="add_return_items">Finish</button>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- /.card -->
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
                    <script type="text/javascript" src="./controllers/item_return_controller.js"></script>
                    </html>

