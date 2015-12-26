<table id="tableContent" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th class="number"><?php echo lang('NO'); ?></th>
            <th><?php echo lang('DATE'); ?></th>
            <th><?php echo lang('SUPPLIER'); ?></th>
            <th><?php echo lang('CITY'); ?></th>
            <th><?php echo lang('TRUCK'); ?></th>
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
        <?php foreach ($unloadings as $unloading): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $unloading['date']; ?></td>
                <td><?php echo $unloading['fournisseur']; ?></td>
                <td><?php echo $unloading['ville']; ?></td>
                <td><?php echo $unloading['camion']; ?></td>
                <td><?php echo $unloading['bon_sac']; ?></td>
                <td><?php echo $unloading['sac_dechire']; ?></td>
                <td><?php echo $unloading['sac_total']; ?></td>
                <td><?php echo $unloading['poids_brut']; ?></td>
                <td><?php echo $unloading['poids_net']; ?></td>
                <td><?php echo $unloading['poids_refracte']; ?></td>
                <td><?php echo $unloading['humidite']; ?> %</td>
                <td align="center">
                    <a href="<?php echo $form_link . '/' . $unloading['id_dechargement']; ?>" data-toggle="modal" data-target="#form-content">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="<?php echo site_url('dechargement/delete/' . $unloading['id_dechargement']); ?>" onclick="return confirmDeletion();">
                        <span class="glyphicon glyphicon-remove"></span> 
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>