<div  class="col-md-4 col-lg-6">
    <form role="form" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="siteTitle">Title</span>
            </div>
            <input type="input" name="site_title" class="form-control" id="siteTitle"  value="<?= $site_title ?>" placeholder="Enter Title">
            <?= form_error('site_title', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="siteSlogan">Slogan</span>
            </div>
            <textarea id="siteSlogan" name="site_slogan" class="form-control" rows="5" cols="60" placeholder="Enter Site Slogan"><?= $site_slogan ?></textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="metaKeywords">Meta Keywords</span>
            </div>
            <textarea id="metaKeywords" name="meta_keywords" class="form-control" rows="5" cols="60" placeholder="Enter Meta Keywords"><?= $meta_keywords ?></textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="metaContents">Meta Contents</span>
            </div>
            <textarea id="metaContents" name="meta_contents" class="form-control" rows="5" cols="60" placeholder="Enter Meta Contents"><?= $meta_contents ?></textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="contactEmail">Contact  Email</span>
            </div>
            <input type="input" name="contact_email" class="form-control" id="contactEmail"  value="<?= $contact_email ?>" placeholder="Enter Email Address">
            <?= form_error('contact_email', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="contactPhone">Contact Phone</span>
            </div>
            <input type="input" name="contact_phone" class="form-control" id="contactPhone"  value="<?= $contact_phone ?>" placeholder="Enter Phone Number">
            <?= form_error('contact_phone', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="contactAddress">Contact Address</span>
            </div>
            <textarea id="metaKeywords" name="contact_address" class="form-control" rows="5" cols="60" placeholder="Enter Meta Keywords"><?= $contact_address ?></textarea>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="newsletter">Newsletter Text</span>
            </div>
            <textarea id="newsletter" name="newsletter" class="form-control" rows="5" cols="60" placeholder="Enter newsletter Content"><?= $newsletter ?></textarea>
        </div>
        <button type="submit" name="save" value="save" class="btn btn-primary">Submit</button>
    </form>
</div>