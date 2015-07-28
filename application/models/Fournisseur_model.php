<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Fournisseur model
 *
 * @author Kaba N'faly
 * @since 07/14/15
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/models
 * @filesource fournisseur_model.php
 */
class Fournisseur_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * retreives all suppliers if the input parameter (id_fournisseur) is false, or 
     * retreives the supplier identified by the input parameter value
     * @param type $id_fournisseur
     * @return type array
     */
    public function get_fournisseurs($id_fournisseur = false)
    {
        if ($id_fournisseur === false)
        {

            $query = $this->db->get('pa_fournisseur');
            return $query->result_array();
        }

        $query = $this->db->get_where('pa_fournisseur', array('id_fournisseur' => $id_fournisseur));
        return $query->row_array();
    }

}
