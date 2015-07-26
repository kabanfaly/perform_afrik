<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class to represent jquery DataTable 
 *
 * @author Kaba N'faly
 * @since 07//26/15
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/librairies
 * @filesource MY_table.php
 */
class MY_table extends CI_Table
{

    public function __construct($config = array())
    {
        parent::__construct($config);
    }

    /**
     * Default Template
     *
     * @return	array
     */
    protected function _default_template()
    {
        $template = parent::_default_template();
        $template['table_open'] = '<table id="tableContent" class="table table-striped table-bordered table-hover">';
        return $template;
    }

}
