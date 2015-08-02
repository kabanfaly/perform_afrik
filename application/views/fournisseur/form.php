<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/style.css" >      
    </head>
    <body>
        <form class="contact" name="fournisseur" action="<?php echo $form_action; ?>" method="POST">
            <input type="hidden" name="id_fournisseur" value="<?php echo !isset($id_fournisseur) ?'' : $id_fournisseur; ?>" />
            <div class="modal-header">
                <a class="close" data-dismiss="modal">×</a>
                <h3><?php echo $title; ?></h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nom"><?php echo lang('NAME'); ?>*:</label>
                    <input type="text" name="nom" value="<?php echo !isset($nom) ?'' : $nom; ?>" class="form-control" id="nom" required placeholder="<?php echo lang('TYPE_SUPPLIER_NAME'); ?>">
                </div>
                <div class="form-group">
                    <label for="telephone"><?php echo lang('PHONE'); ?>:</label>
                    <input type="text" name="telephone" value="<?php echo !isset($telephone) ?'' : $telephone; ?>"class="form-control" id="telephone" placeholder="<?php echo lang('TYPE_SUPPLIER_PHONE'); ?>">
                </div>
                <div class="form-group">
                    <label for="adresse"><?php echo lang('ADDRESS'); ?>:</label>
                    <textarea name="adresse" class="form-control" id="adresse" placeholder="<?php echo lang('TYPE_SUPPLIER_ADDRESS'); ?>"><?php echo !isset($adresse) ?'' : $adresse; ?>
                    </textarea>
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
    <script type="text/javascript" data-main="<?php echo base_url(); ?>js/main?<?php echo time(); ?>" src="<?php echo base_url(); ?>assets/requirejs/require.js"></script>
</html>