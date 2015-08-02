<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/style.css" >      
    </head>
    <body>
        <header>
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="" href="<?php echo base_url(); ?>">
                            <img width="120" height="40" border="0" title="Performe Afrik" alt="LOGO" src="<?php echo base_url(); ?>images/logo.png" />
                        </a>
                    </div>
                    <div>
                        <?php
                        if (isset($_SESSION['admin']))
                        {
                            ?>  
                            <ul class="nav navbar-nav">
                                <li class="<?php echo $active == 'dechargement' ? 'active' : '' ?>">
                                    <a href="<?php echo site_url("dechargement"); ?>"><?php echo lang('UNLOADINGS'); ?></a>
                                </li>
                                <li  class="<?php echo $active == 'camion' ? 'active' : ' ' ?>">
                                    <a href="<?php echo site_url("camion"); ?>"><?php echo lang('TRUCKS'); ?></a>
                                </li>
                                <li class="<?php echo $active == 'fournisseur' ? 'active' : '' ?>">
                                    <a href="<?php echo site_url("fournisseur"); ?>"><?php echo lang('SUPPLIERS'); ?></a>
                                </li>
                                <li class="<?php echo $active == 'ville' ? 'active' : '' ?>">
                                    <a href="<?php echo site_url("ville"); ?>"><?php echo lang('CITIES'); ?></a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">

                                <li>
                                    <a href="<?php echo site_url("connection/logout"); ?>"><span class="glyphicon glyphicon-log-out">
                                        </span> <?php echo lang('LOGOUT'); ?> 
                                    </a>
                                </li>                            
                            </ul>
<?php } ?>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container-fluid">
            <div class="row">
                <?php
                if (isset($_SESSION['admin']))
                {
                    ?>
                    <div class=" col-lg-10 col-lg-offset-1 ">
                        <div class="content clearfix">
                            <!--<div class="title"><h3><?php echo $title; ?></h3></div>-->
                            <p>
                                <a href="<?php echo $form_link; ?>" data-toggle="modal" data-target="#form-content" class="btn btn-primary btn-large"><?php echo lang('ADD'); ?></a>
                            </p>
                            <div class="msg <?php echo!$error ? 'success' : 'alert-danger fade in'; ?>">
                                <center><?php echo urldecode($msg); ?></center>
                            </div>
                            <table id="tableContent" class="table table-striped table-bordered table-hover">
<?php } ?>
