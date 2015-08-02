<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/style.css" >      
    </head>
    <body>
        <form class="contact" name="dechargement" action="<?php echo $form_action; ?>" method="POST">
            <input type="hidden" name="id_dechargement" value="<?php echo !isset($id_dechargement) ?'' : $id_dechargement; ?>" />
            <div class="modal-header">
                <a class="close" data-dismiss="modal">×</a>
                <h3><?php echo $title ?></h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="id_camion"><?php echo lang('TRUCK'); ?>*:</label>
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
                    <select type="text" name="id_dechargement" class="form-control" id="city" required >

                    </select>
                </div>
                <div class="form-group">
                    <label for="date"><?php echo lang('DATE'); ?>*:</label>
                    <input type="text" name="date" value="<?php echo !isset($date) ?'' : $date; ?>" class="form-control" id="datetimepicker" required placeholder="<?php echo lang('DATE_FORMAT'); ?>"/>
                </div>
                <div class="form-group">
                    <label for="bon_sac"><?php echo lang('GOOD_BAGS'); ?>*:</label>
                    <input type="text" name="bon_sac" value="<?php echo !isset($bon_sac) ?'' : $bon_sac; ?>" class="form-control" id="good_bags" required placeholder="<?php echo lang('TYPE_GOOD_BAGS'); ?>"/>
                </div>
                <div class="form-group">
                    <label for="sac_dechire"><?php echo lang('TORN_BAGS'); ?>*:</label>
                    <input type="text" name="sac_dechire" value="<?php echo !isset($sac_dechire) ?'' : $sac_dechire; ?>" class="form-control" id="torn_bags" required placeholder="<?php echo lang('TYPE_TORN_BAGS'); ?>"/>
                </div>
                <div class="form-group">
                    <label for="poids_brut"><?php echo lang('GROSS_WEIGHT'); ?>*:</label>
                    <input type="text" name="poids_brut" value="<?php echo !isset($poids_brut) ?'' : $poids_brut; ?>" class="form-control" id="gross_weight" required placeholder="<?php echo lang('TYPE_GROSS_WEIGHT'); ?>"/>
                </div>
                <div class="form-group">
                    <label for="poids_net"><?php echo lang('NET_WEIGHT'); ?>*:</label>
                    <input type="text" name="poids_net" value="<?php echo !isset($poids_net) ?'' : $poids_net; ?>" class="form-control" id="net_weight" required placeholder="<?php echo lang('TYPE_NET_WEIGHT'); ?>"/>
                </div>
                <div class="form-group">
                    <label for="humitide"><?php echo lang('HUMIDITY'); ?>:*</label>
                    <input type="text" name="humidite" value="<?php echo !isset($humidite) ?'' : $humidite; ?>" class="form-control" id="humidity" required placeholder="<?php echo lang('TYPE_HUMIDITY'); ?>"/>
                </div>
            </div>
            <div class="mandatory">* <?php echo lang('MANDATORY_FIELD'); ?> </div>
            <div class="modal-footer">
                <input class="btn btn-primary" type="submit" value="<?php echo lang('SUBMIT'); ?>" id="submit">
                <button class="btn btn-default" data-dismiss="modal"><?php echo lang('CANCEL'); ?></button>
            </div>
        </form>
        <?php
        $url = base_url();
        echo <<<EOF
            <script type="text/javascript">
                var baseUrl = "{$url}";
            </script>
EOF;
        ?>
    </body>
    <script>
    $(function () {
        $('#datetimepicker').datetimepicker({
            lang: 'fr',
            format: 'd/m/Y',
            timepicker: false
        }); 
    });
    </script>
    <script type="text/javascript" data-main="<?php echo base_url(); ?>js/main?e=<?php echo time(); ?>" src="<?php echo base_url(); ?>assets/requirejs/require.js"></script>
</html>