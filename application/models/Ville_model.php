<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Ville model
 *
 * @author Kaba N'faly
 * @since 07/14/15
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/models
 * @filesource ville_model.php
 */
class Ville_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * retreives all cities if the input parameter (id_ville) is false, or 
     * retreives the city identified by the input parameter value
     * @param type $id_ville
     * @return type array
     */
    public function get_villes($id_ville = false)
    {
        if ($id_ville === false)
        {

            $query = $this->db->get('pa_ville');
            return $query->result_array();
        }

        $query = $this->db->get_where('pa_ville', array('id_ville' => $id_ville));
        return $query->row_array();
    }

}
