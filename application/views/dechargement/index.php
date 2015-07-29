
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
        <th><?php echo lang('OPTIONS'); ?></th>
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
            <td></td>
        </tr>
    <?php endforeach; ?>
</tbody>

<!-- Modal -->

<div id="form-content" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <form class="contact" name="dechargement" action="<?php echo site_url('dechargement/save');?>" method="POST">
            <div class="modal-content">

                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3><?php echo lang('SAVE_UNLOAD'); ?></h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_camion"><?php echo lang('TRUCK'); ?>:</label>
                        <select type="text" name="id_camion" class="form-control" id="truck" required >
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ci"><?php echo lang('SUPPLIER'); ?>*:</label>
                        <select type="text" name="id_fournisseur" class="form-control" id="supplier" required >
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="city"><?php echo lang('CITY'); ?>*:</label>
                        <select type="text" name="id_ville" class="form-control" id="city" required >
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date"><?php echo lang('DATE'); ?>*:</label>
                        <input type="text" name="date" class="form-control" id="numero datetimepicker" required placeholder="<?php echo lang('DATE_FORMAT'); ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="bon_sac"><?php echo lang('GOOD_BAGS'); ?>*:</label>
                        <input type="text" name="bon_sac" class="form-control" id="good_bags" required placeholder="<?php echo lang('TYPE_GOOD_BAGS'); ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="sac_dechire"><?php echo lang('TORN_BAGS'); ?>*:</label>
                        <input type="text" name="sac_dechire" class="form-control" id="torn_bags" required placeholder="<?php echo lang('TYPE_TORN_BAGS'); ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="poids_brut"><?php echo lang('GROSS_WEIGHT'); ?>*:</label>
                        <input type="text" name="poids_brut" class="form-control" id="gross_weight" required placeholder="<?php echo lang('TYPE_GROSS_WEIGHT'); ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="poids_net"><?php echo lang('NET_WEIGHT'); ?>*:</label>
                        <input type="text" name="poids_net" class="form-control" id="net_weight" required placeholder="<?php echo lang('TYPE_NET_WEIGHT'); ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="poids_refracte"><?php echo lang('REFRACTED_WEIGHT'); ?>:</label>
                        <input type="text" name="poids_refracte" disabled class="form-control" id="refracted_weight" required placeholder="<?php echo lang('AUTO_TYPE'); ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="humitide"><?php echo lang('HUMIDITY'); ?>:*</label>
                        <input type="text" name="humidite" class="form-control" id="humidity" required placeholder="<?php echo lang('TYPE_HUMIDITY'); ?>"/>
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

