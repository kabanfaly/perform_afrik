<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Transitaire model
 *
 * @author Kaba N'faly
 * @since 01/23/17
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/models
 * @filesource transitaire_model.php
 */
class Transitaire_model extends CI_Model
{

    /**
     * Transitaire (forwarding agent) table name
     * @var String
     */
    public static $TABLE_NAME = 'pa_transitaire';

    /**
     * Transitaire (forwarding agent) table primary key
     * @var String
     */
    public static $PK = 'id_transitaire';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * retrieves all forwarding agents if the input parameter (id_transitaire) is false, or 
     * retrieves the forwarding agent identified by the input parameter value
     * @param type $id_transitaire
     * @return type array
     */
    public function get_transitaires($id_transitaire = false)
    {
        if ($id_transitaire === false)
        {

            $query = $this->db->get(self::$TABLE_NAME);
            return $query->result_array();
        }

        $query = $this->db->get_where(self::$TABLE_NAME, array(self::$PK => $id_transitaire));
        return $query->row_array();
    }

    /**
     * Finds a forwarding agent by name
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
     * Saves a forwarding agent if it doesn't exist
     * 
     * @param array $data
     * @return boolean
     */
    public function save($data)
    {
        //find forwarding agent
        if ($this->find_by_name($data['nom']) === NULL)
        {
            return $this->db->insert(self::$TABLE_NAME, $data);
        }
        return FALSE;
    }

    /**
     * Updates a forwarding agent
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
     * Delete a forwarding agent
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
