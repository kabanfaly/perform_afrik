<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Magasin model
 *
 * @author Kaba N'faly
 * @since 24/01/16
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/models
 * @filesource magasin_model.php
 */
class Magasin_model extends CI_Model
{

    /**
     * Magasin (shop) table name
     * @var String
     */
    public static $TABLE_NAME = 'pa_magasin';

    /**
     * Magasin (shop) table primary key
     * @var String
     */
    public static $PK = 'id_magasin';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * retreives all shops if the input parameter (id_magasin) is false, or 
     * retreives the shop identified by the input parameter value
     * @param type $id_magasin
     * @return type array
     */
    public function get_magasins($id_magasin = false)
    {
        if ($id_magasin === false)
        {

            $query = $this->db->get(self::$TABLE_NAME);
            return $query->result_array();
        }

        $query = $this->db->get_where(self::$TABLE_NAME, array(self::$PK => $id_magasin));
        return $query->row_array();
    }

    /**
     * Finds a shop by name
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
     * Saves a shop if it doesn't exist
     * 
     * @param array $data
     * @return boolean
     */
    public function save($data)
    {
        //find shop
        if ($this->find_by_name($data['nom']) === NULL)
        {
            return $this->db->insert(self::$TABLE_NAME, $data);
        }
        return FALSE;
    }

    /**
     * Updates a shop
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
     * Deletes a shop
     * 
     * @param array $where
     * @return boolean
     */
    public function delete($where)
    {
        return $this->db->delete(self::$TABLE_NAME, $where);
    }

}
