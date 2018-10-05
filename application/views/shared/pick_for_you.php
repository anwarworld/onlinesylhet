<?php
$pickForYou = Common::getPickedForYou();
?>
<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Picked For You</h2>
                </div>
            </div>
            <!-- section title -->

            <?php
            foreach ($pickForYou as $product):
                ?>
                <!-- Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <?php if ($product['product_discount'] > 0): ?>
                                <div class="product-label">
                                    <span class="sale">-<?= $product['product_discount'] ?>%</span>
                                </div>
                            <?php endif; ?>
                            <img src="uploads/products/thumb<?= $product['product_image'] ?>" alt="<?= $product['product_image'] ?>">
                        </div>
                        <div class="product-body">
                            <h4 class="product-price">&#2547; <?= $product['product_price'] ?> <?= $product['product_price_unit'] ?> 
                                <?php if ($product['product_discount'] > 0): ?>
                                    <del class="product-old-price">&#2547; <?= $product['product_regular_price'] ?></del>
                                <?php endif; ?>
                            </h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <h2 class="product-name"><a href="#"><?= $product['product_name'] ?></a></h2>
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