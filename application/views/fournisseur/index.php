<?php
$authorized_operations = array();

if (!empty($_SESSION['user']['authorized_operations']))
{
    $authorized_operations = json_decode($_SESSION['user']['authorized_operations'], true);
}

?>
<table id="tableContent" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th class="number"><?php echo lang('NO'); ?></th>
            <th><?php echo lang('SUPPLIER'); ?></th>
            <th><?php echo lang('PHONE'); ?></th>
            <th><?php echo lang('ADDRESS'); ?></th>
            <?php if ((isset($authorized_operations['edit']) && $authorized_operations['edit']) || (isset($authorized_operations['delete']) && $authorized_operations['delete'])) : ?>
                <th class="option"><?php echo lang('OPERATIONS'); ?></th>
            <?php endif ?>
            
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($suppliers as $supplier): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $supplier['nom']; ?></td>
                <td><?php echo $supplier['telephone']; ?></td>
                <td><?php echo $supplier['adresse']; ?></td>
                <?php if ((isset($authorized_operations['edit']) && $authorized_operations['edit']) || (isset($authorized_operations['delete']) && $authorized_operations['delete'])) : ?>
                    <td align="center">
                        <?php if (isset($authorized_operations['edit']) && $authorized_operations['edit']) : ?>
                            <a href="#" title="<?php echo lang('EDIT');  ?>" onclick="loadForm('<?php echo $form_link . '/' . $supplier['id_fournisseur']; ?>')" data-toggle="modal" data-target="#form-content">
                                <span class="fa fa-fw fa-pencil"></span>
                            </a>
                        <?php endif ?>

                        <?php if (isset($authorized_operations['delete']) && $authorized_operations['delete']) : ?>
                            <a href="#" title="<?php echo lang('REMOVE');  ?>" onclick="if (confirmDeletion()){doAjax('<?php echo site_url('fournisseur/delete/' . $supplier['id_fournisseur']); ?>', 'body');};">
                                <span class="fa fa-fw fa-remove"></span> 
                            </a>
                        <?php endif ?>
                    </td>
                <?php endif ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>