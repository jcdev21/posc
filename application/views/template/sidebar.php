<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-info"></i>
        </div>
        <div class="sidebar-brand-text mx-3">POS <sup>C</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url("dashboard"); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        MENUS
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <?php if ($this->session->userdata('user_level') === 'admin') { ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("user"); ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Users</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("category"); ?>">
                <i class="fas fa-fw fa-book"></i>
                <span>Category</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("product"); ?>">
                <i class="fas fa-fw fa-server"></i>
                <span>Product</span></a>
        </li>
    <?php } ?>
    <?php if ($this->session->userdata('user_level') === 'kasir') { ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url("transaction"); ?>">
                <i class="fas fa-fw fa-shopping-basket"></i>
                <span>Transaction</span></a>
        </li>
    <?php } ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url("transaction/data"); ?>">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Data Transaction</span></a>
    </li>
    <?php if ($this->session->userdata('user_level') === 'admin') { ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-file"></i>
                <span>Reports</span>
            </a>
            <div id="collapseReports" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Report::</h6>
                    <a class="collapse-item" href="<?= base_url("report/transaction"); ?>">Report Transaction</a>
                    <a class="collapse-item" href="<?= base_url("report/product"); ?>">Report Product</a>
                </div>
            </div>
        </li>
    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
