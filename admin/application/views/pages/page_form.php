<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
tinymce.init({
  selector: 'textarea',
  height: 500,
  plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste imagetools wordcount"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  // imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});
</script>
<div  class="col-md-8 col-lg-8">
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