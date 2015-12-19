<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/style.css" >      
    </head>
    <body>
        <div id="wrapper">
        <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--<a class="navbar-brand" href="index.html">SB Admin</a>-->
                    <a class="navbar-header" href="<?php echo base_url(); ?>">
                        <img width="225" height="50" border="0" title="<?php echo lang('TITLE'); ?>" alt="LOGO" src="<?php echo base_url(); ?>images/logo.png" />
                    </a>
                </div>
                <!-- Top Menu Items -->
                 <?php
                    if (isset($_SESSION['admin']))
                    {
                    ?>
                        <ul class="nav navbar-right top-nav">

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['admin']['type'];?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
<!--                                    <li>
                                        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                                    </li>-->
                                    <li class="divider"></li>

                                    <li>
                                        <a href="<?php echo site_url("connection/logout"); ?>"><span class="fa fa-fw fa-sign-out">
                                            </span> <?php echo lang('LOGOUT'); ?> 
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <!--<div id="sidebar-wrapper">-->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">

                        <ul class="nav navbar-nav side-nav">
                          
                            <li class="<?php echo $active == 'dechargement' ? 'active' : '' ?>">
                                <a href="<?php echo site_url("dechargement"); ?>"><i class="fa fa-fw fa-download"></i>&nbsp;<?php echo lang('UNLOADINGS'); ?></a>
                            </li>
                            <li  class="<?php echo $active == 'camion' ? 'active' : ' ' ?>">
                                <a href="<?php echo site_url("camion"); ?>"><i class="fa fa-fw fa-truck"></i>&nbsp;<?php echo lang('TRUCKS'); ?></a>
                            </li>
                            <li class="<?php echo $active == 'fournisseur' ? 'active' : '' ?>">
                                <a href="<?php echo site_url("fournisseur"); ?>"><i class="fa fa-fw fa-barcode"></i>&nbsp;<?php echo lang('SUPPLIERS'); ?></a>
                            </li>
                            <li class="<?php echo $active == 'ville' ? 'active' : '' ?>">
                                <a href="<?php echo site_url("ville"); ?>"><i class="fa fa-fw fa-building"></i>&nbsp;<?php echo lang('CITIES'); ?></a>
                            </li>

                        </ul>
                    </div>
                   <?php } ?>
                <!--</div>-->
                <!-- /.navbar-collapse -->
            </nav>
        
       
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    if (isset($_SESSION['admin']))
                    {
                        ?>
                        <div class="col-lg-12">
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
