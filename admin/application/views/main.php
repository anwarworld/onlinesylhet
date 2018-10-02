<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'shared/html_header.php'; ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <?php $sessionUserData = Common::getSessionUserData() ?>
        <div class="wrapper">
            <header class="main-header">
                <?php include_once 'shared/header.php'; ?>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <?php include_once 'shared/left_navigation.php'; ?>
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?= $page_title ?>
                        <small>Version 2.0</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?= site_url() ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                        <?php
                        if (isset($nav_path)) {
                            foreach ($nav_path as $nav) {
                                if ($nav['url'] != '') {
                                    echo '<li><a href="' . $nav['url'] . '">' . $nav['title'] . '</a></li>';
                                } else {
                                    echo '<li class="active">' . $nav['title'] . '</li>';
                                }
                            }
                        }
                        ?>

                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <?php include_once $dir . '/' . $page . '.php'; ?>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.4.0
                </div>
                <strong>Copyright &copy; <?= date('Y') ?> <a href="#">anwarworld@gmail.com</a>.</strong> All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <?php include_once 'shared/right_navigation.php'; ?>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <?php include_once 'shared/footer.php'; ?>
        <?php common::track_uri(); ?>
    </body>
</html>
