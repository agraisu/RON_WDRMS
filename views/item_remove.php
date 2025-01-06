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
                                        <h3 class="card-title" style="font-size: 20px;">Item Remove</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form class="form-horizontal">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control text-center" placeholder="SEARCH ITEM HERE ..." style="background-color: black; color: white;font-weight: bold" id="remove_items_search">
                                                            <table class="table table-hover table-striped table-bordered" style="max-height: 350px;" id="remove_items_tbl">
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
                                            <div class="card-footer">
                                                <button type="button" class="btn btn-warning float-left" id="view_dmg_stock">View Damaged Stock</button>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <form class="form-horizontal">
                                                <div class="card-body">
                                                    <!--Start old sell-->
                                                    <div class="form-group row">
                                                        <label for="selected_item" class="col-sm-5 col-form-label">Selected Item:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="selected_item" readonly="">
                                                        </div>
                                                    </div>
                                                     <div class="form-group row">
                                                        <label for="dmg_qty" class="col-sm-5 col-form-label">Damaged Qty:</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="dmg_qty">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="remove_note" class="col-sm-5 col-form-label">Note:</label>
                                                        <div class="col-sm-7">
                                                            <textarea type="textarea" class="form-control" id="remove_note"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="card-footer">
                                                <button type="button" class="btn btn-success float-right" id="add_removed_items">Add</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row d-none" id="dmg_details_section">
                                        <div class="col-md-12">
                                            <hr>
                                            <h5 class="text-center"><b>Damaged Items Details <span id="removed_items"></span></b></h5>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="text" style="font-size: 20px;background-color: #D4F8CE" class="form-control text-center" placeholder="S e a r c h     H e r e . . ." id="find_removed_items">
                                                    <table class="table table-hover table-striped table-bordered" style="max-height: 350px;" id="view_removed_items">
                                                        <thead class="table-secondary">
                                                            <tr>
                                                                <th>Item</th>
                                                                <th>Removed QTY</th>
                                                                <th>Removed Date & Time</th>
                                                                <th>Removed User</th>
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
                    <script type="text/javascript" src="./controllers/item_remove_controller.js"></script>
                    </html>

