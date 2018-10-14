<div  class="col-md-4 col-lg-6">
    <form role="form" enctype="multipart/form-data" action="<?= $form_action ?>" method="POST">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="userName">User Name</span>
            </div>
            <input type="input" name="user_name" class="form-control" id="userName" value="<?= $user_name ?>" placeholder="Enter User Name">
            <?= form_error('user_name', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="userFullName">Full Name</span>
            </div>
            <input type="input" name="user_full_name" class="form-control" id="userFullName" value="<?= $user_full_name ?>" placeholder="Enter Full Name">
            <?= form_error('user_full_name', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="userEmail">Email address</span>
            </div>
            <input type="email" name="user_email" class="form-control" id="userEmail" value="<?= $user_email ?>" placeholder="Enter email">
            <?= form_error('user_email', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="userPhone">Phone</span>
            </div>
            <input type="input" name="user_phone" class="form-control" id="userPhone" value="<?= $user_phone ?>" placeholder="Enter Phone">
            <?= form_error('user_phone', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="userPassword">Password</span>
            </div>
            <input type="password" name="user_password" class="form-control" id="userPassword" value="<?= $user_password ?>" placeholder="Password">
            <?= form_error('user_password', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="userPassword">Confirm Password</span>
            </div>
            <input type="password" name="confirm_password" class="form-control" id="userPassword" value="<?= $user_password ?>" placeholder="Confiirm Password">
            <?= form_error('confirm_password', '<span class="bg-red-active">', '</span>') ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" for="image">User Image</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" id="image" aria-describedby="image">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
        </div>
        <div class="form-group">
            <?php if ($user_image != ''): ?>
                <img src="../uploads/users/<?= $user_image ?>" alt="<?= $user_name ?>" width="50" height="50" />
                <input type="hidden" name="h_image" value="<?= $user_image ?>" />
            <?php endif; ?>
        </div>
        <div class="form-group form-check">
            <label><input name="user_status" <?php echo ($user_status == 1) ? 'checked="checked"' : ''; ?> value="1"  class="form-check-input" type="radio">Enabled</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label><input name="user_status" <?php echo ($user_status == 0) ? 'checked="checked"' : ''; ?> value="0" class="form-check-input" type="radio">Disabled</label>
        </div>
        <button type="submit" name="save" value="save" class="btn btn-primary">Submit</button>
    </form>
</div>