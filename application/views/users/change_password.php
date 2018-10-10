<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div class="col-md-3">
                <?php include_once 'side_bar.php'; ?>
            </div>
            <!-- /ASIDE -->
            <!-- MAIN -->
            <div id="main" class="col-md-9">
                <div class="section-title">
                    <h4 class="title"><?= $page_title ?></h4>
                </div>
                <div class="col-md-6">
                    <?php if ($msg != ''): ?>
                        <div class="alert alert-success alert-dismissible">
                            <h4><i class="icon fa fa-check"></i> <?= $msg ?></h4>
                        </div>
                    <?php endif; ?>
                    <form action="<?= site_url('users/change_password') ?>" class="clearfix" method="POST">
                        <div class="form-group">
                            <input class="input" type="password" name="old_password" placeholder="Please Enter Old Password">
                            <?= form_error('old_password', '<span class="bg-red-active">', '</span>') ?>
                        </div>
                        <div class="form-group">
                            <input class="input" type="password" name="password" placeholder="Please Enter New Password">
                            <?= form_error('password', '<span class="bg-red-active">', '</span>') ?>
                        </div>
                        <div class="form-group">
                            <input class="input" type="password" name="confirm_password" placeholder="Please Enter Confirm Password">
                            <?= form_error('confirm_password', '<span class="bg-red-active">', '</span>') ?>
                        </div>
                        <div class="pull-right">
                            <button type="submit" name="save" value="save" class="primary-btn">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>