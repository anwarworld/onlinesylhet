<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div class="col-md-3">
                <?php include_once 'side_bar.php'; ?>
            </div>
            <!-- /ASIDE -->
            <!-- MAIN -->
            <div id="main" class="col-md-9">
                <div class="section-title">
                    <h4 class="title">Welcome <?= $user_full_name ?></h4>
                </div>
                <div class="">
                    <label>Email</label>
                    <p><?= $user_email ?></p>
                    <label>Phone </label>
                    <p><?= $user_phone ?></p>
                    <label class="title">Address</label>
                    <p><?= nl2br($user_address) ?></p>
                </div>
            </div>
        </div>
    </div>

</div>