<table id="tableContent" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th class="number"><?php echo lang('NO'); ?></th>
            <th><?php echo lang('FIRSTNAME'); ?></th>
            <th><?php echo lang('LASTNAME'); ?></th>
            <th><?php echo lang('LOGIN'); ?></th>
            <th><?php echo lang('PROFILE'); ?></th>
            <th><?php echo lang('SHOP'); ?></th>
            <th><?php echo lang('ACTIVATE'); ?></th>
            <th class="option"><?php echo lang('OPTIONS'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($users as $user): ?>
        
        <tr style="<?php if ($user['statut'] == 0) { echo 'color: red' ; }?>">
                <td><?php echo $no++;   ?></td>
                <td><?php echo $user['nom']; ?></td>
                <td><?php echo $user['prenom']; ?></td>
                <td><?php echo $user['login']; ?></td>
                <td><?php echo $user['profil']; ?></td>
                <td><?php echo empty($user['magasin']) ?  lang('ALL_SHOPS'): $user['magasin']; ?></td>
                
                <td align="center"> 
                    <?php 
                        $new_status = $user['statut'] == 0 ? '1' : '0';
                        $status_link = site_url('utilisateur/set_status/' . $user['id_utilisateur'] . '/' . $new_status) ; 
                    ?>
                    <!-- Avoid disabling current connected user -->
                    <?php if($_SESSION['user']['id_utilisateur'] !== $user['id_utilisateur']) : ?>
                    <a href="#" onclick="doAjax('<?php echo $status_link; ?>', 'body')" title="<?php echo  $user['statut'] == 0? lang('CLICK_ENABLE'): lang('CLICK_DISABLE'); ?>">
                            <span class="glyphicon <?php echo $user['statut'] == 0 ? 'glyphicon-unchecked': 'glyphicon-check'; ?>"></span>
                        </a>
                    <?php endif ; ?>
                </td>
              
                <td align="center">
                    <a href="#" onclick="loadForm('<?php echo $form_association_link . '/' . $user['id_utilisateur']; ?>')" data-toggle="modal" data-target="#form-content">
                        <span class="fa fa-fw fa-plug" title="<?php echo lang('ASSOCIATE_SHOP') ;?>"></span>
                    </a>
                     <!--avoid deleting or editing current connected user (edition has to be done from account profile) -->
                     <?php if($_SESSION['user']['id_utilisateur'] !== $user['id_utilisateur']): ?>
                        <a href="#" title="<?php echo lang('EDIT');  ?>" onclick="loadForm('<?php echo $form_link . '/' . $user['id_utilisateur']; ?>')" data-toggle="modal" data-target="#form-content">
                            <span class="fa fa-fw fa-pencil"></span>
                        </a>
                    
                     <a href="#" title="<?php echo lang('REMOVE');  ?>" onclick="if (confirmDeletion()){doAjax('<?php echo site_url('utilisateur/delete/' . $user['id_utilisateur']); ?>', 'body');};">
                            <span class="fa fa-fw fa-remove"></span> 
                        </a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
