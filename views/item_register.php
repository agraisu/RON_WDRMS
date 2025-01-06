<!DOCTYPE html>
<html lang="en">
    <?php require_once './others/sub_pages/all_css.php'; ?>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
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
                                        <h3 class="card-title" style="font-size: 20px">Item Registration</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="row">
                                        <div class="col-md-5">
                                            <form class="form-horizontal">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="item_code" class="col-sm-4 col-form-label"><span style="color: red">*</span>Item Code:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="item_code" placeholder="Enter Item Code" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="item_cat" class="col-sm-4 col-form-label"><span style="color: red">*</span>Item Category:</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" id="item_cat"></select>
                                                            <h6 style="color: red" id="item_cat_msg" class="d-none">This field is requird.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="item_gender" class="col-sm-4 col-form-label"><span style="color: red">*</span>Gender:</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" id="item_gender" placeholder="Select Gender">
                                                                <option value="">Please select a gender</option>
                                                                <option>Male</option>
                                                                <option>Female</option>
                                                            </select>
                                                            <h6 style="color: red" id="item_gender_msg" class="d-none">This field is requird.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="size" class="col-sm-4 col-form-label"><span style="color: red">*</span>Size:</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" id="size"></select>
                                                            <h6 style="color: red" id="item_size_msg" class="d-none">This field is requird.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="fabric_type" class="col-sm-4 col-form-label"><span style="color: red">*</span>Fabric Type:</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" id="fabric_type"></select>
                                                            <h6 style="color: red" id="item_fabric_msg" class="d-none">This field is requird.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="design_type" class="col-sm-4 col-form-label"><span style="color: red">*</span>Design Type:</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" id="design_type"></select>
                                                            <h6 style="color: red" id="item_design_msg" class="d-none">This field is requird.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="color" class="col-sm-4 col-form-label"><span style="color: red">*</span>Color:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="color" placeholder="Enter Item Color">
                                                            <h6 style="color: red" id="item_color_msg" class="d-none">This field is requird.</h6>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="item_name" class="col-sm-4 col-form-label"><span style="color: red">*</span>Item Name:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="item_name" placeholder="Enter Item Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="item_keep" class="col-sm-4 col-form-label"><span style="color: red">*</span>Keep Days:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="item_keep" placeholder="Enter Item Keep Days">
                                                            <h6 style="color: red" id="item_keep_msg" class="d-none">This field is requird.</h6>
                                                            <h6 style="color: red" id="item_keep_valid_msg" class="d-none">Invalid format.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="item_rent_cost" class="col-sm-4 col-form-label"><span style="color: red">*</span>Rent Price:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="item_rent_cost">
                                                            <h6 style="color: red" id="item_rent_msg" class="d-none">This field is requird.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="item_photo" class="col-sm-4 col-form-label"><span style="color: red">*</span>Item Photo:</label>
                                                        <div class="col-sm-4">
                                                            <input type="file" id="file" name = "file" /> 
                                                            <hr>
                                                            <img src="" id="image" width = "100" height = "100">
                                                            <h5 id="img_msg" style="color: red" class="d-none">Invalid File Format</h5>
                                                            <h6 style="color: red" id="item_photo_msg" class="d-none">This field is requird.</h6>
                                                            <h6 style="color: red" id="item_photo_check" class="d-none">Please select an image.</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                    <button type="button" class="btn btn-outline-secondary" id="reset_item">Reset</button>
                                                    <button type="button" class="btn btn-info float-right" id="save_item">Save</button>
                                                    <button type="button" class="btn btn-warning float-right d-none" id="update_item">Update</button>
                                                </div>
                                                <!-- /.card-footer -->
                                            </form>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" style="font-size: 20px;background-color: #D4F8CE" class="form-control text-center" placeholder="S e a r c h     H e r e . . ." id="item_search">
                                            <table class="table table-striped table-bordered" id="item_regi_table">
                                                <thead class="table-secondary">
                                                    <tr>
                                                        <th>Item Code</th>
                                                        <th>Item Name</th>
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
    <script type="text/javascript" src="./controllers/item_register_controller.js"></script>
</html>

