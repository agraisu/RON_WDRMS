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
                                        <h3 class="card-title" style="font-size: 20px">GRN Details</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form class="form-horizontal">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="grn_no" class="col-sm-4 col-form-label">Grn No:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="grn_no" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="grn_date" class="col-sm-4 col-form-label">Grn Date:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="grn_date" data-provide="datepicker" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d'); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="item_supplier" class="col-sm-4 col-form-label"><span style="color: red">*</span>Supplier:</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control chosen" id="item_supplier"></select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control text-center" placeholder="SEARCH ITEM HERE ..." style="background-color: black; color: white;font-weight: bold" id="items_search">
                                                            <table class="table table-hover table-striped table-bordered" style="max-height: 350px;" id="items_tbl">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Item Code</th>
                                                                        <th>Item</th>
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
                                                        <label for="total_qty" class="col-sm-4 col-form-label">Total Qty:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="total_qty">
                                                            <h6 style="color: red" id="tot_qty_req" class="d-none">Enter the quantity after selecting an item.</h6>
                                                            <h6 style="color: red" id="tot_qty_valid" class="d-none">Please enter a valid qty.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="purchased_price" class="col-sm-4 col-form-label">Unit Price:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="purchased_price">
                                                            <h6 style="color: red" id="purchased_price_req" class="d-none">This field is required.</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="card-footer">
                                                <button type="button" class="btn btn-info float-right" id="add_grn_items">Add</button>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                            <h5 class="text-center"><b>Added Item Details : <span id="added_item_tbl"></span></b></h5>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" style="font-size: 20px;background-color: #D4F8CE" class="form-control text-center" placeholder="S e a r c h     H e r e . . ." id="stock_details_search">
                                                    <table class="table table-hover table-striped table-bordered" style="max-height: 350px;" id="stock_details_tbl">
                                                        <thead class="table-secondary">
                                                            <tr>
                                                                <th>Item</th>
                                                                <th>Total QTY</th>
                                                                <th>Unit Price</th>
                                                                <th>Total Price</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                            </div
                                        </div>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-success float-right" id="finsh_grn">Finish GRN</button>
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
    <script type="text/javascript" src="./controllers/inventory_details_controller.js"></script>
</html>

