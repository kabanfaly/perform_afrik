<input type="hidden" name="id_dechargement" value="<?php echo!isset($id_dechargement) ? '' : $id_dechargement; ?>" />
<div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3><?php echo $title ?></h3>
</div>
<div class="modal-body">
    <div class="form-group">
        <label for="id_camion"><?php echo lang('TRUCK'); ?>*:</label>
        <select type="text" name="id_camion" class="form-control" id="id_camion" required >
            <option value=""><?php echo lang('SELECT_TRUCK'); ?></option>
            <?php
            foreach ($trucks as $truck)
            {
                $selected = isset($id_camion) && $truck['id_camion'] === $id_camion ? 'selected' : '';
                echo "<option value='{$truck['id_camion']}' $selected>{$truck['numero']}</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="ci"><?php echo lang('SUPPLIER'); ?>*:</label>
        <select type="text" name="id_fournisseur" class="form-control" id="id_fournisseur" required >
            <option value=""><?php echo lang('SELECT_SUPPLIER'); ?></option>
            <?php
            foreach ($suppliers as $supplier)
            {
                $selected = isset($id_fournisseur) && $supplier['id_fournisseur'] === $id_fournisseur ? 'selected' : '';
                echo "<option value='{$supplier['id_fournisseur']}' $selected>{$supplier['nom']}</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="city"><?php echo lang('CITY'); ?>*:</label>
        <select type="text" name="id_ville" class="form-control" id="id_ville" required >
            <option value=""><?php echo lang('SELECT_CITY'); ?></option>
            <?php
            foreach ($cities as $city)
            {
                $selected = isset($id_ville) && $id_ville === $city['id_ville'] ? 'selected' : '';
                echo "<option value='{$city['id_ville']}' $selected>{$city['nom']}</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="date"><?php echo lang('DATE'); ?>*:</label>
        <input type="text" name="date" value="<?php echo !isset($date) ? '' : $date; ?>" class="form-control" id="datetimepicker" required placeholder="<?php echo lang('DATE_FORMAT'); ?>"/>
    </div>
    <div class="form-group">
        <label for="bon_sac"><?php echo lang('GOOD_BAGS'); ?>:</label>
        <input type="text" name="bon_sac" value="<?php echo!isset($bon_sac) ? '' : $bon_sac; ?>" class="form-control" id="bon_sac" placeholder="<?php echo lang('TYPE_GOOD_BAGS'); ?>"/>
    </div>
    <div class="form-group">
        <label for="sac_dechire"><?php echo lang('TORN_BAGS'); ?>:</label>
        <input type="text" name="sac_dechire" value="<?php echo!isset($sac_dechire) ? '' : $sac_dechire; ?>" class="form-control" id="sac_dechire" placeholder="<?php echo lang('TYPE_TORN_BAGS'); ?>"/>
    </div>
    <div class="form-group">
        <label for="poids_brut"><?php echo lang('GROSS_WEIGHT'); ?>:</label>
        <input type="text" name="poids_brut" value="<?php echo!isset($poids_brut) ? '' : $poids_brut; ?>" class="form-control" id="poids_brut" placeholder="<?php echo lang('TYPE_GROSS_WEIGHT'); ?>"/>
    </div>
    <div class="form-group">
        <label for="poids_net"><?php echo lang('NET_WEIGHT'); ?>:</label>
        <input type="text" name="poids_net" value="<?php echo!isset($poids_net) ? '' : $poids_net; ?>" class="form-control" id="poids_net" placeholder="<?php echo lang('TYPE_NET_WEIGHT'); ?>"/>
    </div>
    <div class="form-group">
        <label for="poids_refracte"><?php echo lang('REFRACTED_WEIGHT_LABEL'); ?>:</label>
        <input type="text" name="poids_refracte" value="<?php echo!isset($poids_refracte) ? '' : $poids_refracte; ?>" class="form-control" id="poids_refracte" placeholder="0"/>
    </div>
    <div class="form-group">
        <label for="humitide"><?php echo lang('HUMIDITY'); ?>:</label>
        <input type="text" name="humidite" value="<?php echo!isset($humidite) ? '' : $humidite; ?>" class="form-control" id="humidite" placeholder="<?php echo lang('TYPE_HUMIDITY'); ?>"/>
    </div>
</div>
<div class="mandatory">* <?php echo lang('MANDATORY_FIELD'); ?> </div>
<div class="modal-footer">
    <input class="btn btn-primary" type="submit" value="<?php echo lang('SUBMIT'); ?>" id="submit">
    <button class="btn btn-default" data-dismiss="modal"><?php echo lang('CANCEL'); ?></button>
</div>
<script type="text/javascript">
     $('#bon_sac, #sac_dechire, #poids_net').on('change', function(){
        updateRefractedWeight();
    });
</script>
    
