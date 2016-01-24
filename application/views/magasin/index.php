<table id="tableContent" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th class="number"><?php echo lang('NO'); ?></th>
            <th><?php echo lang('SHOP'); ?></th>
            <th class="option"><?php echo lang('OPTIONS'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($shops as $magasin): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $magasin['nom']; ?></td>
                <td align="center">
                    <a href="#" onclick="loadForm('<?php echo $form_link . '/' . $magasin['id_magasin']; ?>')" data-toggle="modal" data-target="#form-content">
                        <span class="fa fa-fw fa-pencil"></span>
                    </a>
                    <a href="#" onclick="if (confirmDeletion()){doAjax('<?php echo site_url('magasin/delete/' . $magasin['id_magasin']); ?>', 'body');};"> 
                        <span class="fa fa-fw fa-remove"></span> 
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>