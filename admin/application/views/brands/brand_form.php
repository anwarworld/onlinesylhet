<div  class="col-md-4 col-lg-6">
    <form role="form" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Brand Name</span>
            </div>
            <input type="input" name="brand_name" class="form-control" id="brandName"  value="<?= $brand_name ?>" placeholder="Enter Brand Name">
            <?= form_error('brand_name', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="image">Brand Image</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="image" aria-describedby="image">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
        <div>
            <?php if ($brand_image != ''): ?>
                <img src="../uploads/brands/<?= $brand_image ?>" alt="<?= $brand_name ?>" width="50" height="50" />
                <input type="hidden" name="h_image" value="<?= $brand_image ?>" />
            <?php endif; ?>
        </div>
        <div class="form-group form-check">
            <label><input name="brand_status" <?php echo ($brand_status == 1) ? 'checked="checked"' : ''; ?> value="1"  class="form-check-input" type="radio">Enabled</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label><input name="brand_status" <?php echo ($brand_status == 0) ? 'checked="checked"' : ''; ?> value="0" class="form-check-input" type="radio">Disabled</label>
        </div>
        <button type="submit" name="save" value="save" class="btn btn-primary">Submit</button>
    </form>
</div>