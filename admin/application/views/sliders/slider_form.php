<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $page_title ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="sliderTitle">Slider Title</label>
                        <input type="input" name="slider_title" class="form-control" id="sliderTitle"  value="<?= $slider_title ?>" placeholder="Enter Slider Title">
                        <?= form_error('slider_title', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="sliderSlogan">Slider Slogan</label>
                        <input type="input" name="slider_slogan" class="form-control" id="sliderSlogan"  value="<?= $slider_slogan ?>" placeholder="Enter Slogan">
                        <?= form_error('slider_slogan', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                     <div class="form-group">
                        <label for="sliderURL">URL</label>
                        <input type="input" name="slider_url" class="form-control" id="sliderURL"  value="<?= $slider_url ?>" placeholder="Enter URL">
                        <?= form_error('slider_url', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="sliderImage">Slider Image</label>
                        <?php if ($slider_image != ''): ?>
                            <img src="../uploads/sliders/<?= $slider_image ?>" alt="<?= $slider_title ?>" width="50" height="50" />
                            <input type="hidden" name="h_image" value="<?= $slider_image ?>" />
                        <?php endif; ?>
                        <input type="file" id="sliderImage" name="image">
                        <p class="help-block">[Width X Heigth]= 1200px X 675px</p>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="slider_status" <?php echo ($slider_status == 1) ? 'checked="checked"' : ''; ?> value="1" type="radio"> Enabled
                        </label>
                        <label>
                            <input name="slider_status" <?php echo ($slider_status == 0) ? 'checked="checked"' : ''; ?> value="0" type="radio"> Disabled
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