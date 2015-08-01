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
            <td>
                <a href="#">
                    <span class="glyphicon glyphicon-pencil"></span> 
                </a>
                <a href="#" onclick="return deleteElement('<?php echo site_url('fournisseur'); ?>', '<?php echo 'delete/'.$supplier['id_fournisseur']; ?>');">
                    <span class="glyphicon glyphicon-remove"></span> 
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
<!-- Modal -->

<div id="form-content" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <form class="contact" name="fournisseur" action="<?php echo site_url('fournisseur/save'); ?>" method="POST">
            <div class="modal-content">

                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3><?php echo lang('SAVE_SUPPLIER'); ?></h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nom"><?php echo lang('NAME'); ?>*:</label>
                        <input type="text" name="nom" class="form-control" id="nom" required placeholder="<?php echo lang('TYPE_SUPPLIER_NAME'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="telephone"><?php echo lang('PHONE'); ?>:</label>
                        <input type="text" name="telephone" class="form-control" id="telephone" placeholder="<?php echo lang('TYPE_SUPPLIER_PHONE'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="adresse"><?php echo lang('ADDRESS'); ?>:</label>
                        <textarea name="adresse" class="form-control" id="adresse" placeholder="<?php echo lang('TYPE_SUPPLIER_ADDRESS'); ?>"></textarea>
                    </div>
                </div>
                <div class="mandatory">* <?php echo lang('MANDATORY_FIELD'); ?> </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" value="<?php echo lang('SUBMIT'); ?>" id="submit">
                    <button class="btn btn-default" data-dismiss="modal"><?php echo lang('CANCEL'); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>

