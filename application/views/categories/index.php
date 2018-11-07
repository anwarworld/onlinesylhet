<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <?php
        foreach ($parentCategories as $category):
            if (!empty($category['subCategories'])):
                ?>
                <div class="row">
                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title"><?= $category['category_name'] ?></h2>
                        </div>
                    </div>
                    <?php
                    foreach ($category['subCategories'] as $subCategory):
                        ?>
                        <!-- section title -->
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <img src="uploads/categories/<?= $subCategory['category_image'] ?>" alt="<?= $subCategory['category_name'] ?>">
                                </div>
                                <div class="product-body">
                                    <!--<h3 class="product-price"></h3>-->
                                    <h2 class="product-name"><a href="<?= site_url('products/category/' . $subCategory['category_id'] . '/' . Common::encodeMyURL($subCategory['category_name'])) ?>"><?= $subCategory['category_name'] ?></a></h2>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
                <?php
            endif;
        endforeach;
        ?>
    </div>
    <!-- /container -->
</div>
<!-- /section -->