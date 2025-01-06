<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="images/29.PNG" alt="AdminLTE Logo" class="img-circle" style="height: 55px;width: 55px">
        <span class="brand-text font-weight-light">RON Renters&Tailors</span>
    </a><br>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <!--            <div class="image">
                            <img src="images/ron.PNG" class="img-circle elevation-2" alt="User Image">
                        </div>-->
            <div class="info">
                <a href="./?x=profile" class="d-block">Welcome<br> <?php echo $_SESSION['name']; ?></a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php
                $user = $_SESSION['user_id'];
                $query = "SELECT
                          added_system_privilage.prv_added_id
                          FROM
                          added_system_privilage
                          INNER JOIN system_privilages ON added_system_privilage.prv_added_id = system_privilages.prv_id
                          WHERE
                          added_system_privilage.prv_user_id = '{$user}' AND
                          system_privilages.prv_status = 1 AND
                          system_privilages.prv_type != 800";
                $prv_count = $app->row_count_quary($query);
                if ($prv_count > 0) {
                    $query2 = "SELECT
                               system_privilages.prv_name,
                               system_privilages.prv_id
                               FROM
                               added_system_privilage
                               INNER JOIN system_privilages ON added_system_privilage.prv_main_id = system_privilages.prv_id
                               WHERE
                               added_system_privilage.prv_user_id='{$user}' AND
                          system_privilages.prv_type != 800
                               GROUP BY
                               system_privilages.prv_id";
                    $prv_main = $app->basic_Select_Query($query2);
                    foreach ($prv_main AS $x) {
                        echo ' <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>' . $x['prv_name'] . '<i class="right fas fa-angle-left"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">';
                        $query3 = "SELECT
                               system_privilages.prv_name,
                               system_privilages.prv_path
                               FROM
                               added_system_privilage
                               INNER JOIN system_privilages ON added_system_privilage.prv_added_id = system_privilages.prv_id
                               WHERE
                               added_system_privilage.prv_user_id = '{$user}' AND
                               added_system_privilage.prv_main_id = '{$x['prv_id']}'
                               ORDER BY
                               system_privilages.prv_priority ASC";
                        $prv_data = $app->basic_Select_Query($query3);
                        foreach ($prv_data AS $z) {
                            echo '<li class="nav-item">
                                            <a href="' . $z['prv_path'] . '" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>' . $z['prv_name'] . '</p>
                                            </a>
                                        </li>';
                        }
                        echo '</ul>';
                    }
                    echo '</li>';
                }
                ?>

            </ul>
            <!--            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="../../index.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Dashboard v1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../../index2.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Dashboard v2</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../../index3.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Dashboard v3</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>-->
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

