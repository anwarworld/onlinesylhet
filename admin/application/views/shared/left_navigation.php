<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="../uploads/images/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p> <?= $sessionUserData['user_full_name'] ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?= $dir == 'dashboard' ? 'active' : '' ?> menu-open">
            <a href="<?= site_url('dashboard') ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="<?= $dir == 'users' ? 'active' : '' ?> treeview">
            <a href="<?= site_url('users') ?>">
                <i class="fa fa-users"></i>
                <span>Users</span>
            </a>
            <ul class="treeview-menu">
                <li class="<?= $page == 'index' ? 'active' : '' ?>"><a href="<?= site_url('users') ?>"><i class="fa fa-user"></i>User List</a></li>
                <li class="<?= $page == 'user_form' ? 'active' : '' ?>"><a href="<?= site_url('users/add_user') ?>"><i class="fa fa-user-plus"></i>Add User</a></li>
            </ul>
        </li>
        <li class="<?= $dir == 'orders' ? 'active' : '' ?> treeview">
            <a href="<?= site_url('orders') ?>">
                <i class="fa fa-users"></i>
                <span>Orders</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="<?= $page == 'index' ? 'active' : '' ?>"><a href="<?= site_url('orders') ?>"><i class="fa fa-user"></i>Orders List</a></li>
                <li class="<?= $page == 'invoice' ? 'active' : '' ?>"><a href="<?= site_url('orders/invoice') ?>"><i class="fa fa-user-plus"></i>Invoice</a></li>
            </ul>
        </li>
        <li class="<?= $dir == 'companies' ? 'active' : '' ?>">
            <a href="<?= site_url('companies') ?>">
                <i class="fa fa-th"></i> <span>Companies</span>
            </a>
        </li>
        <li class="<?= $dir == 'sellers' ? 'active' : '' ?>">
            <a href="<?= site_url('sellers') ?>">
                <i class="fa fa-th"></i> <span>Sellers</span>
                <span class="pull-right-container">
                    <small class="label pull-right bg-green">new</small>
                </span>
            </a>
        </li>
        <li class="<?= $dir == 'products' ? 'active' : '' ?>">
            <a href="<?= site_url('products') ?>">
                <i class="fa fa-plus-square"></i> <span>Products</span>
            </a>
        </li>
        <li class="treeview <?= $dir == 'categories' ? 'active' : $dir == 'brands' ? 'active' : $dir == 'units' ? 'active' : ''  ?>">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Configuration</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="<?= $dir == 'brands' ? 'active' : '' ?>"><a href="<?= site_url('brands') ?>"><i class="fa fa-circle-o"></i>Brands</a></li>
                <li class="<?= $dir == 'units' ? 'active' : '' ?>"><a href="<?= site_url('units') ?>"><i class="fa fa-circle-o"></i>Units</a></li>
                <li class="<?= $dir == 'categories' ? 'active' : '' ?>"><a href="<?= site_url('categories') ?>"><i class="fa fa-circle-o"></i>Category</a></li>
            </ul>
        </li>
        <li class="treeview <?= $dir == 'sliders' ? 'active' : $dir == 'pages' ? 'active' : '' ?>">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Web Configuration</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="<?= $page == 'setting_form' ? 'active' : '' ?>"><a href="<?= site_url('pages/settings') ?>"><i class="fa fa-circle-o"></i>Web Settings</a></li>
                <li class="<?= $dir == 'sliders' ? 'active' : '' ?>"><a href="<?= site_url('sliders') ?>"><i class="fa fa-circle-o"></i>Home Sliders</a></li>
                <li class="<?= $dir == 'pages' ? 'active' : '' ?>"><a href="<?= site_url('pages') ?>"><i class="fa fa-circle-o"></i>Web Pages</a></li>
            </ul>
        </li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
    </ul>
</section>
<!-- /.sidebar -->