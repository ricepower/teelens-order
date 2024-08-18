<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <!-- <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" /> -->
                <h4 style="color: white; margin-bottom: 0px;">TEE LENS Order</h4>
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Customer</h4>
                </li>
                <li class="nav-item">
                    <a href="../../documentation/index.html">
                        <i class="fas fa-file-alt"></i>
                        <p>My Order List</p>
                    </a>
                </li>
                <?php
                echo $_SESSION["auth"] === "0" ?
                    '
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Administrator</h4>
                    </li>
                    <li class="nav-item">
                        <a href="../../documentation/index.html">
                            <i class="fas fa-file-alt"></i>
                            <p>Order List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin-user-manage.php">
                            <i class="fas fa-user-edit"></i>
                            <p>User Manage</p>
                        </a>
                    </li>
                    '
                    : null;
                ?>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->