<div class="content">
    <div class="title"><?php echo $title; ?></div>
    <table id="tableContent" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th><?php echo lang('NO'); ?></th>
                <th><?php echo lang('TRUCK'); ?></th>
                <th><?php echo lang('CITY'); ?></th>
                <th><?php echo lang('SUPPLIER'); ?></th>
                <th><?php echo lang('DATE'); ?></th>
                <th><?php echo lang('GOOD_BAG'); ?></th>
                <th><?php echo lang('TORE_BAG'); ?></th>
                <th><?php echo lang('GROSS_WEIGHT'); ?></th>
                <th><?php echo lang('NET_WEIGHT'); ?></th>
                <th><?php echo lang('REFRACTED_WEIGHT'); ?></th>
                <th><?php echo lang('REFRACTED_WEIGHT'); ?></th>
                <th><?php echo lang('HUMIDITY'); ?></th>
                <th><?php echo lang('OPTIONS'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;?>
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
                <td></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>