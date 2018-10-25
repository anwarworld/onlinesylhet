<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'shared/html_header.php'; ?>
    </head>
    <body>
        <?php $sessionUserData = Common::getSessionUserData() ?>
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">OnlineSylhet</a>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="<?= site_url('login/logout') ?>">Sign out</a>
                </li>
            </ul>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <?php include_once 'shared/left_navigation.php'; ?>
                </nav>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <?php if (isset($nav_path)): ?>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <?php
                                    foreach ($nav_path as $nav) {
                                        if ($nav['url'] != '') {
                                            echo '<li class="breadcrumb-item"><a href="' . $nav['url'] . '">' . $nav['title'] . '</a></li>';
                                        } else {
                                            echo '<li class="breadcrumb-item active">' . $nav['title'] . '</li>';
                                        }
                                    }
                                    ?>
                            </ol>
                        </nav>
                    <?php endif; ?>
                    <?php include_once $dir . '/' . $page . '.php'; ?>
                </main>
            </div>
        </div>
        <?php include_once 'shared/footer.php'; ?>
        <?php common::track_uri(); ?>
    </body>
</html>
