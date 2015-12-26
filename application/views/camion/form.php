<input type="hidden" name="id_camion" value="<?php echo !isset($id_camion) ?'' : $id_camion; ?>" />
<div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3><?php echo $title; ?></h3>
</div>
<div class="modal-body">
    <div class="form-group">
        <label for="numero"><?php echo lang('NUMBER'); ?>*:</label>
        <input type="text" name="numero" value="<?php echo !isset($numero) ?'' : $numero; ?>" class="form-control" id="numero" required placeholder="<?php echo lang('TYPE_TRUCK_NUMBER'); ?>">
    </div>
</div>
<div class="mandatory">* <?php echo lang('MANDATORY_FIELD'); ?> </div>
<div class="modal-footer">
    <input class="btn btn-primary" type="submit" value="<?php echo lang('SUBMIT'); ?>" id="submit">
    <button class="btn btn-default" data-dismiss="modal"><?php echo lang('CANCEL'); ?></button>
</div>