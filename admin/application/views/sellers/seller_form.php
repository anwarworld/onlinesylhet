<div  class="col-md-4 col-lg-6">
    <form role="form" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="sellerName">Seller Name</span>
            </div>
            <input type="input" name="seller_name" class="form-control" id="sellerName" value="<?= $seller_name ?>" placeholder="Enter Seller Name">
            <?= form_error('seller_name', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="sellerEmail">Email address</span>
            </div>
            <input type="email" name="seller_email" class="form-control" id="sellerEmail" value="<?= $seller_email ?>" placeholder="Enter email">
            <?= form_error('seller_email', '<span class="bg-red-active">', '</span>') ?>

        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="sellerPhone">Phone</span>
            </div>
            <input type="input" name="seller_phone" class="form-control" id="sellerPhone" value="<?= $seller_phone ?>" placeholder="Enter Phone">
            <?= form_error('seller_phone', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="sellerCity">City</span>
            </div>
            <input type="input" name="seller_city" class="form-control" id="sellerCity" value="<?= $seller_city ?>" placeholder="Enter City">
            <?= form_error('seller_city', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="sellerAddress">Address Name</span>
            </div>
            <textarea type="input" name="seller_address" class="form-control" id="sellerAddress" placeholder="Enter Address"><?= $seller_address ?></textarea>
            <?= form_error('seller_address', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="image">Seller Image</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="image" aria-describedby="image">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
        <div class="form-group">
            <?php if ($seller_image != ''): ?>
                <img src="../uploads/sellers/<?= $seller_image ?>" alt="<?= $seller_name ?>" width="50" height="50" />
                <input type="hidden" name="h_image" value="<?= $seller_image ?>" />
            <?php endif; ?>
            <p class="help-block">Example Image size will be define.</p>
        </div>
        <div class="form-group form-check">
            <label><input name="seller_status" <?php echo ($seller_status == 1) ? 'checked="checked"' : ''; ?> value="1"  class="form-check-input" type="radio">Enabled</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label><input name="seller_status" <?php echo ($seller_status == 0) ? 'checked="checked"' : ''; ?> value="0" class="form-check-input" type="radio">Disabled</label>
        </div>
        <button type="submit" name="save" value="save" class="btn btn-primary">Submit</button>
    </form>
</div>