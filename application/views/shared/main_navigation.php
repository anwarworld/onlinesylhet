<!-- NAVIGATION -->
<div id="navigation" class="category-fixed in-mobile">  <!--left-minimize-->
    <!-- container -->
    <div class="">
        <div id="responsive-nav">
            <div class="category-nav">  <?//= $dir != 'home' ? 'show-on-click' : '' ?>
                <ul class="category-list">
                    <?php
                    foreach ($parentCategories as $category):
                        if (empty($category['subCategories'])):
                            ?>
                            <li><a href="<?= site_url('products/category/' . $category['category_id'] . '/' . Common::encodeMyURL($category['category_name'])) ?>"><?= $category['category_name'] ?></a></li>
                        <?php else:
                            ?> 
                            <li class="dropdown side-dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><?= $category['category_name'] ?> <i class="fa fa-angle-right"></i></a>
                                <div class="custom-menu">
                                    <div class="row">
                                        <?php
                                        foreach ($category['subCategories'] as $subCategory):
                                            if (!empty($subCategory['childCategories'])):
                                                ?>
                                                <div class="col-md-4">
                                                    <ul class="list-links">
                                                        <li><h3 class="list-links-title"><?= $subCategory['category_name'] ?></h3></li>
                                                        <?php
                                                        foreach ($subCategory['childCategories'] as $childCategory):
                                                            ?>
                                                            <li><a href="<?= site_url('products/category/' . $childCategory['category_id'] . '/' . Common::encodeMyURL($childCategory['category_name'])) ?>"><?= $childCategory['category_name'] ?></a></li>
                                                            <?php
                                                        endforeach;
                                                        ?>
                                                    </ul>
                                                </div>
                                            <?php else:
                                                ?>
                                                <div class="col-md-4">
                                                    <ul class="list-links">
                                                        <li><a href="<?= site_url('products/category/' . $subCategory['category_id'] . '/' . Common::encodeMyURL($subCategory['category_name'])) ?>"><?= $subCategory['category_name'] ?></a></li>
                                                    </ul>
                                                </div>
                                            <?php
                                            endif;

                                        endforeach;
                                        ?>
                                    </div>
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
        </div>
    </div>
</div>
<!-- /NAVIGATION -->