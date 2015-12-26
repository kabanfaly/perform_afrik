<div><h3><?php echo lang('SITE_PARAMETERS'); ?></h3></div>
<form class="contact" name="parameters" action="<?php echo $form_action; ?>" method="POST">
    <div class="modal-body">
        <div class="form-group">
            <label for="COMPANY"><?php echo lang('COMPANY'); ?>:</label>
            <input type="text" name="COMPANY" value="<?php echo isset($_SESSION['parameters']['COMPANY']) ? $_SESSION['parameters']['COMPANY'] : ''; ?>" class="form-control" id="COMPANY" placeholder="<?php echo lang('TYPE_COMPANY_NAME'); ?>">
        </div>
        <div class="form-group">
            <label for="PHONE"><?php echo lang('PHONE'); ?>:</label>
            <input type="text" name="PHONE" value="<?php echo isset($_SESSION['parameters']['PHONE']) ? $_SESSION['parameters']['PHONE'] : ''; ?>"class="form-control" id="telephone" placeholder="<?php echo lang('TYPE_PHONE_NUMBERS'); ?>">
        </div>
        <div class="form-group">
            <label for="FAX"><?php echo lang('FAX'); ?>:</label>
            <input type="text" name="FAX" value="<?php echo isset($_SESSION['parameters']['FAX']) ? $_SESSION['parameters']['FAX'] : ''; ?>"class="form-control" id="telephone" placeholder="<?php echo lang('TYPE_FAX_NUMBER'); ?>">
        </div>
        <div class="form-group">
            <label for="EMAIL"><?php echo lang('EMAIL'); ?>:</label>
            <input type="email" name="EMAIL" value="<?php echo isset($_SESSION['parameters']['FAX']) ? $_SESSION['parameters']['EMAIL'] : ''; ?>"class="form-control" id="telephone" placeholder="<?php echo lang('TYPE_EMAIL'); ?>">
        </div>
        <div class="form-group">
            <label for="ADDRESS"><?php echo lang('ADDRESS'); ?>:</label>
            <textarea name="ADDRESS" class="form-control" id="adresse" placeholder="<?php echo lang('TYPE_ADDRESS'); ?>"><?php echo isset($_SESSION['parameters']['FAX']) ? $_SESSION['parameters']['ADDRESS'] : ''; ?>
            </textarea>
        </div>
    </div>
    <div class="modal-footer">
        <input class="btn btn-primary" type="submit" value="<?php echo lang('SUBMIT'); ?>" id="submit">
    </div>
</form>
