<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!--  Product Details -->
            <div class="product product-details clearfix">
                <div class="col-md-6">
                    <div id="product-main-view">
                        <div class="product-view">
                            <img src="uploads/products/<?= $product_image ?>" alt="<?= $product_name ?>">
                        </div>
                        <!--                        <div class="product-view">
                                                    <img src="./img/main-product02.jpg" alt="">
                                                </div>
                                                <div class="product-view">
                                                    <img src="./img/main-product03.jpg" alt="">
                                                </div>
                                                <div class="product-view">
                                                    <img src="./img/main-product04.jpg" alt="">
                                                </div>-->
                    </div>
                    <div id="product-view">
                        <div class="product-view">
                            <img src="uploads/products/thumb<?= $product_image ?>" alt="<?= $product_name ?>">
                        </div>
                        <!--                        <div class="product-view">
                                                    <img src="./img/thumb-product02.jpg" alt="">
                                                </div>
                                                <div class="product-view">
                                                    <img src="./img/thumb-product03.jpg" alt="">
                                                </div>
                                                <div class="product-view">
                                                    <img src="./img/thumb-product04.jpg" alt="">
                                                </div>-->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-body">
                        <?php if ($product_discount > 0): ?>
                            <div class="product-label">
                                <span class="sale">-<?= $product_discount ?>%</span>
                            </div>
                        <?php endif; ?>
                        <h2 class="product-name"><?= $product_name ?></h2>
                        <h3 class="product-price">&#2547;<?= $product_price ?> <?= $product_price_unit ?> 
                            <?php if ($product_discount > 0): ?>
                                <del class="product-old-price">&#2547; <?= $product_regular_price ?></del>
                            <?php endif; ?>
                        </h3>
                        <div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                            </div>
                            <a href="#">3 Review(s) / Add Review</a>
                        </div>
                        <p><strong>Availability:</strong> In Stock</p>
                        <p><strong>Brand:</strong> <?= $brand_name ?></p>
                        <p><?= $product_details ?></p>
                        <div class="product-btns">
                            <div class="qty-input">
                                <span class="text-uppercase">QTY: </span>
                                <?php if($carts_info['rows'][$product_id])?>
                                <input class="input quantity-value-change" rel="<?= $quantity ?>" title="<?= $product_id ?>"type="number" value="<?= $quantity ?>" />
                            </div>
                            <button class="primary-btn add-to-cart" rel="<?= $product_image ?>" value="<?= $product_id ?>" title="<?= $product_name ?>" type="<?= $product_price ?>" ><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                            <div class="pull-right">
                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="product-tab">
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                            <li><a data-toggle="tab" href="#tab2">Reviews (3)</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab1" class="tab-pane fade in active">
                                <p><?= $product_details ?></p>
                            </div>
                            <div id="tab2" class="tab-pane fade in">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="product-reviews">
                                            <?php
                                            foreach ($product_reviews as $review):
                                                ?>
                                                <div class="single-review">
                                                    <div class="review-heading">
                                                        <div><i class="fa fa-user-o"></i> <?= $review['review_name'] ?></div>
                                                        <div><i class="fa fa-clock-o"></i> <?= $review['review_date'] ?></div>
                                                        <div class="review-rating pull-right">
                                                            <?php
                                                            for ($inc = 0; $inc < $review['review_rating']; $inc++):
                                                                echo '<i class="fa fa-star"></i>';
                                                            endfor;
                                                            for ($inc = 0; $inc < 5 - $review['review_rating']; $inc++):
                                                                echo ' <i class="fa fa-star-o empty"></i>';
                                                            endfor;
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="review-body">
                                                        <p><?= $review['review_details'] ?></p>
                                                    </div>
                                                </div>
                                                <?php
                                            endforeach;
                                            ?>
                                            <!--                                            <ul class="reviews-pages">
                                                                                            <li class="active">1</li>
                                                                                            <li><a href="#">2</a></li>
                                                                                            <li><a href="#">3</a></li>
                                                                                            <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                                                                        </ul>-->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="text-uppercase">Write Your Review</h4>
                                        <p>Your email address will not be published.</p>
                                        <form id="review-form-submit"  class="review-form">
                                            <div class="alert alert-success alert-dismissible">
                                            </div>
                                            <div class="form-group">
                                                <input class="input" type="hidden" name="product_id" value="<?= $product_id ?>"/>
                                                <input class="input" type="text" name="review_name" placeholder="Your Name" />
                                            </div>
                                            <div class="form-group">
                                                <input class="input" type="email" name="review_email" placeholder="Email Address" />
                                            </div>
                                            <div class="form-group">
                                                <textarea class="input" name="review_details" placeholder="Your review"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-rating">
                                                    <strong class="text-uppercase">Your Rating: </strong>
                                                    <div class="stars">
                                                        <input type="radio" id="star5" name="review_rating" value="5" /><label for="star5"></label>
                                                        <input type="radio" id="star4" name="review_rating" value="4" /><label for="star4"></label>
                                                        <input type="radio" id="star3" name="review_rating" value="3" /><label for="star3"></label>
                                                        <input type="radio" id="star2" name="review_rating" value="2" /><label for="star2"></label>
                                                        <input type="radio" id="star1" name="review_rating" value="1" /><label for="star1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="primary-btn">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Product Details -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->