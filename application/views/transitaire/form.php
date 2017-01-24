<input type="hidden" name="id_transitaire" value="<?php echo!isset($id_transitaire) ? '' : $id_transitaire; ?>" />
<div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3><?php echo $title; ?></h3>
</div>
<div class="modal-body">
    <div class="form-group">
        <label for="nom"><?php echo lang('NAME'); ?>*:</label>
        <input type="text" name="nom" value="<?php echo!isset($nom) ? '' : $nom; ?>" class="form-control" id="nom" required placeholder="<?php echo lang('TYPE_FORWARDING_AGENT_NAME'); ?>">
    </div>
    <div class="form-group">
        <label for="telephone"><?php echo lang('PHONE'); ?>:</label>
        <input type="text" name="telephone" value="<?php echo!isset($telephone) ? '' : $telephone; ?>"class="form-control" id="telephone" placeholder="<?php echo lang('TYPE_FORWARDING_AGENT_PHONE'); ?>">
    </div>
    <div class="form-group">
        <label for="adresse"><?php echo lang('ADDRESS'); ?>:</label>
        <textarea name="adresse" class="form-control" id="adresse" placeholder="<?php echo lang('TYPE_FORWARDING_AGENT_ADDRESS'); ?>"><?php echo!isset($adresse) ? '' : $adresse; ?></textarea>
    </div>
    <div class="form-group">
        <label for="country"><?php echo lang('COUNTRY'); ?>:</label>
        <input type="text" name="pays" value="<?php echo!isset($pays) ? '' : $pays; ?>"class="form-control" id="pays" placeholder="<?php echo lang('TYPE_COUNTRY'); ?>">
    </div>
</div>
<div class="mandatory">* <?php echo lang('MANDATORY_FIELD'); ?> </div>
<div class="modal-footer">
    <input class="btn btn-primary" type="submit" value="<?php echo lang('SUBMIT'); ?>" id="submit">
    <button class="btn btn-default" data-dismiss="modal"><?php echo lang('CANCEL'); ?></button>
</div>