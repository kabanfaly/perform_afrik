<?php

$setup_info['perform_afrik']['name'] = 'perform_afrik';
$setup_info['perform_afrik']['title'] = 'perform_afrik';
$setup_info['perform_afrik']['version'] = '1.001';
$setup_info['perform_afrik']['app_order'] = 10; 
$setup_info['pushoffres']['license']  = 'GPL';
//$setup_info['perform_afrik']['tables'] = array('perform_afrik');
$setup_info['perform_afrik']['enable'] = 1;


//menu definition
$setup_info['perform_afrik']['hooks'][] = 'sidebox_menu';

/* Dependencies for this app to work */
$setup_info['perform_afrik']['depends'][] = array(
'appname' => 'phpgwapi',
'versions' => Array('1.8')
);

$setup_info['perform_afrik']['depends'][] = array(
'appname' => 'etemplate',
'versions' => Array('1.8')
);

