<!DOCTYPE html>
<html lang="en">
    
    
    <?php require_once 'others/sub_pages/all_css.php'; ?>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            <?php require_once 'others/sub_pages/nav_bar.php'; ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?php require_once 'others/sub_pages/side_bar.php'; ?>
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
                                        <h3 class="card-title">User Privilage</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="row text-center">
                                        <div class="col-md-12">
                                            <hr>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-2 col-form-label">Select User :</label>
                                                <div class="col-md-10">
                                                    <select class="form-control col-md-5" id="user"></select>
                                                </div>
                                            </div>
                                            <hr>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 text-center">
                                            <h5>Available Privilages</h5>
                                            <hr>
                                            <select multiple="" id="aval_pri" class="form-control" style="height: 450px;"></select>
                                        </div>
                                        <div class="col-md-2 text-center" style="padding-top: 170px;">
                                            <button type="button" class="btn btn-primary col-md-8" id="custom_add">></button><br>
                                            <hr>
                                            <button type="button" class="btn btn-success col-md-8" id="all_add">>></button><br>
                                            <hr>
                                            <button type="button" class="btn btn-warning col-md-8" id="custom_remove"><</button><br>
                                            <hr>
                                            <button type="button" class="btn btn-danger col-md-8" id="all_remove"><<</button>
                                        </div>
                                        <div class="col-md-5 text-center">
                                            <h5>Assigned Privilages</h5>
                                            <hr>
                                            <select multiple="" id="assign_pri" class="form-control" style="height: 450px;"></select>
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
            <?php require_once 'others/sub_pages/footer.php'; ?>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        <?php require_once 'others/sub_pages/all_js.php'; ?>
    </body>
   <script type="text/javascript" src="./controllers/user_privilage_controller.js"></script>
</html>



