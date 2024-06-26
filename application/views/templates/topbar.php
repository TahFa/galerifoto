<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form> -->

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('user/beranda'); ?>">
                    <i class="fas fa-fw fa-bars"></i>
                    <span>Beranda</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('user/album'); ?>">
                    <i class="fas fa-fw fa-border-all"></i>
                    <span>Album</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('user/foto'); ?>">
                    <i class="fas fa-fw fa-images"></i>
                    <span>Foto</span></a>
            </li>
        </ul>
        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <?php if (isset($_SESSION['username'])) : ?>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama_lengkap']; ?></span>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
            <?php else : ?>
                <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><i class="fas fa-user-alt text-dark" style="font-size: 22px"></i></span>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url('auth'); ?>">
                        <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Login
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('auth/registration'); ?>">
                        <i class="fas fa-user-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                        Register
                    </a>
                </div>
            </li>
            <?php endif; ?>
        </ul>

    </nav>
    <!-- End of Topbar -->