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
                                        <h3 class="card-title" style="font-size: 20px;">Customer Registration</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="row">
                                        <div class="col-md-5">
                                            <form class="form-horizontal">
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="cus_regi_no" class="col-sm-4 col-form-label"><span style="color: red">*</span>Register No:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="cus_regi_no" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="cus_name" class="col-sm-4 col-form-label"><span style="color: red">*</span>Customer Name:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="cus_name" placeholder="Enter Customer Name">
                                                            <h6 style="color: red" id="cus_name_msg" class="d-none">This field is requird.</h6>
                                                            <h6 style="color: red" id="cus_name_valid" class="d-none">Invalid name format.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="cus_gender" class="col-sm-4 col-form-label"><span style="color: red">*</span>Gender:</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" id="cus_gender" placeholder="Select Customer Type">
                                                                <option value="">Please Select Gender</option>
                                                                <option>Male</option>
                                                                <option>Female</option>
                                                            </select>
                                                            <h6 style="color: red" id="cus_gender_msg" class="d-none">This field is requird.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="cus_nic" class="col-sm-4 col-form-label"><span style="color: red">*</span>NIC:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="cus_nic" placeholder="Enter Customer NIC">
                                                            <h6 style="color: red" id="cus_nic_msg" class="d-none">This field is requird.</h6>
                                                            <h6 style="color: red" id="cus_nic_valid" class="d-none">Invalid nic format.</h6>
                                                            <h6 style="color: red" id="cus_nic_check" class="d-none">This nic is already exists.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="cus_email" class="col-sm-4 col-form-label"><span style="color: red">*</span>Email:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="cus_email" placeholder="Enter Customer Email">
                                                            <h6 style="color: red" id="cus_email_msg" class="d-none">This field is requird.</h6>
                                                            <h6 style="color: red" id="cus_email_valid" class="d-none">Invalid email format.</h6>
                                                            <h6 style="color: red" id="cus_email_check" class="d-none">This email is already exists.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="cus_contact" class="col-sm-4 col-form-label"><span style="color: red">*</span>Contact No:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="cus_contact" placeholder="Enter Contact No:">
                                                            <h6 style="color: red" id="cus_contact_msg" class="d-none">This field is requird.</h6>
                                                            <h6 style="color: red" id="cus_contact_valid" class="d-none">Invalid contact format.</h6>
                                                            <h6 style="color: red" id="cus_contact_check" class="d-none">This contact is already exists.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="cus_address" class="col-sm-4 col-form-label"><span style="color: red">*</span>Address:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="cus_address" placeholder="Enter Customer Address:">
                                                            <h6 style="color: red" id="cus_address_msg" class="d-none">This field is requird.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" id="c_pw_row1">
                                                        <label for="password" class="col-sm-4 col-form-label"><span style="color: red">*</span>Password:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="password" id="c_password"password placeholder="Enter Password">
                                                            <h6 style="color: red" id="cus_pw_msg" class="d-none">This Field is Requird.</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" id="c_pw_row2">
                                                        <label for="confirm_pswd" class="col-sm-4 col-form-label"><span style="color: red">*</span>Confirm Password:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="password" id="confirm_pw" placeholder="Enter Confirm Password">
                                                            <h6 style="color: red" id="confirm_pw_msg" class="d-none">This Field is Requird.</h6>
                                                            <h6 style="color: red" id="match_pw_msg" class="d-none">Password not matched.</h6>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                    <button type="button" class="btn btn-outline-secondary" id="reset_cus">Reset</button>
                                                    <button type="button" class="btn btn-info float-right" id="save_cus">Save</button>
                                                    <button type="button" class="btn btn-warning float-right d-none" id="update_cus">Update</button>
                                                </div>
                                                <!-- /.card-footer -->
                                            </form>
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" style="font-size: 20px;background-color: #D4F8CE" class="form-control text-center" placeholder="S e a r c h     H e r e . . ." id="cus_search">
                                            <table class="table table-striped table-bordered" id="cus_regi_table">
                                                <thead class="table-secondary">
                                                    <tr>
                                                        <th>Regi No</th>
                                                        <th>Name</th>
                                                        <th>NIC</th>
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
    <script type="text/javascript" src="./controllers/customer_register_controller.js"></script>
</html>

