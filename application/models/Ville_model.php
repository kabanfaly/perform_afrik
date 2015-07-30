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

    /**
     * Ville (city) table name
     * @var String
     */
    public static $table_name = 'pa_ville';

    /**
     * Ville (city) table primary key
     * @var String
     */
    public static $pk = 'id_ville';
    
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

            $query = $this->db->get(self::$table_name);
            return $query->result_array();
        }

        $query = $this->db->get_where(self::$table_name, array(self::$pk => $id_ville));
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

        $query = $this->db->get_where(self::$table_name, array('nom' => $name));
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
            return $this->db->insert(self::$table_name, $data);
        }
        return FALSE;
    }

    /**
     * Updates a truck
     * 
     * @param array $data
     * @return boolean
     */
    public function update($data)
    {
        // build where section
        $where = array(self::$pk => $data[self::$pk]);

        // build new data (update data)
        unset($data[self::$pk]);

        // do update
        return $this->db->update(self::$table_name, $data, $where);
    }

}
