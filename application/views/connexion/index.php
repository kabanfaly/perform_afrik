<div class="col-sm-12 col-xs-12 col-lg-4 col-lg-offset-2">
    <div class="account-wall">
        <?php if(!empty($err_msg)){ ?>
        <div class="alert alert-danger fade in">
            <?php echo $err_msg; ?>
        </div>
        <?php } ?>
        <form class="form-signin" action="<?php echo site_url('connexion/login'); ?>" method="POST">
            <input type="text" class="form-control" name="login" placeholder="<?php echo lang('LOGIN'); ?>" required autofocus>
            <input type="password" class="form-control" name="password" placeholder="<?php echo lang('PASSWORD'); ?>" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                <?php echo lang('CONNECTION'); ?>
            </button>
        </form>
    </div>
</div>