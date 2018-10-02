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
            foreach ($pickForYou as $row):
                ?>
                <!-- Product Single -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <!--<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>-->
                            <img src="uploads/products/thumb<?= $row['product_image'] ?>" alt="<?= $row['product_image'] ?>">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price"><?= $row['product_price'] ?></h3>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <h2 class="product-name"><a href="#"><?= $row['product_name'] ?></a></h2>
                            <div class="product-btns">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                <button class="primary-btn add-to-cart" rel="<?= $row['product_image'] ?>" value="<?= $row['product_id'] ?>" title="<?= $row['product_name'] ?>" type="<?= $row['product_price'] ?>" ><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                <!--<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>-->
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