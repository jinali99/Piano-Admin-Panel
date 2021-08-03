<div id="top">
    <!-- .navbar -->
    <nav class="navbar navbar-static-top">
        <div class="container-fluid">
            <a class="navbar-brand text-xs-center" href="index-2.html">
                <h4 class="text-white"> Musical App</h4>
            </a>
            <div class="menu">
                <span class="toggle-left" id="menu-toggle">
                    <i class="fa fa-bars text-white"></i>
                </span>
            </div>

            <!-- Toggle Button -->
            <div class="text-xs-right xs_menu">
                <button class="navbar-toggler hidden-xs-up" type="button" data-toggle="collapse" data-target="#nav-content">
                </button>
            </div>
            <!-- Nav Content -->
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="topnav dropdown-menu-right float-xs-right">
                <div class="btn-group">
                    <div class="user-settings no-bg">
                        <button type="button" class="btn btn-default no-bg micheal_btn" data-toggle="dropdown">
                            <img src="../<?php echo $_SESSION["musical_academy_logo"] ?>" class="admin_img2 rounded-circle avatar-img" alt="avatar"> <strong><?php echo $_SESSION["musical_academy_name"] ?></strong>
                            <span class="fa fa-sort-down white_bg"></span>
                        </button>
                        <div class="dropdown-menu admire_admin">
                            <a class="dropdown-item" href="change-password.php"><i class="fa fa-cogs"></i>
                                Change Password</a>
                            <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i>
                                Log Out</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- /.container-fluid --> </nav>
    <!-- /.navbar -->
    <!-- /.head --> </div>