
<input type="hidden" name="id_profil" value="<?php echo!isset($id_profil) ? '' : $id_profil; ?>" />
<div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3><?php echo lang("PROFILE") . ": $nom"; ?></h3>
    <h4><?php echo $title; ?></h4>
    <i><?php echo lang("OPERATIONS_RIGHTS_HELP") ; ?></i>
</div>
<table class="table table-striped table-bordered table-hover">
<!--    <tr>
        <th>Colonnes</th>
        <th><center><input type="checkbox" onclick="checkUncheckAll('authorized_columns');"></center></th>
    </tr>-->
    <?php foreach ($operations_rights as $operation => $value): ?>
        <tr>
            <td>
                <label for="<?php echo $operation; ?>"><?php echo lang("$operation"); ?>:</label> 
            </td>
            <td>
                <input type="checkbox" name="authorized_operations[]" value="<?php echo $operation; ?>" <?php echo $value ? 'checked' : ''; ?> class="form-control authorized_operations" id="<?php echo $operation; ?>">
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<div class="modal-footer">
    <input class="btn btn-primary" type="submit" value="<?php echo lang('SUBMIT'); ?>" id="submit">
    <button class="btn btn-default" data-dismiss="modal"><?php echo lang('CANCEL'); ?></button>
</div>
