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
            <form action="<?= site_url('contact') ?>"id="checkout-form" class="clearfix" method="POST">
                <div class="col-md-6">
                    <div class="review-form">
                        <div class="section-title">
                            <h3 class="title">Contact Us</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="contact_name" placeholder="Please Enter your Name">
                            <?= form_error('contact_name', '<span class="bg-red-active">', '</span>') ?>
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="contact_email" placeholder="Please Enter your Email">
                            <?= form_error('contact_email', '<span class="bg-red-active">', '</span>') ?>
                        </div>
                        <div class="form-group">
                            <input class="input" type="phone" name="contact_phone" placeholder="Please Enter your Phone Number">
                            <?= form_error('contact_phone', '<span class="bg-red-active">', '</span>') ?>
                        </div>
                        <div class="form-group">
                            <textarea name="contact_comment" class="input"  placeholder="Please Enter Comment"></textarea>
                            <?= form_error('contact_comment', '<span class="bg-red-active">', '</span>') ?>
                        </div>
                        <div class="pull-right">
                            <button type="submit" name="save" value="save" class="primary-btn">Submit</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="shiping-methods">
                        <div class="section-title">
                            <h4 class="title">Find us</h4>
                        </div>
                        <div class="">
                            <label>Email</label>
                            <p><?= $webSettings['contact_email'] ?></p>
                            <label>Phone </label>
                            <p><?= $webSettings['contact_phone'] ?></p>
                            <label class="title">Address</label>
                            <p><?= nl2br($webSettings['contact_address']) ?></p>
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