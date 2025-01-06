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
                                        <h3 class="card-title" style="font-size: 20px;">Supplier Registration</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="row">
                                        <div class="col-md-5">
                                            <form class="form-horizontal">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="sup_regi_no" class="col-sm-4 col-form-label"><span style="color: red">*</span>Register No:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="sup_regi_no" placeholder="Enter Supplier Register Number" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="sup_name" class="col-sm-4 col-form-label"><span style="color: red">*</span>Supplier Name:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="sup_name" placeholder="Enter Supplier Name">
                                                            <h6 style="color: red" id="sup_name_msg" class="d-none">This field is requird.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="comp_name" class="col-sm-4 col-form-label">&nbsp;&nbsp;Company Name:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="comp_name" placeholder="Enter Company Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="comp_details" class="col-sm-4 col-form-label">&nbsp;&nbsp;Company Details:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="comp_details" placeholder="Enter Company Details">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="sup_email" class="col-sm-4 col-form-label"><span style="color: red">*</span>Email:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="sup_email" placeholder="Enter Supplier Email">
                                                            <h6 style="color: red" id="sup_email_msg" class="d-none">This field is requird.</h6>
                                                            <h6 style="color: red" id="sup_email_valid" class="d-none">Ivalid email format.</h6>
                                                            <h6 style="color: red" id="sup_email_check" class="d-none">This email is already exists.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="sup_contact" class="col-sm-4 col-form-label"><span style="color: red">*</span>Contact No:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="sup_contact" placeholder="Enter Contact No:">
                                                            <h6 style="color: red" id="sup_contact_msg" class="d-none">This field is requird.</h6>
                                                            <h6 style="color: red" id="sup_contact_valid" class="d-none">Invalid contact format.</h6>
                                                            <h6 style="color: red" id="sup_contact_check" class="d-none">This contact is already exists.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="sup_address" class="col-sm-4 col-form-label"><span style="color: red">*</span>Address:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="sup_address" placeholder="Enter Supplier Address:">
                                                            <h6 style="color: red" id="sup_address_msg" class="d-none">This field is requird.</h6>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                    <button type="button" class="btn btn-outline-secondary" id="reset_sup">Reset</button>
                                                    <button type="button" class="btn btn-info float-right" id="save_sup">Save</button>
                                                    <button type="button" class="btn btn-warning float-right d-none" id="update_sup">Update</button>
                                                </div>
                                                <!-- /.card-footer -->
                                            </form>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" style="font-size: 20px;background-color: #D4F8CE" class="form-control text-center" placeholder="S e a r c h     H e r e . . ." id="sup_search">
                                            <table class="table table-striped table-bordered" id="sup_regi_table">
                                                <thead class="table-secondary">
                                                    <tr>
                                                        <th>Regi No</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Contact</th>
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
    <script type="text/javascript" src="./controllers/supplier_register_controller.js"></script>
</html>

