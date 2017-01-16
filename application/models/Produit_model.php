<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Produit model
 *
 * @author Kaba N'faly
 * @since 28/12/16
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/models
 * @filesource produit_model.php
 */
class Produit_model extends CI_Model {
    
    
    /**
     * Produit (product) table name
     * @var String
     */
    public static $TABLE_NAME = 'pa_produit';

    /**
     * Produit (product) table primary key
     * @var String
     */
    public static $PK = 'id_produit';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * retrieves all products if the input parameter (id_produit) is false, or 
     * retrieves the product identified by the input parameter value
     * @param type $id_produit
     * @return type array
     */
    public function get_produits($id_produit = false)
    {
        if ($id_produit === false)
        {

            $query = $this->db->get(self::$TABLE_NAME);            
            return $query->result_array();
        }

        $query = $this->db->get_where(self::$TABLE_NAME, array(self::$PK => $id_produit));
        return $query->row_array();
    }

    /**
     * Finds a product by name
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
     * Saves a product if it doesn't exist
     * 
     * @param array $data
     * @return boolean
     */
    public function save($data)
    {
        //find product
        if ($this->find_by_name($data['nom']) === NULL)
        {
            return $this->db->insert(self::$TABLE_NAME, $data);
        }
        return FALSE;
    }

    /**
     * Updates a product
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
     * Delete a product
     * 
     * @param array $where
     * @return boolean
     */
    public function delete($where)
    {
        return $this->db->delete(self::$TABLE_NAME, $where);
    }

}
