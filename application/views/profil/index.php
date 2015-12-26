<table id="tableContent" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th class="number"><?php echo lang('NO'); ?></th>
            <th><?php echo lang('PROFILE'); ?></th>
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
                    <a href="<?php echo $form_link . '/' . $profile['id_profil']; ?>" data-toggle="modal" data-target="#form-content">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="<?php echo site_url('profil/delete/' . $profile['id_profil']); ?>" onclick="return confirmDeletion();">
                        <span class="glyphicon glyphicon-remove"></span> 
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
