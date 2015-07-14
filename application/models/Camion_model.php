<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * camion model
 *
 * @author Kaba N'faly
 * @since 07/14/15
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/models
 * @filesource camion_model.php
 */

class Camion_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
}
