
<input type="hidden" name="id_utilisateur" id="id_utilisateur" value="<?php echo!isset($id_utilisateur) ? '' : $id_utilisateur; ?>" />
<div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3><?php echo $title; ?></h3>
</div>
<div class="modal-body">
    <div class="form-group">
        <label for="prenom"><?php echo lang('FIRSTNAME'); ?>*:</label>
        <input type="text" name="prenom" value="<?php echo!isset($prenom) ? '' : $prenom; ?>" class="form-control" id="prenom" required placeholder="<?php echo lang('TYPE_LASTNAME'); ?>">
    </div>
    <div class="form-group">
        <label for="nom"><?php echo lang('LASTNAME'); ?>*:</label>
        <input type="text" name="nom" value="<?php echo!isset($nom) ? '' : $nom; ?>" class="form-control" id="nom" required placeholder="<?php echo lang('TYPE_FIRSTNAME'); ?>">
    </div>
    <div class="form-group">
        <label for="login"><?php echo lang('LOGIN'); ?>*:</label>
        <input type="text" name="login" value="<?php echo!isset($login) ? '' : $login; ?>" class="form-control" id="login" required placeholder="<?php echo lang('TYPE_LOGIN'); ?>">
    </div>
    <div class="form-group">
        <label for="mot_de_passe"><?php echo lang('PASSWORD'); ?>*:</label>
        <input type="password" name="mot_de_passe" value="" class="form-control" id="mot_de_passe"  placeholder="<?php echo lang('TYPE_PASSWORD'); ?>"
        <?php if (!isset($mot_de_passe)) : ?>
                   required
               <?php endif; ?>
               >
    </div>
    <div class="form-group">
        <label for="re_mot_de_passe"><?php echo lang('RE_PASSWORD'); ?>:</label>
        <input type="password" name="re_mot_de_passe" value=""  class="form-control" id="re_mot_de_passe" placeholder="<?php echo lang('TYPE_RE_PASSWORD'); ?>">
    </div>
    <div class="form-group">
        <label for="profil"><?php echo lang('PROFILES'); ?>*:</label>
        <select type="text" name="id_profil" class="form-control" id="id_profil" required >
            <option value=""><?php echo lang('SELECT_PROFILE'); ?></option>
            <?php
            foreach ($profiles as $profile)
            {
                $selected = isset($id_profil) && $profile['id_profil'] === $id_profil ? 'selected' : '';
                echo "<option value='{$profile['id_profil']}' $selected>{$profile['nom']}</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-inline">
        <label for="statut"><?php echo lang('ACTIVATE'); ?>:</label>
        <input type="radio" name="statut" value="1" <?php echo!isset($statut) || $statut == 1 ? 'checked' : ''; ?> class="form-control" id="statut" > Oui
        <input type="radio" name="statut" value="0"  <?php echo isset($statut) && $statut == 0 ? 'checked' : ''; ?> class="form-control" id="statut" > Non
    </div>
</div>
<div class="mandatory">* <?php echo lang('MANDATORY_FIELD'); ?> </div>
<div class="modal-footer">
    <input class="btn btn-primary" type="submit" onclick="return myAccountcheckPassword('mot_de_passe', 're_mot_de_passe');" value="<?php echo lang('SUBMIT'); ?>" id="submit">
    <button class="btn btn-default" data-dismiss="modal"><?php echo lang('CANCEL'); ?></button>
</div>
