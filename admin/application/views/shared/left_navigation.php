<div class="sidebar-sticky">
    <ul class="nav flex-column">
        <li class="<?= $dir == 'dashboard' ? 'active' : '' ?> nav-item">
            <a href="<?= site_url('dashboard') ?>" class="nav-link">
                <span data-feather="home"></span> <span>Dashboard</span>
            </a>
        </li>
        <li class="<?= $dir == 'users' ? 'active' : '' ?> nav-item">
            <a href="<?= site_url('users') ?>" class="nav-link">
                <span data-feather="users"></span>
                <span>Users</span>
            </a>
        </li>
        <li class="<?= $dir == 'orders' ? 'active' : '' ?> nav-item">
            <a href="<?= site_url('orders') ?>" class="nav-link">
                <span data-feather="file"></span>
                <span>Orders</span>
            </a>
        </li>
        <li class="<?= $dir == 'companies' ? 'active' : '' ?>">
            <a href="<?= site_url('companies') ?>" class="nav-link">
                <span data-feather="file"></span> <span>Companies</span>
            </a>
        </li>
        <li class="<?= $dir == 'sellers' ? 'active' : '' ?>">
            <a href="<?= site_url('sellers') ?>" class="nav-link">
                <span data-feather="file"></span> <span>Sellers</span>
            </a>
        </li>
        <li class="<?= $dir == 'products' ? 'active' : '' ?>">
            <a href="<?= site_url('products') ?>" class="nav-link">
                <span data-feather="shopping-cart"></span> <span>Products</span>
            </a>
        </li>
    </ul>
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Configuration</span>
    </h6>
    <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link" href="<?= site_url('brands') ?>"><span data-feather="circle"></span>Brands</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('units') ?>"><span data-feather="circle"></span>Units</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('categories') ?>"><span data-feather="circle"></span>Category</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('payments') ?>"><span data-feather="circle"></span>Payments Method</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('delivery') ?>"><span data-feather="circle"></span>Delivery Method</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('delivery/man') ?>"><span data-feather="circle"></span>Delivery Man</a></li>
    </ul>
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Web Configuration</span>
        <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
        </a>
    </h6>
    <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link" href="<?= site_url('pages/settings') ?>"><span data-feather="circle"></span>Web Settings</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('sliders') ?>"><span data-feather="circle"></span>Home Sliders</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('pages') ?>"><span data-feather="circle"></span>Web Pages</a></li>
    </ul>
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Saved reports</span>
        <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
        </a>
    </h6>
    <ul class="nav flex-column mb-2">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Current month
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Last quarter
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Social engagement
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Year-end sale
            </a>
        </li>
    </ul>
</div>