<input type="hidden" name="id_magasin" value="<?php echo!isset($id_magasin) ? '' : $id_magasin; ?>" />
<div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3><?php echo $title; ?></h3>
</div>
<div class="modal-body">
    <div class="form-group">
        <label for="nom"><?php echo lang('NAME'); ?>*:</label>
        <input type="text" name="nom" value="<?php echo!isset($nom) ? '' : $nom; ?>" class="form-control" id="nom" required placeholder="<?php echo lang('TYPE_SHOP_NAME'); ?>">
    </div>
</div>
<div class="mandatory">* <?php echo lang('MANDATORY_FIELD'); ?> </div>
<div class="modal-footer">
    <input class="btn btn-primary" type="submit" value="<?php echo lang('SUBMIT'); ?>" id="submit">
    <button class="btn btn-default" data-dismiss="modal"><?php echo lang('CANCEL'); ?></button>
</div>