<header>
    <div id="header">
        <div class="">
            <div class="pull-left" style="width: 100%;">
                <span class="category-header pull-left" onclick="left_hide();"><i class="fa fa-list"></i></span>
                <div class="header-logo pull-left">
                    <a class="logo logo-big" href="<?= site_url('home') ?>" title="onlinesylhet.com">
                        <img src="images/online-sylhet-logo.jpg" alt="onlinesylhet.com" />
                    </a>
                    <a class="logo logo-small" href="<?= site_url('home') ?>" title="onlinesylhet.com">
                        <img src="images/online-sylhet-logo-small.jpg" alt="onlinesylhet.com" />
                    </a>
                </div>
                <ul class="header-btns pull-right" style="display: inline;">
                    <?php
                    $carts_info = Common::getCartsData();
                    ?>
                    <li class="header-cart dropdown default-dropdown pull-right">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"  onclick="right_hide();">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <?php if ($carts_info['cart_quantity'] > 0): ?>
                                    <span class="qty" id="cart-quantity"><?= $carts_info['cart_quantity'] ?></span>
                                <?php else: ?>
                                    <span id="cart-quantity"></span>
                                <?php endif; ?>
                            </div>
                            <strong class="text-uppercase">Cart</strong>
                            <br>
                            <?php if ($carts_info['cart_total_amount'] > 0): ?>
                                <span id="cart-amount" rel="<?= $carts_info['cart_total_amount'] ?>">&#2547; <?= $carts_info['cart_total_amount'] ?></span>
                            <?php else: ?>
                                <span id="cart-amount" rel="0"></span>
                            <?php endif; ?>
                        </a>
                    </li>
                    <li class="header-account pull-right" style="margin-left:5px;margin-right:5px;">
                        <div class="dropdown default-dropdown">
                            <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-user-o"></i>
                                </div>
                                <strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
                            </div>
                            <?php if (Common::isLoggedIn()): ?>
                                <ul class="custom-menu">
                                    <li><a href="<?= site_url('users') ?>"><i class="fa fa-user-o"></i> My Account</a></li>
                                    <li><a href="<?= site_url('users/mywishlist') ?>"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
                                    <li><a href="<?= site_url('carts/checkout') ?>" title="Checkout"><i class="fa fa-check"></i> Checkout</a></li>
                                    <li><a href="<?= site_url('login/signout') ?>"><i class="fa fa-unlock-alt"></i> Signout</a></li>
                                </ul> 
                            <?php endif; ?>
                        </div>
                        <?php if (Common::isLoggedIn()): ?>
                            <div><a class="text-uppercase" href="<?= site_url('login/signout') ?>" title="User Signout">Signout</a></div>
                            <?php
                        else:
                            ?>
                            <div class="dropdown default-dropdown"  style="float:left;">
                                <a class="text-uppercase dropdown" data-toggle="dropdown" aria-expanded="true">Login</a>
                                <div class="custom-menu" style="width:250px">
                                    <form id="user-signin">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="mobile_email" placeholder="Please Enter Mobile/Email"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" placeholder="Please Enter Password"/>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="primary-btn">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="dropdown default-dropdown" style="float:left;">
                                &nbsp;/&nbsp;<a class="text-uppercase dropdown" data-toggle="dropdown" aria-expanded="true">Join</a>
                                <div class="custom-menu" style="width:250px">
                                    <form id="user-signup">
                                        <div class="form-group">
                                            <input type="text" name="full_name" class="form-control" placeholder="Please Enter Full Name"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="mobile" class="form-control" placeholder="Please Enter Mobile"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="Please Enter Email"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Please Enter Password"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confirm_password" class="form-control" placeholder="Please Confirm Password"/>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="primary-btn">Sign up</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <br style="clear:both" />
                        <?php endif; ?>
                    </li>

                </ul>


                <div class="header-search pull-left hide-in-800">
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
                <div class="menu-nav pull-left">
                    <span class="menu-header"  onclick="menu_show();"><i class="fa fa-bars"></i></span>
                    <ul class="menu-list">
                        <li><a href="<?= site_url('home') ?>">Home</a></li>
                        <li><a href="<?= site_url('products') ?>">Products</a></li>
                        <li><a href="<?= site_url('products/sales') ?>">Sales</a></li>
                        <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Services <i class="fa fa-caret-down"></i></a>
                            <ul class="custom-menu">
                                <?php
                                $allPages = Common::getPages();
                                foreach ($allPages as $vPage):
                                    ?>
                                    <li><a href="<?= site_url('pages/' . $vPage['page_name']) ?>" title="<?= $vPage['page_title'] ?>"><?= $vPage['page_title'] ?></a></li>
                                    <?php
                                endforeach;
                                ?>
                            </ul>
                        </li>
                        <li><a href="<?= site_url('contact') ?>">Contact Us</a></li>
                    </ul>
                </div>
                <!--            </div>
                            <div class="pull-right">-->

            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</header>
<div class="fixed-height-backup"></div>

<div class="clearfix"></div>


<div class="right-fix right-minimize">   <!--right-minimize-->
    <div id="shopping-cart">
        <div class="shopping-cart-list">
            <?php
            if (is_array($carts_info['rows']) && count($carts_info['rows']) > 0) :
                foreach ($carts_info['rows'] as $row) :
                    ?>
                    <div class="product product-widget product-details-<?= $row['product_id'] ?>">
                        <div class="product-thumb">
                            <img src="uploads/products/thumb<?= $row['product_image'] ?>" alt="<?= $row['product_name'] ?>" />
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">&#2547; <?= $row['product_price'] ?> <span class="qty"> X <?= $row['quantity'] ?></span></h3>
                            <h2 class="product-name"><a href="<?= site_url('products/details/' . $row['product_id'] . '/' . Common::encodeMyURL($row['product_name'])) ?>"><?= $row['product_name'] ?></a></h2>
                        </div>
                        <button class="cancel-btn remove-from-cart" value="<?= $row['product_id'] ?>" title="<?= $row['product_name'] ?>"><i class="fa fa-trash"></i></button>
                    </div>
                    <?php
                endforeach;
            else :
                echo '<p style="text-align:center;padding:10px;">Sorry! Your cart is empty.</p>';
            endif;
            ?>
        </div>
        <div class="shopping-cart-btns">
            <a href="<?= site_url('carts') ?>" class="main-btn">View Cart</a>
            <a href="<?= site_url('carts/checkout') ?>" class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<div class="clearfix"></div>