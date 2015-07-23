<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/style.css" >      
    </head>
    <body>
        <header class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="heading">
                    <a href="<?php echo base_url(); ?>">
                        <img width="120" height="40" border="0" title="Performe Afrik" alt="LOGO" src="<?php echo base_url(); ?>images/logo.png" />
                    </a>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="list-group col-lg-2 fixed">
                        <a href="<?php echo site_url("dechargement"); ?>" class="<?php echo $active == 'dechargement' ? 'active' : ' ' ?> list-group-item">
                            <h5 class="list-group-item-heading"><?php echo lang('UNLOADING_MANAGEMENT'); ?></h5>
                        </a>
                        <a href="<?php echo site_url("camion"); ?>" class="<?php echo $active == 'camion' ? 'active' : ' ' ?> list-group-item">
                            <h5 class="list-group-item-heading"><?php echo lang('TRUCKS_MANAGEMENT'); ?></h5>
                        </a>
                        <a href="<?php echo site_url("fournisseur"); ?>" class="<?php echo $active == 'fournisseur' ? 'active' : ' ' ?> list-group-item">
                            <h5 class="list-group-item-heading"><?php echo lang('SUPPLIERS_MANAGEMENT'); ?></h5>
                        </a>
                        <a href="<?php echo site_url("ville"); ?>" class="<?php echo $active == 'ville' ? 'active' : ' ' ?> list-group-item">
                            <h5 class="list-group-item-heading"><?php echo lang('CITIES_MANAGEMENT'); ?></h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-offset-1 col-lg-9">
