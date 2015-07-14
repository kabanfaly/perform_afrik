<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Dechargement model
 *
 * @author Kaba N'faly
 * @since 07/14/15
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/models
 * @filesource dechargement_model.php
 */
class Dechargement_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

}
