<!-- HOME -->
<div id="home">
    <!-- container -->
    <div class="container">
        <!-- home wrap -->
        <div class="home-wrap">
            <!-- home slick -->
            <div id="home-slick">
                <!-- banner -->
                <?php foreach ($sliders as $slider): ?>
                    <div class="banner banner-1">
                        <img src="uploads/sliders/<?= $slider['slider_image'] ?>" alt="<?= $slider['slider_title'] ?>">
                        <div class="banner-caption text-center">
                            <h1 class="primary-color"><?= $slider['slider_title'] ?></h1>
                            <h3 class="white-color font-weak"><?= $slider['slider_slogan'] ?></h3>
                            <?php if ($slider['slider_url'] != ''): ?>
                                <a href="<?= $slider['slider_url'] ?>" class="primary-btn">Shop Now</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- /banner -->
            </div>
            <!-- /home slick -->
        </div>
        <!-- /home wrap -->
    </div>
    <!-- /container -->
</div>
<!-- /HOME -->
<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section-title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Featured Products</h2>
                    <div class="pull-right">
                        <div class="product-slick-dots-1 custom-dots"></div>
                    </div>
                </div>
            </div>
            <!-- /section-title -->
            <!-- Product Slick -->
            <div class="col-md-12 col-sm-6 col-xs-6">
                <div class="row">
                    <?php foreach ($featured_producs as $product):
                        ?>
                        <!-- Product Single -->
                        <div class="col-md-2 col-sm-4 col-xs-4">
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <?php if ($product['product_discount'] > 0): ?>
                                        <div class="product-label">
                                            <span class="sale">-<?= $product['product_discount'] ?>%</span>
                                        </div>
                                    <?php endif; ?>
                                    <button class="main-btn quick-view add-to-cart" rel="<?= $product['product_image'] ?>" value="<?= $product['product_id'] ?>" title="<?= $product['product_name'] ?>" data-rprice="<?= $product['product_regular_price'] ?>" data-price="<?= $product['product_price'] ?>" ><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                    <img src="uploads/products/thumb<?= $product['product_image'] ?>" alt="<?= $product['product_name'] ?>">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">&#2547; <?= $product['product_price'] ?>
                                        <?php if ($product['product_discount'] > 0): ?>
                                            <del class="product-old-price">&#2547; <?= $product['product_regular_price'] ?></del>
                                        <?php endif; ?>
                                    </h3>
                                    <span><?= $product['product_price_unit'] ?></span>
                                    <?php
                                    if ($product['product_number_rating'] > 0) :
                                        ?>
                                        <div class="product-rating">
                                            <?php
                                            $rating = $product['product_total_rating'] / $product['product_number_rating'];
                                            for ($i = 0; $i < 5; $i++):
                                                if ($i < $rating) {
                                                    echo '<i class="fa fa-star"></i>';
                                                } else {
                                                    echo '<i class="fa fa-star-o empty"></i>';
                                                }
                                            endfor;
                                            ?>
                                        </div>
                                        <?php
                                    endif;
                                    ?>
                                    <h2 class="product-name"><a href="<?= site_url('products/details/' . $product['product_id'] . '/' . Common::encodeMyURL($product['product_name'])) ?>"><?= $product['product_name'] ?></a></h2>
                                </div>
                            </div>
                        </div>
                        <!-- /Product Single -->
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <!-- /Product Slick -->
        </div>
        <!-- /row -->
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Deals Of The Day</h2>
                    <div class="pull-right">
                        <div class="product-slick-dots-2 custom-dots">
                        </div>
                    </div>
                </div>
            </div>
            <!-- section title -->
            <!-- Product Single -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="product product-single product-hot">
                    <?php
                    $product = $deal_producs[0];
                    unset($deal_producs[0]);
                    ?>
                    <div class="product-thumb">
                        <?php if ($product['product_discount'] > 0): ?>
                            <div class="product-label">
                                <span class="sale">-<?= $product['product_discount'] ?>%</span>
                            </div>
                        <?php endif; ?>
                        <button class="main-btn quick-view add-to-cart" rel="<?= $product['product_image'] ?>" value="<?= $product['product_id'] ?>" title="<?= $product['product_name'] ?>" data-rprice="<?= $product['product_regular_price'] ?>" data-price="<?= $product['product_price'] ?>" ><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                        <img src="uploads/products/thumb<?= $product['product_image'] ?>" alt="<?= $product['product_name'] ?>">
                    </div>
                    <div class="product-body">
                        <h3 class="product-price">&#2547; <?= $product['product_price'] ?>
                            <?php if ($product['product_discount'] > 0): ?>
                                <del class="product-old-price">&#2547; <?= $product['product_regular_price'] ?></del>
                            <?php endif; ?>
                        </h3>
                        <span><?= $product['product_price_unit'] ?></span>
                        <?php
                        if ($product['product_number_rating'] > 0) :
                            ?>
                            <div class="product-rating">
                                <?php
                                $rating = $product['product_total_rating'] / $product['product_number_rating'];
                                for ($i = 0; $i < 5; $i++):
                                    if ($i < $rating) {
                                        echo '<i class="fa fa-star"></i>';
                                    } else {
                                        echo '<i class="fa fa-star-o empty"></i>';
                                    }
                                endfor;
                                ?>
                            </div>
                            <?php
                        endif;
                        ?>
                        <h2 class="product-name"><a href="<?= site_url('products/details/' . $product['product_id'] . '/' . Common::encodeMyURL($product['product_name'])) ?>"><?= $product['product_name'] ?></a></h2>
                    </div>
                </div>
            </div>
            <!-- /Product Single -->

            <!-- Product Slick -->
            <div class="col-md-9 col-sm-6 col-xs-6">
                <div class="row">
                        <div id="product-slick-2" class="product-slick">
                            <?php foreach ($deal_producs as $product):
                                ?>
                                <!-- Product Single -->
                                <div class="product product-single">
                                    <div class="product-thumb">
                                        <?php if ($product['product_discount'] > 0): ?>
                                            <div class="product-label">
                                                <span class="sale">-<?= $product['product_discount'] ?>%</span>
                                            </div>
                                        <?php endif; ?>
                                        <button class="main-btn quick-view add-to-cart" rel="<?= $product['product_image'] ?>" value="<?= $product['product_id'] ?>" title="<?= $product['product_name'] ?>" data-rprice="<?= $product['product_regular_price'] ?>" data-price="<?= $product['product_price'] ?>" ><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                        <img src="uploads/products/thumb<?= $product['product_image'] ?>" alt="<?= $product['product_name'] ?>">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-price">&#2547; <?= $product['product_price'] ?>
                                            <?php if ($product['product_discount'] > 0): ?>
                                                <del class="product-old-price">&#2547; <?= $product['product_regular_price'] ?></del>
                                            <?php endif; ?>
                                        </h3>
                                        <span><?= $product['product_price_unit'] ?></span>
                                        <?php
                                        if ($product['product_number_rating'] > 0) :
                                            ?>
                                            <div class="product-rating">
                                                <?php
                                                $rating = $product['product_total_rating'] / $product['product_number_rating'];
                                                for ($i = 0; $i < 5; $i++):
                                                    if ($i < $rating) {
                                                        echo '<i class="fa fa-star"></i>';
                                                    } else {
                                                        echo '<i class="fa fa-star-o empty"></i>';
                                                    }
                                                endfor;
                                                ?>
                                            </div>
                                            <?php
                                        endif;
                                        ?>
                                        <h2 class="product-name"><a href="<?= site_url('products/details/' . $product['product_id'] . '/' . Common::encodeMyURL($product['product_name'])) ?>"><?= $product['product_name'] ?></a></h2>
                                    </div>
                                </div>
                            <!-- /Product Single -->
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
            <!-- /Product Slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Latest Products</h2>
                </div>
            </div>
            <!-- section title -->
            <?php foreach ($latest_producs as $product):
                ?>
                <!-- Product Single -->
                <div class="col-md-2 col-sm-4 col-xs-4">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <?php if ($product['product_discount'] > 0): ?>
                                <div class="product-label">
                                    <span class="sale">-<?= $product['product_discount'] ?>%</span>
                                </div>
                            <?php endif; ?>
                            <button class="main-btn quick-view add-to-cart" rel="<?= $product['product_image'] ?>" value="<?= $product['product_id'] ?>" title="<?= $product['product_name'] ?>" data-rprice="<?= $product['product_regular_price'] ?>" data-price="<?= $product['product_price'] ?>" ><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                            <img src="uploads/products/thumb<?= $product['product_image'] ?>" alt="<?= $product['product_name'] ?>">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">&#2547; <?= $product['product_price'] ?>
                                <?php if ($product['product_discount'] > 0): ?>
                                    <del class="product-old-price">&#2547; <?= $product['product_regular_price'] ?></del>
                                <?php endif; ?>
                            </h3>
                            <span> <?= $product['product_price_unit'] ?></span>
                            <?php
                            if ($product['product_number_rating'] > 0) :
                                ?>
                                <div class="product-rating">
                                    <?php
                                    $rating = $product['product_total_rating'] / $product['product_number_rating'];
                                    for ($i = 0; $i < 5; $i++):
                                        if ($i < $rating) {
                                            echo '<i class="fa fa-star"></i>';
                                        } else {
                                            echo '<i class="fa fa-star-o empty"></i>';
                                        }
                                    endfor;
                                    ?>
                                </div>
                                <?php
                            endif;
                            ?>
                            <h2 class="product-name">
                                <a href="<?= site_url('products/details/' . $product['product_id'] . '/' . Common::encodeMyURL($product['product_name'])) ?>" title="<?= $product['product_name'] ?>"><?= $product['product_name'] ?></a>
                            </h2>
                        </div>
                    </div>
                </div>
                <!-- /Product Single -->
                <?php
            endforeach;
            ?>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->