<table id="tableContent" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th class="number"><?php echo lang('NO'); ?></th>
            <th><?php echo lang('CITY'); ?></th>
            <th class="option"><?php echo lang('OPTIONS'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($cities as $city): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $city['nom']; ?></td>
                <td align="center">
                    <a href="#" title="<?php echo lang('EDIT');  ?>" onclick="loadForm('<?php echo $form_link . '/' . $city['id_ville']; ?>')" data-toggle="modal" data-target="#form-content">
                        <span class="fa fa-fw fa-pencil"></span>
                    </a>
                    <a href="#" title="<?php echo lang('REMOVE');  ?>" onclick="if (confirmDeletion()){doAjax('<?php echo site_url('ville/delete/' . $city['id_ville']); ?>', 'body');};"> 
                        <span class="fa fa-fw fa-remove"></span> 
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>