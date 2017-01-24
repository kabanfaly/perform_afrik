<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Transporteur model
 *
 * @author Kaba N'faly
 * @since 01/24/17
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/models
 * @filesource transporteur_model.php
 */
class Transporteur_model extends CI_Model
{

    /**
     * Transporteur (carrier) table name
     * @var String
     */
    public static $TABLE_NAME = 'pa_transporteur';

    /**
     * Transporteur (carrier) table primary key
     * @var String
     */
    public static $PK = 'id_transporteur';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * retrieves all carriers if the input parameter (id_transporteur) is false, or 
     * retrieves the carrier identified by the input parameter value
     * @param type $id_transporteur
     * @return type array
     */
    public function get_transporteurs($id_transporteur = false)
    {
        if ($id_transporteur === false)
        {

            $query = $this->db->get(self::$TABLE_NAME);
            return $query->result_array();
        }

        $query = $this->db->get_where(self::$TABLE_NAME, array(self::$PK => $id_transporteur));
        return $query->row_array();
    }

    /**
     * Finds a carrier by name
     * 
     * @param String $name
     * @return mixed
     */
    public function find_by_name($name)
    {

        $query = $this->db->get_where(self::$TABLE_NAME, array('nom' => $name));
        return $query->row_array();
    }

    /**
     * Saves a carrier if it doesn't exist
     * 
     * @param array $data
     * @return boolean
     */
    public function save($data)
    {
        //find carrier
        if ($this->find_by_name($data['nom']) === NULL)
        {
            return $this->db->insert(self::$TABLE_NAME, $data);
        }
        return FALSE;
    }

    /**
     * Updates a carrier
     * 
     * @param array $data
     * @param array $where
     * @return boolean
     */
    public function update($data, $where)
    {
        // do update
        return $this->db->update(self::$TABLE_NAME, $data, $where);
    }

    /**
     * Delete a carrier
     * 
     * @param array $where
     * @return boolean
     */
    public function delete($where)
    {
        return $this->db->delete(self::$TABLE_NAME, $where);
    }

    /**
     * Returns current table fields
     * @return array
     */
    public function get_fields()
    {
        return $this->db->list_fields(self::$TABLE_NAME);
    }

}
