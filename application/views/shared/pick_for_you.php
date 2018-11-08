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
                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-xl-2">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <?php if ($product['product_discount'] > 0): ?>
                                <div class="product-label">
                                    <span class="sale">-<?= $product['product_discount'] ?>%</span>
                                </div>
                            <?php endif; ?>
                            <button class="main-btn quick-view add-to-cart" rel="<?= $product['product_image'] ?>" value="<?= $product['product_id'] ?>" title="<?= $product['product_name'] ?>" data-rprice="<?= $product['product_regular_price'] ?>" data-price="<?= $product['product_price'] ?>" ><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                            <img src="uploads/products/thumb<?= $product['product_image'] ?>" alt="<?= $product['product_image'] ?>">
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
                            <h2 class="product-name"><a href="<?= site_url('products/details/' . $product['product_id'] . '/' . Common::encodeMyURL($product['product_name'])) ?>"><?= $product['product_name'] ?></a></h2>
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