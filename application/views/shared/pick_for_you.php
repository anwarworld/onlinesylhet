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
                <div class="col-md-2 col-sm-6 col-xs-6">
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
                                <?php
                                if ($product['product_number_rating'] > 0) :
                                    $rating = $product['product_total_rating'] / $product['product_number_rating'];
                                    for ($i = 0; $i < 5; $i++):
                                        if ($i < $rating) {
                                            echo '<i class="fa fa-star"></i>';
                                        } else {
                                            echo '<i class="fa fa-star-o empty"></i>';
                                        }
                                    endfor;
                                endif;
                                ?>
                            </div>
                            <h2 class="product-name"><a href="<?= site_url('products/details/' . $product['product_id'] . '/' . Common::encodeMyURL($product['product_name'])) ?>"><?= $product['product_name'] ?></a></h2>
                            <div class="product-btns">
<!--                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>-->
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