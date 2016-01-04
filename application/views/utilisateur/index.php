<table id="tableContent" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th class="number"><?php echo lang('NO'); ?></th>
            <th><?php echo lang('FIRSTNAME'); ?></th>
            <th><?php echo lang('LASTNAME'); ?></th>
            <th><?php echo lang('LOGIN'); ?></th>
            <th><?php echo lang('PROFILE'); ?></th>
            <th><?php echo lang('ACTIVATE'); ?></th>
            <th class="option"><?php echo lang('OPTIONS'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($users as $user): ?>
        
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $user['nom']; ?></td>
                <td><?php echo $user['prenom']; ?></td>
                <td><?php echo $user['login']; ?></td>
                <td><?php echo $user['profil']; ?></td>              
                <td><?php echo $user['statut']; ?></td>
                <td align="center">
                    <a href="<?php echo $form_link . '/' . $user['id_utilisateur']; ?>" data-toggle="modal" data-target="#form-content">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <!--avoid deleting current connected user-->
                    <?php if($_SESSION['user']['id_utilisateur'] !== $user['id_utilisateur']): ?>
                        <a href="<?php echo site_url('utilisateur/delete/' . $user['id_utilisateur']); ?>" onclick="return confirmDeletion();">
                            <span class="glyphicon glyphicon-remove"></span> 
                        </a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
