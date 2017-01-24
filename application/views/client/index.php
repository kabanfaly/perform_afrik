<table id="tableContent" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th class="number"><?php echo lang('NO'); ?></th>
            <th><?php echo lang('CUSTOMER'); ?></th>
            <th><?php echo lang('PHONE'); ?></th>
            <th><?php echo lang('ADDRESS'); ?></th>
            <th><?php echo lang('COUNTRY'); ?></th>
            <th class="option"><?php echo lang('OPTIONS'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $customer['nom']; ?></td>
                <td><?php echo $customer['telephone']; ?></td>
                <td><?php echo $customer['adresse']; ?></td>
                <td><?php echo $customer['pays']; ?></td>
                <td align="center">
                    <a href="#" title="<?php echo lang('EDIT');  ?>" onclick="loadForm('<?php echo $form_link . '/' . $customer['id_client']; ?>')" data-toggle="modal" data-target="#form-content">
                        <span class="fa fa-fw fa-pencil"></span>
                    </a>
                    <a href="#" title="<?php echo lang('REMOVE');  ?>" onclick="if (confirmDeletion()){doAjax('<?php echo site_url('client/delete/' . $customer['id_client']); ?>', 'body');};">
                        <span class="fa fa-fw fa-remove"></span> 
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>