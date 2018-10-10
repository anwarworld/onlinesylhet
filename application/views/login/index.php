<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <?php if ($msg != ''): ?>
                <div class="alert alert-success alert-dismissible">
                    <h4><i class="icon fa fa-check"></i> <?= $msg ?></h4>
                </div>
            <?php endif; ?>
            <form action="<?= site_url('login') ?>"id="checkout-form" class="clearfix" method="POST">
                <div class="col-md-6">
                    <div class="review-form">
                        <div class="section-title">
                            <h3 class="title">Login</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="mobile_email" placeholder="Please Enter Phone/Email">
                            <?= form_error('mobile_email', '<span class="bg-red-active">', '</span>') ?>
                        </div>
                        <div class="form-group">
                            <input class="input" type="password" name="password" placeholder="Please Enter Password">
                            <?= form_error('password', '<span class="bg-red-active">', '</span>') ?>
                        </div>
                        <div class="pull-right">
                            <button type="submit" name="save" value="save" class="primary-btn">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->