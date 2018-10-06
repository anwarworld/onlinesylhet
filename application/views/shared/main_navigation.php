<!-- NAVIGATION -->
<div id="navigation">
    <!-- container -->
    <div class="container">
        <div id="responsive-nav">
            <!-- category nav -->
            <div class="category-nav <?= $dir != 'home' ? 'show-on-click' : '' ?>">
                <span class="category-header">Categories <i class="fa fa-list"></i></span>
                <ul class="category-list">
                    <?php
                    foreach ($parentCategories as $category):
                        if (empty($category['childCategories'])):
                            ?>
                            <li><a href="<?= site_url('products/category/' . $category['category_id'] . '/' . Common::encodeMyURL($category['category_name'])) ?>"><?= $category['category_name'] ?></a></li>
                        <?php else:
                            ?> 
                            <li class="dropdown side-dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><?= $category['category_name'] ?> <i class="fa fa-angle-right"></i></a>
                                <div class="custom-menu">
                                    <ul class="list-links">
                                        <li><h3 class="list-links-title">Categories</h3></li>
                                        <?php
                                        foreach ($category['childCategories'] as $childCategory):
                                            ?>
                                            <li><a href="<?= site_url('products/category/' . $childCategory['category_id'] . '/' . Common::encodeMyURL($childCategory['category_name'])) ?>"><?= $childCategory['category_name'] ?></a></li>
                                            <?php
                                        endforeach;
                                        ?>
                                    </ul>
                                    <hr class="hidden-md hidden-lg">
                                </div>
                            </li>
                        <?php
                        endif;
                    endforeach;
                    ?>
                    <li><a href="<?= site_url('categories') ?>">View All</a></li>
                </ul>
            </div>
            <!-- /category nav -->
            <!-- menu nav -->
            <div class="menu-nav">
                <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                <ul class="menu-list">
                    <li><a href="<?= site_url('home') ?>">Home</a></li>
                    <li><a href="<?= site_url('products') ?>">Products</a></li>
                    <li><a href="<?= site_url('products/sales') ?>">Sales</a></li>
                    <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Services <i class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            <?php
                            $allPages = Common::getPages();
                            foreach ($allPages as $vPage):
                                ?>
                                <li><a href="<?= site_url('pages/' . $vPage['page_name']) ?>" title="<?= $vPage['page_title'] ?>"><?= $vPage['page_title'] ?></a></li>
                                <?php
                            endforeach;
                            ?>
                        </ul>
                    </li>
                    <li><a href="<?= site_url('contact') ?>">Contact Us</a></li>
                </ul>
            </div>
            <!-- menu nav -->
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /NAVIGATION -->