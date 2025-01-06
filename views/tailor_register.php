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
                                        <h3 class="card-title" style="font-size: 20px;">Tailor Registration</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="row">
                                        <div class="col-md-5">
                                            <form class="form-horizontal">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="tailor_regi_no" class="col-sm-4 col-form-label"><span style="color: red">*</span>Register No:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="tailor_regi_no" placeholder="Enter Tailor Register Number" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="tailor_name" class="col-sm-4 col-form-label"><span style="color: red">*</span>Tailor Name:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="tailor_name" placeholder="Enter Tailor Name">
                                                            <h6 style="color: red" id="tailor_name_msg" class="d-none">This field is requird.</h6>
                                                            <h6 style="color: red" id="tailor_name_valid" class="d-none">Invalid name format.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="tailor_nic" class="col-sm-4 col-form-label"><span style="color: red">*</span>NIC:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="tailor_nic" placeholder="Enter Tailor NIC">
                                                            <h6 style="color: red" id="tailor_nic_msg" class="d-none">This field is requird.</h6>
                                                            <h6 style="color: red" id="tailor_nic_valid" class="d-none">Invalid nic format.</h6>
                                                            <h6 style="color: red" id="tailor_nic_check" class="d-none">This nic is already exists.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="tailor_email" class="col-sm-4 col-form-label">&nbsp;&nbsp;Email:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="tailor_email" placeholder="Enter Tailor Email">
                                                            <h6 style="color: red" id="tailor_email_valid" class="d-none">Invalid email format.</h6>
                                                            <h6 style="color: red" id="tailor_email_check" class="d-none">This email is already exists.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="tailor_contact" class="col-sm-4 col-form-label"><span style="color: red">*</span>Contact No:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="tailor_contact" placeholder="Enter Contact No:">
                                                            <h6 style="color: red" id="tailor_contact_msg" class="d-none">This field is requird.</h6>
                                                            <h6 style="color: red" id="tailor_contact_valid" class="d-none">Invalid contact format.</h6>
                                                            <h6 style="color: red" id="tailor_contact_check" class="d-none">This contact is already exists.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="tailor_address" class="col-sm-4 col-form-label">&nbsp;&nbsp;Address:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="tailor_address" placeholder="Enter Tailor Address:">
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                    <button type="button" class="btn btn-outline-secondary" id="reset_tailor">Reset</button>
                                                    <button type="button" class="btn btn-info float-right" id="save_tailor">Save</button>
                                                    <button type="button" class="btn btn-warning float-right d-none" id="update_tailor">Update</button>
                                                </div>
                                                <!-- /.card-footer -->
                                            </form>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" style="font-size: 20px;background-color: #D4F8CE" class="form-control text-center" placeholder="S e a r c h     H e r e . . ." id="tailor_search">
                                            <table class="table table-striped table-bordered" id="tailor_regi_table">
                                                <thead class="table-secondary">
                                                    <tr>
                                                        <th>Regi No</th>
                                                        <th>Name</th>
                                                        <th>NIC</th>
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
    <script type="text/javascript" src="./controllers/tailor_register_controller.js"></script>
</html>

