<!DOCTYPE html>
<html lang="en">
    <?php require_once './others/sub_pages/all_css.php'; ?>
    <body class="hold-transition login-page" style="background-image: linear-gradient(rgba(31,30,30,0.38), rgba(0, 0, 0, 0.38)),url('images/n1.jpg');background-repeat: no-repeat;background-size: 1750px 1200px">
        <div class="login-box">

            <!-- /.login-logo -->
            <div class="card">
                <!--                <div class="card-body login-card-body" style="border: 2px solid pink;background-image: linear-gradient(rgba(183, 189, 189,0.85), rgba(183, 189, 189, 0.85)),url('images/n.jpg');border-radius: 10px">-->
                <div class="card-body login-card-body" style="border: 2px solid black;background-color: #EEEEEE">

                    <div class="login-logo">
                        <a href="../../index2.html"><b><span style="color: #3B3B39;font-family: chela one;font-size: 30px"><b>RON Renters & Tailors</b></span></b></a>
                        <img src="images/29.PNG" alt="AdminLTE Logo" class="img-circle" style="height: 155px;width: 155px">
                    </div>
                    <p class="login-box-msg" style="color: #4C4E4E "><b>Enter Your Login Details</b></p>

                    <form action="../../index3.html" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" id="username" autofocus="">
                            <div class="input-group-append" style="background-color: black">
                                <div class="input-group-text">
                                    <span class="fas fa-users" style="color : white"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" id="password">
                            <div class="input-group-append">
                                <div class="input-group-text" style="background-color: black">
                                    <span class="fas fa-lock" style="color : white"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-12">
                                <button type="button" class="btn btn-success btn-block" id="login">Login</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->
        <?php require_once './others/sub_pages/all_js.php'; ?>
    </body>
    <script type="text/javascript" src="./controllers/login_controller.js"></script>
</html>


