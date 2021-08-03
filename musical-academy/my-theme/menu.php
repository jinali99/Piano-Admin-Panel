<div id="left">
    <div class="media user-media bg-dark dker">
        <div class="user-media-toggleHover">
            <span class="fa fa-user"></span>
        </div>
        <div class="user-wrapper bg-dark">
            <a class="user-link" href="#">
                <img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="User Picture" src="../<?php echo $_SESSION["musical_academy_logo"] ?>"><p class="text-white user-info">Welcome <?php echo $_SESSION["musical_academy_name"] ?></p></a>
        </div>
    </div>
    <!-- #menu -->
    <ul id="menu" class="bg-blue dker">
        <li>
            <a href="index.php">
                <i class="fa fa-home"></i>
                <span class="link-title">&nbsp;Dashboard</span>
            </a>
        </li>
        <li>
            <a href="javascript:;">
                <i class="fa fa-pencil"></i>
                <span class="link-title">&nbsp; Forms</span>
                <span class="fa arrow"></span>
            </a>
            <ul>
                <li>
                    <a href="add-course.php">
                        <i class="fa fa-angle-right"></i>
                        &nbsp; Course
                    </a>
                </li>
                <li>
                    <a href="add-enrollment.php">
                        <i class="fa fa-angle-right"></i>
                        &nbsp; enrollment
                    </a>
                </li>
                <li>
                    <a href="add-video.php">
                        <i class="fa fa-angle-right"></i>
                        &nbsp; video
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-th"></i>
                <span class="link-title">&nbsp; View Pages</span>
                <span class="fa arrow"></span>
            </a>
            <ul>
                <li>
                    <a href="view-course.php">
                        <i class="fa fa-angle-right"></i>
                        &nbsp; course
                    </a>
                </li>
                <li>
                    <a href="view-enrollment.php">
                        <i class="fa fa-angle-right"></i>
                        &nbsp; enrollment
                    </a>
                </li>

                <li>
                    <a href="view-feedback.php">
                        <i class="fa fa-angle-right"></i>
                        &nbsp; feedback
                    </a>
                </li>
                <li>
                    <a href="view-musical-academy.php">
                        <i class="fa fa-angle-right"></i>
                        &nbsp; musical-academy
                    </a>
                </li>
                <li>
                    <a href="view-payment.php">
                        <i class="fa fa-angle-right"></i>
                        &nbsp; payment
                    </a>
                </li>
                <li>
                    <a href="view-video.php">
                        <i class="fa fa-angle-right"></i>
                        &nbsp; video
                    </a>
                </li>

            </ul>
        </li>

    </ul>
    <!-- /#menu -->
</div>