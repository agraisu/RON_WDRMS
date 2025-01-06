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
                                        <h3 class="card-title" style="font-size: 20px">Item Reservation</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form class="form-horizontal">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="reserv_no" class="col-sm-4 col-form-label">Reservation No:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="reserv_no">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="reserv_cus" class="col-sm-4 col-form-label"><span style="color: red">*</span>Customer:</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" id="reserv_cus"></select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control text-center" placeholder="SEARCH ITEM HERE ..." style="background-color: black; color: white;font-weight: bold" id="reserv_items_search">
                                                            <table class="table table-hover table-striped table-bordered" style="max-height: 350px;" id="reserv_items_tbl">
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
                                                        <label for="reserv_qty" class="col-sm-5 col-form-label">Qty:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="reserv_qty">
                                                            <h5 class="d-none" id="qty_msg" style="color: red">Available Quantity Exceeded</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="card-footer">
                                                <button type="button" class="btn btn-info float-right" id="add_reserv_items" >Add</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                            <h5 class="text-center"><b>Booked Items Details : <span id=""></span></b></h5>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" style="font-size: 20px;background-color: #D4F8CE" class="form-control text-center" placeholder="S e a r c h     H e r e . . ." id="reserv_details_search">
                                                    <table class="table table-hover table-striped table-bordered" style="max-height: 350px;" id="reserv_details_tbl">
                                                        <thead class="table-secondary">
                                                            <tr>
                                                                <th>Item</th>
                                                                <th>QTY</th>
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
                                                            <label for="reserv_advance" class="col-sm-5 col-form-label">Advance Payment:</label>
                                                            <div class="input-group col-sm-7">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text font-weight-bold" style="background-color: #9db6b4;border: 2px solid black;
                                                                          margin-top: 1px;height: 36px;width: 40px">Rs. /</span>
                                                                </div>
                                                                <input type="text" class="form-control" id="reserv_advance">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-4">
                                                <form class="form-horizontal">
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label for="reserv_req_date" class="col-sm-5 col-form-label">Required Date:</label>
                                                            <div class="input-group col-sm-7">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                          style="background-color: #9db6b4;border: 2px solid black;width: 40px"><i
                                                                            class="far fa-calendar-alt"></i></span>
                                                                </div>
                                                                <input type="date" class="form-control" id="reserv_req_date" value="<?php echo date('Y-m-d'); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-footer">
                                                    <button type="button" class="btn btn-success float-right" id="book_items">Booked</button>
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
                    <script type="text/javascript" src="./controllers/item_reservation_controller.js"></script>
                    </html>

