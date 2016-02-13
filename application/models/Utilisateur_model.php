<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Utilisateur model
 *
 * @author Kaba N'faly
 * @since 07/14/15
 * @version 1.0
 * @package perform_afrik
 * @subpackage perform_afrik/application/models
 * @filesource Utilisateur_model.php
 */
class Utilisateur_model extends CI_Model
{

    /**
     * Utilisateur (user) table name
     * @var String
     */
    public static $TABLE_NAME = 'pa_utilisateur';

    /**
     * Utilisateur-magasin (user-shop) associated table name
     * @var String
     */
    public static $USER_SHOP_TABLE_NAME = 'pa_utilisateur_magasin';

    /**
     * Utilisateur (user) table primary key
     * @var String
     */
    public static $PK = 'id_utilisateur';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * retreive user and his profile by his login and password
     * @param String $login
     * @param String $password
     * @return array
     */
    public function get_user_profile($login, $password)
    {
        $this->db->select('u.*, p.nom as profil, droits_colonnes_dechargement as authorized_columns, m.id_magasin, m.nom as magasin');
        $this->db->join('pa_profil p', 'u.id_profil = p.id_profil', 'INNER');
        $this->db->join('pa_utilisateur_magasin um', 'u.id_utilisateur = um.id_utilisateur', 'LEFT');
        $this->db->join('pa_magasin m', 'um.id_magasin = m.id_magasin', 'LEFT');

        $where = array('login' => $login, 'mot_de_passe' => $password);

        $query = $this->db->get_where(self::$TABLE_NAME . ' u', $where);
        return $query->row_array();
    }

    /**
     * retreives all users if the input parameter (id_utilisateur) is false, or 
     * retreives the user identified by the input parameter value
     * @param type $id_utilisateur
     * @return type array
     */
    public function get_users($id_utilisateur = false)
    {
        $this->db->select('u.*, p.nom as profil, m.nom as magasin, m.id_magasin');
        $this->db->join('pa_profil p', 'u.id_profil = p.id_profil', 'INNER');
        $this->db->join('pa_utilisateur_magasin um', 'u.id_utilisateur = um.id_utilisateur', 'LEFT');
        $this->db->join('pa_magasin m', 'um.id_magasin = m.id_magasin', 'LEFT');

        if ($id_utilisateur === false)
        {
            $query = $this->db->get(self::$TABLE_NAME . ' u');
            return $query->result_array();
        }

        $query = $this->db->get_where(self::$TABLE_NAME . ' u', array('u.' . self::$PK => $id_utilisateur));
        return $query->row_array();
    }

    /**
     * Updates a user
     * 
     * @param array $data
     * @param array $where
     * @return boolean
     */
    public function update($data, $where)
    {
        //find user
        $user = $this->find_by_login($data['login']);

        if ($user !== NULL && $user['id_utilisateur'] == $where['id_utilisateur'])
        {
            // do update
            return $this->db->update(self::$TABLE_NAME, $data, $where);
        }
        return NULL;
    }

    /**
     * Deletes an user
     * 
     * @param array $where
     * @return boolean
     */
    public function delete($where)
    {
        return $this->db->delete(self::$TABLE_NAME, $where);
    }

    /**
     * Saves a supplier if it doesn't exist
     * 
     * @param array $data
     * @return boolean
     */
    public function save($data)
    {
        //find user
        if ($this->find_by_login($data['login']) === NULL)
        {
            return $this->db->insert(self::$TABLE_NAME, $data);
        }
        return FALSE;
    }

    /**
     * find a user identified by its login
     * @param String $login
     * @return mixed
     */
    public function find_by_login($login)
    {
        $query = $this->db->get_where(self::$TABLE_NAME, array('login' => $login));
        return $query->row_array();
    }

    /**
     * Get a row from pa_utilisateur_magasin (user-shop) table identified by user id 
     * @param int $id_utilisateur 
     * @return NULL|array
     */
    public function get_user_magasin($id_utilisateur)
    {   
        $query = $this->db->get_where(self::$USER_SHOP_TABLE_NAME, array(self::$PK => $id_utilisateur));
        return $query->row_array();
    }

    /**
     * Insert or update in user-shop associated table
     * @param array $data
     * @return boolean
     */
    public function save_user_magasin($data)
    {
        $id_utilisateur = $data[self::$PK];
        
        // Check if user id is associated
        $user_magasin = $this->get_user_magasin($id_utilisateur);
        
        if ($user_magasin === NULL) // do insert
        {
            return $this->db->insert(self::$USER_SHOP_TABLE_NAME, $data);
        } else  // do update
        {
            return $this->db->update(self::$USER_SHOP_TABLE_NAME, $data, array(self::$PK => $id_utilisateur));
        }
        return FALSE;
    }
    
    /**
     * Deletes a user from user-shop assaciation table
     * @param int $id_utilisateur user id
     * @return boolean
     */
    public function delete_user_magasin($id_utilisateur){
        return $this->db->delete(self::$USER_SHOP_TABLE_NAME, array(self::$PK => $id_utilisateur));
    }
}
