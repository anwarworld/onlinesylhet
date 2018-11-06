<!-- FOOTER -->
<footer id="footer" class="section section-grey">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6 mobile-display">
                <div class="footer">
                    <!-- footer logo -->
                    <div class="footer-logo">
                        <a class="logo" href="<?= site_url('home') ?>" title="onlinesylhet.com">
                            <img src="images/online-sylhet-logo.jpg" alt="onlinesylhet.com" />
                        </a>
                    </div>
                    <!-- /footer logo -->
                    <p><?= nl2br($webSettings['site_slogan']) ?></p>

                    <!-- footer social -->
                    <ul class="footer-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                    <!-- /footer social -->
                </div>
            </div>
            <!-- /footer widget -->

            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6  mobile-display">
                <div class="footer">
                    <h3 class="footer-header">My Account</h3>
                    <ul class="list-links">
                        <li><a href="<?= site_url('myaccounts') ?>">My Account</a></li>
                        <li><a href="#">My Wishlist</a></li>
                        <li><a href="<?= site_url('carts/checkout') ?>" title="Checkout">Checkout</a></li>
                        <li><a href="#">Login</a></li>
                    </ul>
                </div>
            </div>
            <!-- /footer widget -->
            <div class="clearfix visible-sm visible-xs"></div>
            <!-- footer widget -->
            <div class="col-md-3 col-sm-6 col-xs-6  mobile-display">
                <div class="footer">

                    <h3 class="footer-header">Customer Service</h3>
                    <ul class="list-links">
                        <?php
                        $allPages = Common::getPages();
                        foreach ($allPages as $vPage):
                            ?>
                            <li><a href="<?= site_url('pages/' . $vPage['page_name']) ?>" title="<?= $vPage['page_title'] ?>"><?= $vPage['page_title'] ?></a></li>
                            <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
            <!-- /footer widget -->

            <!-- footer subscribe -->
            <div class="col-md-3 col-sm-6 col-xs-6  mobile-display">
                <div class="footer">
                    <h3 class="footer-header">Stay Connected</h3>
                    <p><?= nl2br($webSettings['newsletter']) ?></p>
                    <form>
                        <div class="form-group">
                            <input class="input" placeholder="Enter Email Address">
                        </div>
                        <button class="primary-btn">Join Newslatter</button>
                    </form>
                </div>
            </div>
            <!-- /footer subscribe -->
        </div>
        <!-- /row -->
        <hr>
        <!-- row -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center  mobile-display">
                <!-- footer copyright -->
                <div class="footer-copyright">
                    Copyright &copy; <?= Date('Y') ?> All rights reserved by OnlineSylhet.com
                </div>
                <!-- /footer copyright -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</footer>
<!-- /FOOTER -->