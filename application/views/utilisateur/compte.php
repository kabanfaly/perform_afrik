<h3><?php echo $title; ?></h3>
<div id="setting" class="content">

    <!-- Begin change user firstname and lastname -->
    <div class="myaccount-collapse-container background-default">
        <div class="myaccount-collapsable-header">
            <a class="collapsed accordion-toggle" data-toggle="collapse" data-target="#myaccount-name" href="#">
                <div class="pull-right"><span class="glyphicon glyphicon-plus"></span></div>
                <div class="box-content">
                    <b class="margin-right"><?php echo lang('NAME'); ?></b>
                    <i class="visbile-on-collapsed">Monsieur&nbsp;<?php echo $nom . ' ' . $prenom; ?></i>
                </div>
            </a>
        </div>
        <div class="myaccount-collapsable-body clearfix collapse" id="myaccount-name">
            <form id="myaccount_username_change_form" method="post" action="<?php echo $myaccount_username_change_form; ?>">
                <input type="hidden" value="<?php echo $id_utilisateur; ?>" name="id_utilisateur"/>                            
                <div class="form-group">
                    <b><label for="prenom"><?php echo lang('FIRSTNAME'); ?>*:</label></b>
                    <div class="form-row">
                        <input type="text" name="prenom" value="<?php echo $prenom; ?>" class="form-control" id="prenom" required >
                    </div>
                </div>
                <div class="form-group">
                    <b><label for="nom"><?php echo lang('LASTNAME'); ?>*:</label></b>
                    <div class="form-row">
                        <input type="text" name="nom" value="<?php echo $nom; ?>" class="form-control" id="nom" required >
                    </div>
                </div>
                <div class="app-form-btn">
                    <input class="btn btn-primary" type="submit" value="<?php echo lang('SUBMIT'); ?>" id="submit">
                    <button class="btn btn-default" data-dismiss="modal"><?php echo lang('CANCEL'); ?></button>
                </div>
            </form>
        </div>
    </div>
    <!-- /end change user firstname and lastname -->

    <!--  Begin change login -->
    <div class="myaccount-collapse-container background-default">
        <div class="myaccount-collapsable-header">
            <a class="collapsed accordion-toggle" data-toggle="collapse" data-target="#myaccount-login" href="#">
                <div class="pull-right"><span class="glyphicon glyphicon-plus"></span></div>
                <div class="box-content">
                    <b class="margin-right"><?php echo lang('LOGIN'); ?></b>
                    <i class="visbile-on-collapsed"><?php echo $login; ?></i>
                </div>
            </a>
        </div>
        <div class="myaccount-collapsable-body clearfix collapse" id="myaccount-login">
            <form id="myaccount_login_change_form" method="post" action="<?php echo $myaccount_login_change_form; ?>">
                <input type="hidden" value="<?php echo $id_utilisateur; ?>" name="id_utilisateur"/>                            
                <div class="form-group">
                    <b><label for="login"><?php echo lang('LOGIN'); ?>*:</label></b>
                    <div class="form-row">
                        <input type="text" name="login" value="<?php echo $login; ?>" class="form-control" id="login" required >
                    </div>
                </div>
                <div class="form-group">
                    <label for="mot_de_passe"><?php echo lang('TYPE_PASSWORD_FOR_LOGIN'); ?>:</label>
                    <input type="password" name="mot_de_passe" value="" class="form-control" id="mot_de_passe" required placeholder="<?php echo lang('TYPE_PASSWORD'); ?>">
                </div>
                <div class="app-form-btn">
                    <input class="btn btn-primary" type="submit" value="<?php echo lang('SUBMIT'); ?>" id="submit">
                    <button class="btn btn-default" data-dismiss="modal"><?php echo lang('CANCEL'); ?></button>
                </div>
            </form>
        </div>
    </div>
    <!--  /end change login -->
    <!--  Begin change password -->
    <div class="myaccount-collapse-container background-default">
        <div class="myaccount-collapsable-header">
            <a class="collapsed accordion-toggle" data-toggle="collapse" data-target="#myaccount-password" href="#">
                <div class="pull-right"><span class="glyphicon glyphicon-plus"></span></div>
                <div class="box-content">
                    <b class="margin-right"><?php echo lang('CHANGE_MY_PASSWORD'); ?></b>
                </div>
            </a>
        </div>
        <div class="myaccount-collapsable-body clearfix collapse" id="myaccount-password">
            <form id="myaccount_password_change_form" method="post" action="<?php echo $myaccount_password_change_form; ?>">
                <input type="hidden" value="<?php echo $id_utilisateur; ?>" name="id_utilisateur"/>                            
                <div class="form-group">
                    <label for="mot_de_passe"><?php echo lang('CURRENT_PASSWORD'); ?>:</label>
                    <input type="password" name="mot_de_passe" value="" class="form-control" id="mot_de_passe" required placeholder="<?php echo lang('TYPE_PASSWORD'); ?>">
                </div>
                <div class="form-group">
                    <label for="new_mot_de_passe"><?php echo lang('NEW_PASSWORD'); ?>:</label>
                    <input type="password" name="new_mot_de_passe" value="" class="form-control" id="new_mot_de_passe" required placeholder="<?php echo lang('TYPE_PASSWORD'); ?>">
                </div>
                <div class="form-group">
                    <label for="re_new_mot_de_passe"><?php echo lang('RE_PASSWORD'); ?>:</label>
                    <input type="password" name="re_new_mot_de_passe" value="" class="form-control" id="re_new_mot_de_passe" required placeholder="<?php echo lang('TYPE_PASSWORD'); ?>">
                </div>
                <div class="app-form-btn">
                    <input class="btn btn-primary" type="submit" onclick="return myAccountcheckPassword('new_mot_de_passe', 're_new_mot_de_passe');" value="<?php echo lang('SUBMIT'); ?>" id="submit">
                    <button class="btn btn-default" data-dismiss="modal"><?php echo lang('CANCEL'); ?></button>
                </div>
            </form>
        </div>
    </div>
    <!--  /end change password -->
    <!--  Begin change profile -->
    <!--div class="myaccount-collapse-container background-default">
        <div class="myaccount-collapsable-header">
            <a class="collapsed accordion-toggle" data-toggle="collapse" data-target="#myaccount-profile" href="#">
                <div class="pull-right"><span class="glyphicon glyphicon-plus"></span></div>
                <div class="box-content">
                    <b class="margin-right"><?php echo lang('PROFILE'); ?></b>
                    <i class="visbile-on-collapsed"><?php echo $profil; ?></i>
                </div>
            </a>
        </div>
        <div class="myaccount-collapsable-body clearfix collapse" id="myaccount-profile">
            <form id="myaccount_profile_change_form" method="post" action="<?php echo $myaccount_profile_change_form; ?>">
                <input type="hidden" value="<?php echo $id_utilisateur; ?>" name="id_utilisateur"/>                            
                <div class="form-group">
                    <label for="profil"><?php echo lang('PROFILES'); ?>*:</label>
                    <select type="text" name="id_profil" class="form-control" id="supplier" required >
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
                <div class="app-form-btn">
                    <input class="btn btn-primary" type="submit" value="<?php echo lang('SUBMIT'); ?>" id="submit">
                    <button class="btn btn-default" data-dismiss="modal"><?php echo lang('CANCEL'); ?></button>
                </div>
            </form>
        </div>
    </div-->
    <!--  Begin change profile -->

</div>