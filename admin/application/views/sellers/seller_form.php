<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $page_title ?></h3>
            </div>
            <!-- form start -->
            <form role="form" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="sellerName">Seller Name</label>
                        <input type="input" name="seller_name" class="form-control" id="sellerName" value="<?=$seller_name?>" placeholder="Enter Seller Name">
                        <?= form_error('seller_name', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="sellerEmail">Email address</label>
                        <input type="email" name="seller_email" class="form-control" id="sellerEmail" value="<?=$seller_email?>" placeholder="Enter email">
                        <?= form_error('seller_email', '<span class="bg-red-active">', '</span>') ?>

                    </div>
                    <div class="form-group">
                        <label for="sellerPhone">Phone</label>
                        <input type="input" name="seller_phone" class="form-control" id="sellerPhone" value="<?=$seller_phone?>" placeholder="Enter Phone">
                        <?= form_error('seller_phone', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="sellerCity">City</label>
                        <input type="input" name="seller_city" class="form-control" id="sellerCity" value="<?=$seller_city?>" placeholder="Enter City">
                        <?= form_error('seller_city', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="sellerAddress">Address Name</label>
                        <textarea type="input" name="seller_address" class="form-control" id="sellerAddress" placeholder="Enter Address"><?=$seller_address?></textarea>
                        <?= form_error('seller_address', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="sellerImage">Seller Image</label>
                        <?php if ($seller_image != ''): ?>
                            <img src="../uploads/sellers/<?= $seller_image ?>" alt="<?= $seller_name ?>" width="50" height="50" />
                            <input type="hidden" name="h_image" value="<?= $seller_image ?>" />
                        <?php endif; ?>
                        <input type="file" id="sellerImage" name="image">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="seller_status" <?php echo ($seller_status == 1) ? 'checked="checked"' : ''; ?> value="1" type="radio"> Enabled
                        </label>
                        <label>
                            <input name="seller_status" <?php echo ($seller_status == 0) ? 'checked="checked"' : ''; ?> value="0" type="radio"> Disabled
                        </label>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" name="save" value="save" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
</div>