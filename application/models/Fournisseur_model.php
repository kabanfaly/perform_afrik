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

    /**
     * Fournisseur (supplier) table name
     * @var String
     */
    public static $table_name = 'pa_fournisseur';

    /**
     * Fournisseur (supplier) table primary key
     * @var String
     */
    public static $pk = 'id_fournisseur';

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

            $query = $this->db->get(self::$table_name);
            return $query->result_array();
        }

        $query = $this->db->get_where(self::$table_name, array(self::$pk => $id_fournisseur));
        return $query->row_array();
    }

    /**
     * Finds a supplier by name
     * 
     * @param String $name
     * @return mixed
     */
    public function find_by_name($name)
    {

        $query = $this->db->get_where(self::$table_name, array('nom' => $name));
        return $query->row_array();
    }

    /**
     * Saves a supplier if it doesn't exist
     * 
     * @param array $data
     * @return boolean
     */
    public function save($data)
    {
        //find supplier
        if ($this->find_by_name($data['nom']) === NULL)
        {
            return $this->db->insert(self::$table_name, $data);
        }
        return FALSE;
    }

    /**
     * Updates a truck
     * 
     * @param array $data
     * @param array $where
     * @return boolean
     */
    public function update($data, $where)
    {
        // do update
        return $this->db->update(self::$table_name, $data, $where);
    }

    /**
     * Delete a supplier
     * 
     * @param array $where
     * @return boolean
     */
    public function delete($where)
    {
        return $this->db->delete(self::$table_name, $where);
    }

    /**
     * Returns current table fieds
     * @return array
     */
    public function get_fields()
    {
        return $this->db->list_fields(self::$table_name);
    }

}
