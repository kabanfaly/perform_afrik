<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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

    /**
     * Ville (city) table name
     * @var String
     */
    public static $TABLE_NAME = 'pa_ville';

    /**
     * Ville (city) table primary key
     * @var String
     */
    public static $PK = 'id_ville';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * retrieves all cities if the input parameter (id_ville) is false, or 
     * retrieves the city identified by the input parameter value
     * @param type $id_ville
     * @return type array
     */
    public function get_villes($id_ville = false)
    {
        if ($id_ville === false)
        {

            $query = $this->db->get(self::$TABLE_NAME);
            return $query->result_array();
        }

        $query = $this->db->get_where(self::$TABLE_NAME, array(self::$PK => $id_ville));
        return $query->row_array();
    }

    /**
     * Finds a city by name
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
     * Saves a city if it doesn't exist
     * 
     * @param array $data
     * @return boolean
     */
    public function save($data)
    {
        //find city
        if ($this->find_by_name($data['nom']) === NULL)
        {
            return $this->db->insert(self::$TABLE_NAME, $data);
        }
        return FALSE;
    }

    /**
     * Updates a city
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
     * Deletes a city
     * 
     * @param array $where
     * @return boolean
     */
    public function delete($where)
    {
        return $this->db->delete(self::$TABLE_NAME, $where);
    }

}
