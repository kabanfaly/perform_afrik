<table id="tableContent" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th class="number"><?php echo lang('NO'); ?></th>
            <th><?php echo lang('SUPPLIER'); ?></th>
            <th><?php echo lang('PHONE'); ?></th>
            <th><?php echo lang('ADDRESS'); ?></th>
            <th class="option"><?php echo lang('OPTIONS'); ?></th>
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
                <td align="center">
                    <a href="href="#" onclick="loadForm('<?php echo $form_link . '/' . $supplier['id_fournisseur']; ?>')" data-toggle="modal" data-target="#form-content">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="<?php echo site_url('fournisseur/delete/' . $supplier['id_fournisseur']); ?>" onclick="return confirmDeletion();">
                        <span class="glyphicon glyphicon-remove"></span> 
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>