<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once 'shared/html_header.php'; ?>
        <?php
        $parentCategories = Common::getCategories();
        ?>
    </head>
    <body>
        <?php include_once 'shared/header.php'; ?>
        <?php include_once 'shared/main_navigation.php'; ?>
        <?php
        if (isset($breadcrumb)) :
            ?>
            <div id="breadcrumb">
                <div class="container">
                    <ul class="breadcrumb">
                        <?php
                        foreach ($breadcrumb as $bnav):
                            if ($bnav['url'] != '') {
                                echo '<li><a href="' . $bnav['url'] . '">' . $bnav['title'] . '</a></li>';
                            } else {
                                echo '<li class="active">' . $bnav['title'] . '</li>';
                            }
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
            <?php
        endif;
        ?>
        <?php include_once $dir . '/' . $page . '.php'; ?>
        <?php include_once 'shared/pick_for_you.php'; ?>
        <?php
        include_once 'shared/footer.php';
        Common::track_uri();
        ?>
        <!-- jQuery Plugins -->
        <script src="tools/js/jquery-3.3.1.min.js"></script>
        <script src="tools/js/bootstrap.min.js"></script>
        <script src="tools/js/slick.min.js"></script>
        <script src="tools/js/nouislider.min.js"></script>
        <script src="tools/js/jquery.zoom.min.js"></script>
        <script src="tools/js/main.js"></script>
        <script type="text/javascript">
            var $j = jQuery.noConflict();
            var base_url = "<?= site_url() ?>";
        </script>
        <script src="tools/js/script.js"></script>
    </body>

</html>
