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
               <a href="<?php echo  $form_link .'/'. $city['id_ville']; ?>" data-toggle="modal" data-target="#form-content">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <a href="<?php echo site_url('ville/delete/' . $city['id_ville']); ?>" onclick="return confirmDeletion();">
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

