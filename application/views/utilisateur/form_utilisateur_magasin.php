
<input type="hidden" name="id_utilisateur" id="id_utilisateur" value="<?php echo !isset($id_utilisateur) ?'' : $id_utilisateur; ?>" />
<div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3><?php echo $title; ?></h3>
</div>
<div class="modal-body">
    <div class="form-group">
        <label for="user"><?php echo lang('ASSOCIATE'); ?></label>: <?php echo "$nom $prenom"; ?>
    </div>
    <div class="form-group">
        <label for="magasin"><?php echo lang('TO_SHOP'); ?>:</label>
        <select type="text" name="id_magasin" class="form-control" id="id_magasin" >
            <option value=""><?php echo lang('ALL_SHOPS'); ?></option>
            <?php
            foreach ($shops as $shop)
            {
                $selected = isset($id_magasin) && $shop['id_magasin'] === $id_magasin ? 'selected' : '';
                echo "<option value='{$shop['id_magasin']}' $selected>{$shop['nom']}</option>";
            }
            ?>
        </select>
    </div>
</div>
<div class="modal-footer">
    <input class="btn btn-primary" type="submit" value="<?php echo lang('SUBMIT'); ?>" id="submit">
    <button class="btn btn-default" data-dismiss="modal"><?php echo lang('CANCEL'); ?></button>
</div>
      