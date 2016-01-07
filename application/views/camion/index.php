<table id="tableContent" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th class="number"><?php echo lang('NO'); ?></th>
            <th><?php echo lang('NUMBER'); ?></th>
            <th class="option"><?php echo lang('OPTIONS'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($trucks as $truck): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $truck['numero']; ?></td>
                <td align="center">
                    <a href="#" onclick="loadForm('<?php echo $form_link . '/' . $truck['id_camion']; ?>')" data-toggle="modal" data-target="#form-content">
                        <span class="fa fa-fw fa-pencil"></span>
                    </a>
                    <a href="#" onclick="if (confirmDeletion()){doAjax('<?php echo site_url('camion/delete/' . $truck['id_camion']); ?>', 'body');};">
                        <span class="fa fa-fw fa-remove"></span> 
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
