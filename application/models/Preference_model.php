<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Preference model
 *
 * @author Kaba N'faly
 * @since 25/12/2015
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/models
 * @filesource preference_model.php
 */
class Preference_model extends CI_Model
{

    /**
     * Preference (preference) table name
     * @var String
     */
    public static $table_name = 'pa_preference';

    /**
     * Preference (preference) table primary key
     * @var String
     */
    public static $pk = 'id_preference';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * retreives all preferences if the input parameter (id_preference) is false, or 
     * retreives the preference identified by the input parameter value
     * @param type $id_preference
     * @return type array
     */
    public function get_preferences($id_preference = false)
    {
        if ($id_preference === false)
        {

            $query = $this->db->get(self::$table_name);
            return $query->result_array();
        }

        $query = $this->db->get_where(self::$table_name, array(self::$pk => $id_preference));
        return $query->row_array();
    }

    /**
     * Finds a preference by name
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
     * Saves a preference if it doesn't exist
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
     * Updates a preference
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
     * Deletes a preference
     * 
     * @param array $where
     * @return boolean
     */
    public function delete($where)
    {
        return $this->db->delete(self::$table_name, $where);
    }

}
