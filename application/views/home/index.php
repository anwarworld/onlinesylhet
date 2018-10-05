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
            <!-- banner -->
            <div class="col-md-4 col-sm-6">
                <a class="banner banner-1" href="#">
                    <img src="./img/banner10.jpg" alt="">
                    <div class="banner-caption text-center">
                        <h2 class="white-color">NEW COLLECTION</h2>
                    </div>
                </a>
            </div>
            <!-- /banner -->

            <!-- banner -->
            <div class="col-md-4 col-sm-6">
                <a class="banner banner-1" href="#">
                    <img src="./img/banner11.jpg" alt="">
                    <div class="banner-caption text-center">
                        <h2 class="white-color">NEW COLLECTION</h2>
                    </div>
                </a>
            </div>
            <!-- /banner -->

            <!-- banner -->
            <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
                <a class="banner banner-1" href="#">
                    <img src="./img/banner12.jpg" alt="">
                    <div class="banner-caption text-center">
                        <h2 class="white-color">NEW COLLECTION</h2>
                    </div>
                </a>
            </div>
            <!-- /banner -->

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

            <!-- banner -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="banner banner-2">
                    <img src="./img/banner14.jpg" alt="">
                    <div class="banner-caption">
                        <h2 class="white-color">NEW<br>COLLECTION</h2>
                        <button class="primary-btn">Shop Now</button>
                    </div>
                </div>
            </div>
            <!-- /banner -->
            <!-- Product Slick -->
            <div class="col-md-9 col-sm-6 col-xs-6">
                <div class="row">
                    <?php foreach ($featured_producs as $product):
                        ?>
                        <!-- Product Single -->
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <?php if ($product['product_discount'] > 0): ?>
                                        <div class="product-label">
                                            <span class="sale">-<?= $product['product_discount'] ?>%</span>
                                        </div>
                                    <?php endif; ?>
                                    <img src="uploads/products/<?= $product['product_image'] ?>" alt="<?= $product['product_name'] ?>">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">&#2547; <?= $product['product_price'] . ' ' . $product['product_price_unit'] ?>
                                        <?php if ($product['product_discount'] > 0): ?>
                                            <del class="product-old-price">&#2547; <?= $product['product_regular_price'] ?></del>
                                        <?php endif; ?>
                                    </h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                    </div>
                                    <h2 class="product-name"><a href="<?= site_url('products/details/' . $product['product_id'] . '/' . Common::encodeMyURL($product['product_name'])) ?>"><?= $product['product_name'] ?></a></h2>
                                    <div class="product-btns">
                                        <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                        <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                        <button class="primary-btn add-to-cart" rel="<?= $product['product_image'] ?>" value="<?= $product['product_id'] ?>" title="<?= $product['product_name'] ?>" data-rprice="<?= $product['product_regular_price'] ?>" data-price="<?= $product['product_price'] ?>" ><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                    </div>
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
                        <img src="uploads/products/<?= $product['product_image'] ?>" alt="<?= $product['product_name'] ?>">
                    </div>
                    <div class="product-body">
                        <h3 class="product-price">&#2547; <?= $product['product_price'] . ' ' . $product['product_price_unit'] ?>
                            <?php if ($product['product_discount'] > 0): ?>
                                <del class="product-old-price">&#2547; <?= $product['product_regular_price'] ?></del>
                            <?php endif; ?>
                        </h3>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o empty"></i>
                        </div>
                        <h2 class="product-name"><a href="<?= site_url('products/details/' . $product['product_id'] . '/' . Common::encodeMyURL($product['product_name'])) ?>"><?= $product['product_name'] ?></a></h2>
                        <div class="product-btns">
                            <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                            <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                            <button class="primary-btn add-to-cart" rel="<?= $product['product_image'] ?>" value="<?= $product['product_id'] ?>" title="<?= $product['product_name'] ?>" data-rprice="<?= $product['product_regular_price'] ?>" data-price="<?= $product['product_price'] ?>" ><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                        </div>
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
                                    <img src="uploads/products/<?= $product['product_image'] ?>" alt="<?= $product['product_name'] ?>">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">&#2547; <?= $product['product_price'] . ' ' . $product['product_price_unit'] ?>
                                        <?php if ($product['product_discount'] > 0): ?>
                                            <del class="product-old-price">&#2547; <?= $product['product_regular_price'] ?></del>
                                        <?php endif; ?>
                                    </h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                    </div>
                                    <h2 class="product-name"><a href="<?= site_url('products/details/' . $product['product_id'] . '/' . Common::encodeMyURL($product['product_name'])) ?>"><?= $product['product_name'] ?></a></h2>
                                    <div class="product-btns">
                                        <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                        <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                        <button class="primary-btn add-to-cart" rel="<?= $product['product_image'] ?>" value="<?= $product['product_id'] ?>" title="<?= $product['product_name'] ?>" data-rprice="<?= $product['product_regular_price'] ?>" data-price="<?= $product['product_price'] ?>" ><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                    </div>
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
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <!--<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>-->
                            <img src="uploads/products/<?= $product['product_image'] ?>" alt="<?= $product['product_name'] ?>">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">&#2547; <?= $product['product_price'] ?> <?= $product['product_price_unit'] ?>
                                <?php if ($product['product_discount'] > 0): ?>
                                    <del class="product-old-price">&#2547; <?= $product['product_regular_price'] ?></del>
                                <?php endif; ?>
                            </h3>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <h2 class="product-name"><a href="<?= site_url('products/details/' . $product['product_id'] . '/' . Common::encodeMyURL($product['product_name'])) ?>"><?= $product['product_name'] ?></a></h2>
                            <div class="product-btns">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                <button class="primary-btn add-to-cart" rel="<?= $product['product_image'] ?>" value="<?= $product['product_id'] ?>" title="<?= $product['product_name'] ?>" data-rprice="<?= $product['product_regular_price'] ?>" data-price="<?= $product['product_price'] ?>" ><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                            </div>
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