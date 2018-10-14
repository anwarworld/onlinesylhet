<div  class="col-md-4 col-lg-6">
    <form role="form" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="page_name" class="form-control" id="pageName"  value="<?= $page_name ?>" placeholder="Enter Brand Name">
            <?= form_error('page_name', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="form-group">
            <label for="pageName">Page Details</label>
            <textarea id="editor1" name="page_des" class="textarea" rows="10" cols="80"><?= $page_des ?></textarea>
        </div>
        <button type="submit" name="save" value="save" class="btn btn-primary">Submit</button>
    </form>
</div>