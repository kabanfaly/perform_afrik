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
            <td>
                <a href="<?php echo  $form_link .'/'. $truck['id_camion']; ?>" data-toggle="modal" data-target="#form-content">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <a href="<?php echo site_url('camion/delete/' . $truck['id_camion']); ?>" onclick="return confirmDeletion();">
                    <span class="glyphicon glyphicon-remove"></span> 
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>

<!-- Modal -->
<div id="form-content" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="form-content" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        </div>
    </div>
</div>