<!-- HEADER -->
<header>
    <!-- header -->
    <div id="header">
        <div class="container">
            <div class="pull-left">
                <!-- Logo -->
                <div class="header-logo">
                    <a class="logo" href="<?= site_url('home') ?>" title="onlinesylhet.com">
                        <img src="images/online-sylhet-logo.jpg" alt="onlinesylhet.com" />
                    </a>
                </div>
                <!-- /Logo -->
                <!-- Search -->
                <div class="header-search">
                    <form action="<?= site_url('products/search') ?>" method="post">
                        <input name="search_key" class="input search-input" type="text" placeholder="Enter your keyword">
                        <select name="category_id" class="input search-categories">
                            <option value="0">All Categories</option>
                            <?php foreach ($parentCategories as $category): ?>
                                <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /Search -->
            </div>
            <div class="pull-right">
                <ul class="header-btns">
                    <!-- Account -->
                    <li class="header-account dropdown default-dropdown">
                        <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-user-o"></i>
                            </div>
                            <strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
                        </div>
                        <a href="#" class="text-uppercase">Login</a> / <a href="#" class="text-uppercase">Join</a>
                        <ul class="custom-menu">
                            <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
                            <li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
                            <li><a href="<?= site_url('carts/checkout') ?>" title="Checkout"><i class="fa fa-check"></i> Checkout</a></li>
                            <li><a href="#"><i class="fa fa-unlock-alt"></i> Login</a></li>
                            <li><a href="#"><i class="fa fa-user-plus"></i> Create An Account</a></li>
                        </ul>
                    </li>
                    <!-- /Account -->

                    <!-- Cart -->
                    <?php
                    $carts_info = Common::getCartsData();
                    ?>
                    <li class="header-cart dropdown default-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <?php if ($carts_info['cart_quantity'] > 0): ?>
                                    <span class="qty" id="cart-quantity"><?= $carts_info['cart_quantity'] ?></span>
                                <?php else: ?>
                                    <span id="cart-quantity"></span>
                                <?php endif; ?>
                            </div>
                            <strong class="text-uppercase">My Cart</strong>
                            <br>
                            <?php if ($carts_info['cart_total_amount'] > 0): ?>
                                <span id="cart-amount" rel="<?= $carts_info['cart_total_amount'] ?>">&#2547; <?= $carts_info['cart_total_amount'] ?></span>
                            <?php else: ?>
                                <span id="cart-amount" rel="0"></span>
                            <?php endif; ?>
                        </a>
                        <div class="custom-menu">
                            <div id="shopping-cart">
                                <div class="shopping-cart-list">
                                    <?php
                                    if (is_array($carts_info['rows']) && count($carts_info['rows']) > 0) :
                                        foreach ($carts_info['rows'] as $cart) :
                                            ?>
                                            <div class="product product-widget product-details-<?= $cart['product_id'] ?>">
                                                <div class="product-thumb">
                                                    <img src="uploads/products/thumb<?= $cart['product_image'] ?>" alt="<?= $cart['product_name'] ?>" />
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-price">&#2547; <?= $cart['product_price'] ?> <span class="qty"> X <?= $cart['quantity'] ?></span></h3>
                                                    <h2 class="product-name"><a href="<?= site_url('products/details/' . $cart['product_id'] . '/' . Common::encodeMyURL($cart['product_name'])) ?>"><?= $cart['product_name'] ?></a></h2>
                                                </div>
                                                <button class="cancel-btn remove-from-cart" value="<?= $cart['product_id'] ?>" title="<?= $cart['product_name'] ?>"><i class="fa fa-trash"></i></button>
                                            </div>
                                            <?php
                                        endforeach;
                                    else :
                                        echo 'Sorry! Your cart is empty.';
                                    endif;
                                    ?>
                                </div>
                                <div class="shopping-cart-btns">
                                    <a href="<?= site_url('carts') ?>" class="main-btn">View Cart</a>
                                    <a href="<?= site_url('carts/checkout') ?>" class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- /Cart -->
                    <!-- Mobile nav toggle-->
                    <li class="nav-toggle">
                        <button type="" class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                    </li>
                    <!-- / Mobile nav toggle -->
                </ul>
            </div>
        </div>
        <!-- header -->
    </div>
    <!-- container -->
</header>
<!-- /HEADER -->