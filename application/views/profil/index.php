<table id="tableContent" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th class="number"><?php echo lang('NO'); ?></th>
            <th><?php echo lang('PROFILE'); ?></th>
            <th><?php echo lang('RIGHT'); ?></th>
            <th class="option"><?php echo lang('OPTIONS'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($profiles as $profile): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $profile['nom']; ?></td>
               <td align="center">
                    <!-- avoid editing manager name -->
                    <?php if( strtolower($profile['nom']) !== 'manager' ) : ?>
                        <a href="#" onclick="loadForm('<?php echo $right_link . '/' . $profile['id_profil']; ?>')" data-toggle="modal" data-target="#form-content">
                            <span class="fa fa-fw fa-lock"></span>
                        </a>
                    <?php endif; ?>
                </td>
                <td align="center">
                    <!-- avoid editing manager name -->
                    <?php if( strtolower($profile['nom']) !== 'manager' ) : ?>
                        <a href="#" onclick="loadForm('<?php echo $form_link . '/' . $profile['id_profil']; ?>')" data-toggle="modal" data-target="#form-content">
                            <span class="fa fa-fw fa-pencil"></span>
                        </a>
                    <?php endif; ?>
                    <!--avoid deleting current connected user profile and manager -->
                    <?php if( $_SESSION['user']['id_profil'] !== $profile['id_profil'] && strtolower($profile['nom']) !== 'manager' ) : ?>
                        <a href="#" onclick="if (confirmDeletion()){doAjax('<?php echo site_url('profil/delete/' . $profile['id_profil']); ?>', 'body');};">    
                            <span class="fa fa-fw fa-remove"></span> 
                        </a>
                    <?php endif; ?>
                </td>
                
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
