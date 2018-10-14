<div  class="col-md-4 col-lg-6">
    <form role="form" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="sliderTitle">Slider Title</span>
            </div>
            <input type="input" name="slider_title" class="form-control" id="sliderTitle"  value="<?= $slider_title ?>" placeholder="Enter Slider Title">
            <?= form_error('slider_title', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="sliderSlogan">Slider Slogan</span>
            </div>
            <input type="input" name="slider_slogan" class="form-control" id="sliderSlogan"  value="<?= $slider_slogan ?>" placeholder="Enter Slogan">
            <?= form_error('slider_slogan', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="sliderURL">URL</span>
            </div>
            <input type="input" name="slider_url" class="form-control" id="sliderURL"  value="<?= $slider_url ?>" placeholder="Enter URL">
            <?= form_error('slider_url', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="image">Slider Image</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="image" aria-describedby="image">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
        </div>
        <div class="form-group">
            <?php if ($slider_image != ''): ?>
                <img src="../uploads/sliders/<?= $slider_image ?>" alt="<?= $slider_title ?>" width="50" height="50" />
                <input type="hidden" name="h_image" value="<?= $slider_image ?>" />
            <?php endif; ?>
            <p class="help-block">[Width X Heigth]= 1200px X 675px</p>
        </div>
        <div class="form-group form-check">
            <label><input name="slider_status" <?php echo ($slider_status == 1) ? 'checked="checked"' : ''; ?> value="1"  class="form-check-input" type="radio">Enabled</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label><input name="slider_status" <?php echo ($slider_status == 0) ? 'checked="checked"' : ''; ?> value="0" class="form-check-input" type="radio">Disabled</label>
        </div>
        <button type="submit" name="save" value="save" class="btn btn-primary">Submit</button>
    </form>
</div>