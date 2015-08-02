
<thead>
    <tr>
        <th class="number"><?php echo lang('NO'); ?></th>
        <th><?php echo lang('TRUCK'); ?></th>
        <th><?php echo lang('CITY'); ?></th>
        <th><?php echo lang('SUPPLIER'); ?></th>
        <th><?php echo lang('DATE'); ?></th>
        <th><?php echo lang('GOOD_BAGS'); ?></th>
        <th><?php echo lang('TORN_BAGS'); ?></th>
        <th><?php echo lang('TOTAL_BAGS'); ?></th>
        <th><?php echo lang('GROSS_WEIGHT'); ?></th>
        <th><?php echo lang('NET_WEIGHT'); ?></th>
        <th><?php echo lang('REFRACTED_WEIGHT'); ?></th>
        <th><?php echo lang('HUMIDITY'); ?></th>
        <th class="option"><?php echo lang('OPTIONS'); ?></th>
    </tr>
</thead>
<tbody>
    <?php $no = 1; ?>
    <?php foreach ($unloading as $unload): ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <a href="<?php echo $form_link . '/' . $unload['id_dechargement']; ?>" data-toggle="modal" data-target="#form-content">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <a href="<?php echo site_url('dechargement/delete/' . $unload['id_dechargement']); ?>" onclick="return confirmDeletion();">
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
        <div class="modal-content">
        </div>
    </div>
</div>

