
<input type="hidden" name="id_profil" value="<?php echo!isset($id_profil) ? '' : $id_profil; ?>" />
<div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3><?php echo lang("PROFILE") . ": $nom"; ?></h3>
    <h4><?php echo $title; ?></h4>
    <i><?php echo lang("UNLOADING_COLUMNS_RIGHTS_HELP") ; ?></i>
</div>
<table class="table table-striped table-bordered table-hover">
<!--    <tr>
        <th>Colonnes</th>
        <th><center><input type="checkbox" onclick="checkUncheckAll('authorized_columns');"></center></th>
    </tr>-->
    <?php foreach ($unloading_columns_rights as $column => $value): ?>
        <tr>
            <td>
                <label for="<?php echo $column; ?>"><?php echo lang("$column"); ?>:</label> 
            </td>
            <td>
                <input type="checkbox" name="authorized_columns[]" value="<?php echo $column; ?>" <?php echo $value ? 'checked' : ''; ?> class="form-control authorized_columns" id="<?php echo $column; ?>">
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<div class="modal-footer">
    <input class="btn btn-primary" type="submit" value="<?php echo lang('SUBMIT'); ?>" id="submit">
    <button class="btn btn-default" data-dismiss="modal"><?php echo lang('CANCEL'); ?></button>
</div>
