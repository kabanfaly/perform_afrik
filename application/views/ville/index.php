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
            <td>
                <a href="<?php echo site_url('ville'); ?>">
                    <span class="glyphicon glyphicon-pencil"></span> 
                </a>
                <a href="#" onclick="return deleteElement('<?php echo site_url('ville'); ?>', '<?php echo 'delete/'.$city['id_ville']; ?>');">
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
        <form class="contact" name="city" action="<?php echo site_url('ville/save'); ?>" method="POST">
            <div class="modal-content">

                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3><?php echo lang('SAVE_CITY'); ?></h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nom"><?php echo lang('NAME'); ?>*:</label>
                        <input type="text" name="nom" class="form-control" id="email" required placeholder="<?php echo lang('TYPE_CITY_NAME'); ?>">
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

