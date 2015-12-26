<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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

    /**
     * Camion (truck) table name
     * @var String
     */
    public static $TABLE_NAME = 'pa_camion';

    /**
     * Camion (truck) table primary key
     * @var String
     */
    public static $PK = 'id_camion';

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

            $query = $this->db->get(self::$TABLE_NAME);
            return $query->result_array();
        }

        $query = $this->db->get_where(self::$TABLE_NAME, array(self::$PK => $id_camion));
        return $query->row_array();
    }

    /**
     * Finds a truck by number
     * 
     * @param String $number
     * @return mixed
     */
    public function find_by_number($number)
    {

        $query = $this->db->get_where(self::$TABLE_NAME, array('numero' => $number));
        return $query->row_array();
    }

    /**
     * Saves a truck if it doesn't exist
     * 
     * @param array $data
     * @return boolean
     */
    public function save($data)
    {
        //find truck
        if ($this->find_by_number($data['numero']) === NULL)
        {
            return $this->db->insert(self::$TABLE_NAME, $data);
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
        return $this->db->update(self::$TABLE_NAME, $data, $where);
    }

    /**
     * Delete a truck
     * 
     * @param array $where
     * @return boolean
     */
    public function delete($where)
    {
        return $this->db->delete(self::$TABLE_NAME, $where);
    }

}
