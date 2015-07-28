<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * connection model
 *
 * @author Kaba N'faly
 * @since 07/14/15
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/models
 * @filesource Connection_model.php
 */

class Connection_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * retreive admin by his login and password
     * @param String $login
     * @param String $password
     * @return array
     */
    public function get_admin($login, $password)
    {

        $query = $this->db->get_where('pa_admin', array('login' => $login, 'password' => $password));
        return $query->row_array();
    }

}
