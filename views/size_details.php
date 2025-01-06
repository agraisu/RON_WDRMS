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
                                        <h3 class="card-title" style="font-size: 20px">Category Size Registration</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="row">
                                        <div class="col-md-5">
                                            <form class="form-horizontal">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="category" class="col-sm-4 col-form-label"><span style="color: red">*</span>Item Category:</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" id="category"></select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="cat_size" class="col-sm-4 col-form-label"><span style="color: red">*</span>Size:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="cat_size" placeholder="Enter Category Size">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                    <button type="button" class="btn btn-outline-secondary" id="reset_size">Reset</button>
                                                    <button type="button" class="btn btn-info float-right" id="save_size">Save</button>
                                                    <button type="button" class="btn btn-warning float-right d-none" id="update_size">Update</button>
                                                </div>
                                                <!-- /.card-footer -->
                                            </form>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" style="font-size: 20px;background-color: #D4F8CE" class="form-control text-center" placeholder="S e a r c h     H e r e . . ." id="cat_size_search">
                                            <table class="table table-striped table-bordered" id="cat_size_table">
                                                <thead class="table-secondary">
                                                    <tr>
                                                        <th>Size</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-bordered"></tbody>
                                            </table>
                                        </div>
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
    <script type="text/javascript" src="./controllers/size_details_controller.js"></script>
</html>

