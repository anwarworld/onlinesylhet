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
        <div class="clearfix"></div>
        <?php include_once 'shared/main_navigation.php'; ?>
        <div class="middle-modification right-hide">  <!-- middle-modification left-hide right-hide -->
            
            
            <div class="header-search show-in-800">
                    <form action="<?= site_url('products/search') ?>" method="post">
                        <input name="search_key" class="input search-input" type="text" placeholder="Enter your keyword">
                        <select name="category_id" class="input search-categories">
                            <option value="0">All Categories</option>
                            <?php foreach ($parentCategories as $category): ?>
                                <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            <div class="clearfix"></div>
            
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

        </div>

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



        <script type="text/javascript">
            function left_hide() {
                $j(".category-fixed").toggleClass("left-minimize");
                $j(".middle-modification").toggleClass("left-hide");
            }
            function right_hide() {
                $j(".right-fix").toggleClass("right-minimize");
                $j(".middle-modification").toggleClass("right-hide");
            }
            function menu_show() {
                $j(".menu-list").toggleClass("show-menu");
            }
        </script>
        <script>
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && !(/channel\/[a-zA-Z0-9\-]+$/.test(location.href))) {
                $j(".category-fixed").toggleClass("left-minimize");
                $j(".middle-modification").toggleClass("left-hide");
            }
        </script>

    </body>

</html>
