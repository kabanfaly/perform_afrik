<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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

    /**
     * Dechargement (unloading) table name
     * @var String
     */
    public static $TABLE_NAME = 'pa_dechargement';

    /**
     * Dechargement (unloading) table primary key
     * @var String
     */
    public static $PK = 'id_dechargement';

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

            $query = $this->db->get(self::$TABLE_NAME);
            return $query->result_array();
        }

        $query = $this->db->get_where(self::$TABLE_NAME, array(self::$PK => $id_dechargement));
        return $query->row_array();
    }

    /**
     * Saves a unloading
     * @param array $data
     * @return boolean
     */
    public function save($data)
    {
        return $this->db->insert(self::$TABLE_NAME, $data);
    }

    /**
     * Updates an unloading
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
     * Delete a unload
     * 
     * @param array $where
     * @return boolean
     */
    public function delete($where)
    {
        return $this->db->delete(self::$TABLE_NAME, $where);
    }

}
