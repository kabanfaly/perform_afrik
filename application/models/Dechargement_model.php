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
    /**
     * retreives all unloading if the input parameter (id_dechargement) is false, or 
     * retreives the unloading identified by the input parameter value
     * @param type $id_dechargement
     * @return type array
     */
    public function get_dechargements($id_dechargement = false)
    {
        if ($id_dechargement === false)
        {

            $query = $this->db->get('pa_dechargement');
            return $query->result_array();
        }

        $query = $this->db->get_whrere('pa_dechargement', array('id_dechargement' => $id_dechargement));
        return $query->row_array();
    }


}
