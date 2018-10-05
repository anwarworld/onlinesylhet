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
                        <label for="siteTitle">Title</label>
                        <input type="input" name="site_title" class="form-control" id="siteTitle"  value="<?= $site_title ?>" placeholder="Enter Title">
                        <?= form_error('site_title', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="siteSlogan">Slogan</label>
<textarea id="siteSlogan" name="site_slogan" class="form-control" rows="5" cols="60" placeholder="Enter Site Slogan">
<?= $site_slogan ?>
</textarea>
                    </div>
                    <div class="form-group">
                        <label for="metaKeywords">Meta Keywords</label>
<textarea id="metaKeywords" name="meta_keywords" class="form-control" rows="5" cols="60" placeholder="Enter Meta Keywords">
<?= $meta_keywords ?>
</textarea>
                    </div>
                    <div class="form-group">
                        <label for="metaContents">Meta Contents</label>
<textarea id="metaContents" name="meta_contents" class="form-control" rows="5" cols="60" placeholder="Enter Meta Contents">
<?= $meta_contents ?>
</textarea>
                    </div>
                    <div class="form-group">
                        <label for="contactEmail">Contact  Email</label>
                        <input type="input" name="contact_email" class="form-control" id="contactEmail"  value="<?= $contact_email ?>" placeholder="Enter Email Address">
                        <?= form_error('contact_email', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="contactPhone">Contact Phone</label>
                        <input type="input" name="contact_phone" class="form-control" id="contactPhone"  value="<?= $contact_phone ?>" placeholder="Enter Phone Number">
                        <?= form_error('contact_phone', '<span class="bg-red-active">', '</span>') ?>
                    </div>
                    <div class="form-group">
                        <label for="contactAddress">Contact Address</label>
<textarea id="metaKeywords" name="contact_address" class="form-control" rows="5" cols="60" placeholder="Enter Meta Keywords">
<?= $contact_address ?>
</textarea>
                    </div>
                    <div class="form-group">
                        <label for="newsletter">Newsletter Text</label>
<textarea id="newsletter" name="newsletter" class="form-control" rows="5" cols="60" placeholder="Enter newsletter Content">
<?= $newsletter ?>
</textarea>
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