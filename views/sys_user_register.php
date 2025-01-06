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
                                        <h3 class="card-title" style="font-size: 20px;">System User Registration</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="row">
                                        <div class="col-md-5">
                                            <form class="form-horizontal">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="full_name" class="col-sm-4 col-form-label"><span style="color: red">*</span>Full Name:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="full_name" placeholder="Enter Full Name">
                                                            <h6 style="color: red" id="full_name_msg" class="d-none">This field is requird.</h6>
                                                            <h6 style="color: red" id="full_name_valid_msg" class="d-none">Invalid name format.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nic" class="col-sm-4 col-form-label"><span style="color: red">*</span>NIC:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="nic" placeholder="Enter NIC">
                                                            <h6 style="color: red" id="nic_msg" class="d-none">This field is requird.</h6>
                                                            <h6 style="color: red" id="nic_valid_msg" class="d-none">Invalid nic format.</h6>
                                                            <h6 style="color: red" id="nic_aval_msg" class="d-none">This NIC is already exists.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="email" class="col-sm-4 col-form-label"><span style="color: red">*</span>Email:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="email" placeholder="Enter Email">
                                                            <h6 style="color: red" id="email_msg" class="d-none">This field is requird.</h6>
                                                            <h6 style="color: red" id="email_valid_msg" class="d-none">Invalid email format.</h6>
                                                            <h6 style="color: red" id="email_exist_msg" class="d-none">This email is already exists.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="contact" class="col-sm-4 col-form-label"><span style="color: red">*</span>Contact No:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="contact" placeholder="Enter Contact No:">
                                                            <h6 style="color: red" id="contact_msg" class="d-none">This Field is Requird.</h6>
                                                            <h6 style="color: red" id="contact_valid_msg" class="d-none">Invalid contact format.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="address" class="col-sm-4 col-form-label">&nbsp;&nbsp;Address:</label>
                                                        <div class="col-sm-8">
                                                            <input type="textarea" class="form-control" id="address" placeholder="Enter Address:"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="user_name" class="col-sm-4 col-form-label"><span style="color: red">*</span>User Name:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="user_name" placeholder="Enter User Name">
                                                            <h6 style="color: red" id="user_name_msg" class="d-none">This Field is Requird.</h6>
                                                             <h6 style="color: red" id="username_exist_msg" class="d-none">This user name is already exists.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" id="pw_row1">
                                                        <label for="password" class="col-sm-4 col-form-label"><span style="color: red">*</span>Password:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="password" id="password" placeholder="Enter Password">
                                                            <h6 style="color: red" id="password_msg" class="d-none">This Field is Requird.</h6>
                                                        </div>
                                                    </div>
                                                   <div class="form-group row" id="pw_row2">
                                                        <label for="confirm_passs" class="col-sm-4 col-form-label"><span style="color: red">*</span>Confirm Password:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="password" id="confirm_passs" placeholder="Enter Confirm Password">
                                                            <h6 style="color: red" id="confirm_passs_msg" class="d-none">This Field is Requird.</h6>
                                                            <h6 style="color: red" id="match_passs_msg" class="d-none">Password not matched.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="role" class="col-sm-4 col-form-label"><span style="color: red">*</span>User Role:</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" id="role" placeholder="Select User Role">
                                                                <option value="">Please select a role</option>
                                                                <option>Admin</option>
                                                                <option>Manager</option>
                                                                <option>Assistant Manager</option>
                                                                <option>Cashier</option>
                                                            </select>
                                                            <h6 style="color: red" id="role_msg" class="d-none">This Field is Requird.</h6>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                    <button type="button" class="btn btn-outline-secondary" id="reset_user">Reset</button>
                                                    <button type="button" class="btn btn-info float-right" id="save_user">Save</button>
                                                    <button type="button" class="btn btn-warning float-right d-none" id="update_user">Update</button>
                                                </div>
                                                <!-- /.card-footer -->
                                            </form>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" style="font-size: 20px;background-color: #D4F8CE" class="form-control text-center" placeholder="S e a r c h     H e r e . . ." id="user_search">
                                            <table class="table table-striped table-bordered" id="user_regi_table">
                                                <thead class="table-secondary">
                                                    <tr>
                                                        <th>Full Name</th>
                                                        <th>NIC</th>
                                                        <th>Email</th>
                                                        <th>Contact</th>
                                                        <th>User Role</th>
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
    <script type="text/javascript" src="./controllers/sys_user_register_controller.js"></script>
</html>

