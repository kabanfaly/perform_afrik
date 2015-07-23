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
    
    /**
     * retreives all trucks if the input parameter (id_camion) is false, or 
     * retreives the truck identified by the input parameter value
     * @param type $id_camion
     * @return type array
     */
    public function get_camions($id_camion = false)
    {
        if ($id_camion === false)
        {

            $query = $this->db->get('pa_camion');
            return $query->result_array();
        }

        $query = $this->db->get_whrere('pa_camion', array('id_camion' => $id_camion));
        return $query->row_array();
    }

}
