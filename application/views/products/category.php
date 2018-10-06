<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <?php include_once 'side_bar.php'; ?>
            </div>
            <!-- /ASIDE -->

            <!-- MAIN -->
            <div id="main" class="col-md-9">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="pull-left">
                        <div class="row-filter">
                            <a href="#"><i class="fa fa-th-large"></i></a>
                            <a href="#" class="active"><i class="fa fa-bars"></i></a>
                        </div>
                        <div class="sort-filter">
                            <span class="text-uppercase">Sort By:</span>
                            <select class="input">
                                <option value="0">Position</option>
                                <option value="0">Price</option>
                                <option value="0">Rating</option>
                            </select>
                            <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
                        </div>
                    </div>
                    <div class="pull-right">
                        <ul class="store-pages text-uppercase">
                            <?= $pagination_links; ?>
                        </ul>
                    </div>
                </div>
                <!-- /store top filter -->

                <!-- STORE -->
                <div id="store">
                    <!-- row -->
                    <div class="row">
                        <?php
                        $inc = 1;
                        foreach ($product_list as $product) {
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
                                        <h4 class="product-price">&#2547;<?= $product['product_price'] ?> <?= $product['product_price_unit'] ?> 
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
                                            <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                            <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                            <button class="primary-btn add-to-cart" rel="<?= $product['product_image'] ?>" value="<?= $product['product_id'] ?>" title="<?= $product['product_name'] ?>" data-rprice="<?= $product['product_regular_price'] ?>" data-price="<?= $product['product_price'] ?>" ><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Product Single -->
                            <?php
                            if ($inc % 3 == 0) {
                                echo '<div class="clearfix visible-md visible-lg visible-sm visible-xs"></div>';
                            }
                            $inc++;
                        }
                        if ($inc == 1) {
                            echo 'Sorry! no products foumd. please try later.';
                        }
                        ?>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /STORE -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <div class="pull-left">
                        <div class="row-filter">
                            <a href="#"><i class="fa fa-th-large"></i></a>
                            <a href="#" class="active"><i class="fa fa-bars"></i></a>
                        </div>
                        <div class="sort-filter">
                            <span class="text-uppercase">Sort By:</span>
                            <select class="input">
                                <option value="0">Position</option>
                                <option value="0">Price</option>
                                <option value="0">Rating</option>
                            </select>
                            <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
                        </div>
                    </div>
                    <div class="pull-right">
                        <ul class="store-pages text-uppercase">
                            <?= $pagination_links; ?>
                        </ul>
                    </div>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /MAIN -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->